<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\License;
use App\Model\LicenseType;
use App\Helpers\Logging;
use App\Helpers\Notification;
use App\Model\Asset;
use App\Model\AssignedLicense;
use App\Model\Supplier;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class LicenseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $licenses = License::with('assignedTo')->get();

        $assets = Asset::whereDoesntHave('assignedLicense')
                ->where('isRequireLicense', 1)
                ->select(['tag', 'name'])
                ->get();
        
        return view("pages/licenses/list")->with(['licenses' => $licenses, 'assets' => $assets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        Notification::showNotification();

        $licenseTypes = LicenseType::select('id', 'name')->get();
        $vendors = Supplier::select('id', 'name')->get();
        
        return view("pages/licenses/register")->with(['licenseTypes' => $licenseTypes, 'vendors' => $vendors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $license = new License();
        $license->license_type_id = $request->get('license_type');
        $license->manufacturer = $request->get('manufacturer');
        $license->license_key = $request->get('license_key');
        $license->cost = $request->get('cost');
        $license->vendor_id = $request->get('vendor_id');
        $license->number_of_usage = $request->get('number_of_usage');
        $license->description = $request->get('description');
        $license->acquisition_date = $request->get('acquisition_date');
        $license->expiry_date = $request->get('expiry_date');

        if ($license->save()) {
            Logging::logActivity("New license has been registered. License Key: " . $request->input('license_key'));
            return redirect()->back()->with('successMessage', 'License has been registered!');
        } else {
            return redirect()->back()->with('errorMessage', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $licenseTypes = LicenseType::select('id', 'name')->get();
        $license = License::find($id);
        return view("pages/licenses/view")->with(['licenseTypes' => $licenseTypes, 'license' => $license]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        Notification::showNotification();

        $licenseTypes = LicenseType::select('id', 'name')->get();
        $license = License::find($id);
        $vendors = Supplier::select('id', 'name')->get();
        
        return view("pages/licenses/register")->with(['licenseTypes' => $licenseTypes, 'license' => $license, 'vendors' => $vendors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $license = License::findOrFail($id);
        $input = $request->all();
        
        $license->fill($input);

        if ($license->save()) {
            Logging::logActivity("license key " . $request->get('license_key') . " has been updated.");
            return redirect()->back()->with('successMessage', 'License has been updated!');
        } else {
            return redirect()->back()->with('errorMessage', 'Something went wrong! Please try again.');
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

    public function assign(Request $request) {

        $licensekey = $request->get('licenseKey');
        $licenseId = $request->get('licenseId');
        $assignTo = $request->get('assignTo');

        $assign = new AssignedLicense();
        $assign->asset_id = $assignTo;
        $assign->license_id = $licenseId;

        if ($assign->save()) {
            Logging::logActivity("License " . $licensekey . " was endorsed to " . $assignTo . "");
            return Response()->json(array('message' => "success"), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

    public function pdf() {
        $licenses = License::with('assignedTo', 'license_type')->get();

        $pdf = PDF::loadView('pdf.licenses', ['licenses' => $licenses]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function excel() {
        $licenses = License::with('assignedTo', 'license_type')->get();

        $i = 1;
        $data[] = ["License Type", "Manufacturer", "Vendor", "License Key", "Cost", "Description", "Assigned To", "Acquisition Date", "Expiry Date"];
        foreach($licenses as $key => $license) {
            $data[$i][] = $license->license_type->name;
            $data[$i][] = $license->manufacturer;
            $data[$i][] = $license->vendor;
            $data[$i][] = $license->license_key;
            $data[$i][] = $license->cost != '' ? "Php " . number_format($license->cost, 2) : '-';
            $data[$i][] = $license->description;
            $data[$i][] = $license->assignedTo != null ? $license->assignedTo->asset_id : null;
            $data[$i][] = date('F d, Y', strtotime($license->acquisition_date));
            $data[$i][] = date('F d, Y', strtotime($license->expiry_date));
            $i++;
        }
        
        return Excel::create("licenses_table_" . date('YmdHis'), function($excel) use ($data) {
                    $excel->sheet('sheet', function($sheet) use ($data) {
                        $sheet->fromArray($data, null, 'A1', false, false);
                    });
                })->download("xls");
    }

}
