<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AssignedAsset;
use App\Model\Asset;
use App\Model\AssignedAssetsHistory;
use App\Helpers\Logging;
use App\Model\AssetLocation;
use App\Model\Personnel;

class AssignController extends Controller {

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
     * Method for assigning asset to personnel or location
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $assetTag = $request->get('assetTag');
        $assign = explode("_", $request->get('assignTo'));
        $assignType = $assign[0];
        $assignTo = $assign[1];

        $assign = new AssignedAsset();
        $assign->assetTag = $assetTag;
        if ($assignType == "p") {
            $assign->personnel_id = $assignTo;
        } else if ($assignType == "l") {
            $assign->location_id = $assignTo;
        }

        if ($assign->save()) {
            $asset = Asset::find($assetTag);
            $asset->status = 6;
            $asset->save();
            
            $assetHis = new AssignedAssetsHistory();
            $assetHis->assetTag = $assetTag;
            $assetHis->assigned_to_id = $assignTo;
            $assetHis->assigned_to = $assignType;
            $assetHis->status = "Endorsed";
            $assetHis->save();           
            
            if( $assignType == 'p' ) {
                $personnel = Personnel::where('id', $assignTo)->first();
                $to = $personnel->lastname . ", " . $personnel->firstname;
            } else {
                $location = AssetLocation::where("id", $assignTo)->first();
                $to = $location->name;
            }
            
            Logging::logActivity("Asset " . $assetTag . " was endorsed to " . $to . "");
            
            return Response()->json(array('message' => "success"), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
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
        //
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
