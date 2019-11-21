<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Lookups\LookupController;
use App\Model\Asset;
use App\Model\AssetStatus;
use App\Http\Requests\AssetRegistrationFormRequest;
use App\Http\Requests\AssetUpdateFormRequest;
use App\Helpers\Logging;
use Helmesvs\Notify\Facades\Notify;
use App\Helpers\Cache;
use App\Model\Maintenance;
use App\Model\MaintenanceStatus;

class RegisterController extends Controller {

    /**
     * Render registration form view
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $lookup = new LookupController();
        return view("pages/assets/register")->with(['user' => $request->user(), "lookup" => $lookup->getLookupData()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRegistrationFormRequest $request) {

        if ($request->hasFile('image')) {
            $request->image->move(public_path('images/assets'), $request->input('assetTag') . ".jpg");
        }

        $asset = new Asset();
        $asset->tag = $request->input('assetTag');
        $asset->category = $request->input('category', null);
        $asset->brand = $request->input('brand', null);
        $asset->model = $request->input('model', null);
        $asset->name = $request->input('name', null);
        $asset->description = $request->input('description', null);
        $asset->status = $request->input('status');
        $asset->serial = $request->input('serial', null);
        $asset->supplier_id = $request->input('supplier');
        $asset->or_no = $request->input('or_number');
        $asset->invoice_no = $request->input('invoice_number');
        $asset->po_no = $request->input('po_number');
        $asset->purchasedDate = $request->input('purchased_date');
        $asset->purchasedCost = $request->input('purchase_cost', null);
        $asset->orderingPoint = $request->input('ordering_point', null);
        $asset->getOrderNotified = $request->input('receive_notif') !== '' && $request->input('receive_notif') == 'on' ? 1 : 0;
        $asset->lifespan = $request->input('lifespan', null);
        $asset->lifespan_format = $request->input('lifespan_format', null);
        $asset->warranty = $request->input('warranty', null);
        $asset->location = $request->input('location');
        $asset->notes = $request->input('notes', null);

        if ($request->has('isRequireLicense')) {
            $asset->isRequireLicense = 1;
        }

        if ($asset->save()) {
            Notify::success("Asset added successfully!", $title = "Success", $options = []);
            Logging::logActivity("New asset has been added. Asset tag: " . $request->input('assetTag'));
        } else {
            Notify::error("Something went wrong when adding asset.", $title = "Error!", $options = []);
        }

        $lookup = new LookupController();
        return view("pages/assets/register")->with(['user' => $request->user(), "lookup" => $lookup->getLookupData()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) {
        Notify::clear();

        $lookup = new LookupController();
        $data = [
            'user' => $request->user(),
            'lookup' => $lookup->getLookupData(),
            'asset' => Asset::find($id)
        ];

        return view("pages/assets/edit")->with(['data' => $data]);
    }

    /**
     * Update specific asset
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetUpdateFormRequest $request, $id) {

        if ($request->hasFile('image')) {
            $request->image->move(public_path('images/assets'), $request->input('assetTag') . ".jpg");
            Cache::clearView();
        }
        
        $asset = Asset::find($id);
        $asset->tag = $request->input('assetTag');
        $asset->category = $request->input('category', null);
        $asset->brand = $request->input('brand', null);
        $asset->model = $request->input('model', null);
        $asset->name = $request->input('name', null);
        $asset->description = $request->input('description', null);
        $asset->status = $request->input('status');
        $asset->serial = $request->input('serial', null);
        $asset->supplier_id = $request->input('supplier');
        $asset->or_no = $request->input('or_number');
        $asset->invoice_no = $request->input('invoice_number');
        $asset->po_no = $request->input('po_number');
        $asset->purchasedDate = $request->input('purchased_date');
        $asset->purchasedCost = $request->input('purchase_cost', null);
        $asset->orderingPoint = $request->input('ordering_point', null);
        $asset->getOrderNotified = $request->input('receive_notif') !== '' && $request->input('receive_notif') == 'on' ? 1 : 0;
        $asset->lifespan = $request->input('lifespan', null);
        $asset->warranty = $request->input('warranty', null);
        $asset->location = $request->input('location');
        $asset->notes = $request->input('notes', null);

        if ($request->has('isRequireLicense')) {
            $asset->isRequireLicense = 1;
        }
        
        if ($asset->save()) {
            // log activity if status is for maintenance
            $maintenanceStatus = AssetStatus::where('name', 'like', '%maintenance%')->select('id')->first(0);
            if ($request->input('status') == $maintenanceStatus->id) {
                try {
                    // enroll to maintenance table
                    $maintenance = new Maintenance();
                    $maintenance->joborderid = "JOB" . Date("ymdhis");
                    $maintenance->asset_id = $request->input('assetTag');
                    $mStatus = MaintenanceStatus::where("name", "like", "%queue%")->select('id')->first();
                    $maintenance->maintenance_status_id = $mStatus->id;
                    $maintenance->date_endorsed = \Carbon\Carbon::now();
                    $maintenance->save();

                    Logging::logActivity("Asset " . $request->input('assetTag') . " was endorsed for maintenance.");
                } catch (\Illuminate\Database\QueryException $e) {
                    
                }
            } else {
                Logging::logActivity("Asset " . $request->input('assetTag') . " has been updated.");
            }

            return redirect()->route('profile.show', $asset->tag)->with('successMessage', 'Asset updated successfully!');
        } else {
            Notify::error("Something went wrong when updating asset.", $title = "Error!", $options = []);
            $lookup = new LookupController();
            return view("pages/assets/register")->with(['user' => $request->user(), "lookup" => $lookup->getLookupData()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
