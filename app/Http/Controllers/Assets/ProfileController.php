<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\License;
use App\Model\AssignedLicense;
use App\Helpers\Logging;

class ProfileController extends Controller {

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
        
        $asset = Asset::with(['categoryDetails', 'statusDetails', 'locationDetails', 'maintenance', 'supplier', 'assignedLicense'])->find($id);
        $depTable = array();
        
        $cost = $asset->purchasedCost;
        
        if ($cost != null && $asset->lifespan != null) {
            $lifespan = $asset->lifespan;
            $depValue = ($cost - 0) / $lifespan;
            $depRate = round(($depValue / $cost) * 100, 2);

            $depTable = array();

            for ($a = 1; $a <= $lifespan; $a++) {
                $depTable[$a]['rate'] = $depRate;
                $depTable[$a]['cost'] = round($cost);
                $depTable[$a]['less'] = round($depValue);
                $depTable[$a]['newCost'] = $depTable[$a]['cost'] - $depTable[$a]['less'];

                $cost -= $depValue;
            }
        }
        
        return view('pages.assets.profile')->with(['asset' => $asset, 'depTable' => $depTable]);
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
        $assignedLicense = AssignedLicense::with('license')->find($id);

        // delete assigned license from assigned_assets table
        $delete = AssignedLicense::where("id", $id)->delete();
        
        if ($delete) {
            Logging::logActivity("Pulled-out license: " . $assignedLicense->license->license_key . " from " . $assignedLicense->asset_id);

            return Response()->json(array('message' => "Asset has been pulled out!"), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

}
