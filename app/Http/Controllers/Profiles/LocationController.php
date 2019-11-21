<?php

namespace App\Http\Controllers\Profiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AssetLocation;
use App\Model\AssignedAsset;
use App\Model\AssetStatus;
use App\Model\AssignedAssetsHistory;
use App\Model\Asset;
use App\Helpers\Logging;
use Debugbar;

class LocationController extends Controller {

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
        
        $location = AssetLocation::with('assigned_assets', 'assignedAssetsHistorical')->find($id);
        
        return view('pages.profiles.location')->with('location', $location);
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
        $asset = AssignedAsset::with('location')->where("assetTag", $id)->first();

        // delete assigned asset from assigned_assets table
        $delete = AssignedAsset::destroy($id);

        if ($delete) {
            Logging::logActivity("Pulled-out asset: " . $id . " from " . $asset->location->name);

            // store to historical table
            $history = new AssignedAssetsHistory();
            $history->assetTag = $id;
            $history->assigned_to_id = $asset->location->id;
            $history->assigned_to = 'l';
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
