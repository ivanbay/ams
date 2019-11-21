<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Personnel;
use Illuminate\Validation\Validator;
use App\Helpers\Notification;
use App\Helpers\Logging;
use App\Model\Asset;
use App\Model\AssignedAsset;
use App\Model\AssignedAssetsHistory;
use App\Model\AssetStatus;

class PersonnelController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        Notification::showNotification();

        $personnel = Personnel::with(['assignedAssets', 'assignedAssetsHistorical'])->where("id", $id)->first();
        return view('pages/profiles/personnel')->with('personnel', $personnel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if ($request->hasFile('image')) {

            $validator = validator($request->all(), [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $request->image->move(public_path('images/profile'), $id . ".jpg");
        }

        $personnel = Personnel::firstOrNew(['id' => $id]);
        $personnel->firstname = ucwords($request->get('firstName'));
        $personnel->lastname = ucwords($request->get('lastName'));
        $personnel->email = $request->get('email');
        $personnel->contact = $request->get('contactNumber');
        $personnel->address = ucwords($request->get('address'));
        $personnel->position = ucwords($request->get('position'));

        Logging::logActivity("Updated records of personnel " . $id . ".");

        if ($personnel->save()) {
            return redirect()->back()->with('successMessage', 'Personnel successfully updated!');
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
        $asset = AssignedAsset::with('personnel')->where("assetTag", $id)->first();

        // delete assigned asset from assigned_assets table
        $delete = AssignedAsset::destroy($id);

        if ($delete) {
            Logging::logActivity("Pulled-out asset: " . $id . " from " . $asset->personnel->lastname . ', ' . $asset->personnel->firstname);

            // store to historical table
            $history = new AssignedAssetsHistory();
            $history->assetTag = $id;
            $history->assigned_to_id = $asset->personnel_id;
            $history->assigned_to = 'p';
            $history->status = 'Pulled Out';
            $history->save();

            // update the status of the asset
            $status = AssetStatus::where("name", "Available")->first();
            $asset = Asset::find($id);
            $asset->status = $status->id;
            $asset->save();

            return Response()->json(array('message' => "Asset has been pulled out!"), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

}
