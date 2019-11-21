<?php

namespace App\Http\Controllers\Lookups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AssetCategories;
use App\Model\AssetStatus;
use App\Model\AssetLocation;
use App\Model\Supplier;
use App\Helpers\Logging;

class LookupController extends Controller {

    /**
     * Display all categories from database
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $lookups = $this->getLookupData();

        if (!empty($lookups)) {
            return Response()->json(array('data' => $lookups), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

    /**
     * Get lookup data from database
     */
    public function getLookupData() {
        $lookups = array();

        $categories = AssetCategories::select("id", "name")->get();
        foreach ($categories as $category) {
            $lookups['assetCategories'][$category->id] = $category->name;
        }

        $status = AssetStatus::select("id", "name")->get();
        foreach ($status as $stat) {
            $lookups['assetStatus'][$stat->id] = $stat->name;
        }

        $locations = AssetLocation::select("id", "name")->get();
        foreach ($locations as $location) {
            $lookups['assetLocations'][$location->id] = $location->name;
        }
        
        $suppliers = Supplier::select("id", "name")->get();
        foreach ($suppliers as $supplier) {
            $lookups['suppliers'][$supplier->id] = $supplier->name;
        }

        return $lookups;
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
     * Add item to the database for dropdown list
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $formValues = $request->get("formValues");

        $values = array();
        parse_str($formValues, $values);

        if (isset($values['addCategory'])) {
            $table = new AssetCategories();
            $name = $values['addCategory'];
            $log = "Added new asset category: " . $name;
        } else if (isset($values['addStatus'])) {
            $table = new AssetStatus();
            $name = $values['addStatus'];
            $log = "Added new asset status: " . $name;
        } else if (isset($values['addLocation'])) {
            $table = new AssetLocation();
            $name = $values['addLocation'];
            $log = "Added new location: " . $name;
        }

        $table->name = $name;
        if ($table->save()) {
            Logging::logActivity($log);
            return Response()->json(array('id' => $table->id), 200);
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
        $formValues = $request->get("formValues");

        $values = array();
        parse_str($formValues, $values);

        if (isset($values['addCategory'])) {
            $table = AssetCategories::find($id);
            $name = $values['addCategory'];
        } else if (isset($values['addStatus'])) {
            $table = AssetStatus::find($id);
            $name = $values['addStatus'];
        } else if (isset($values['addLocation'])) {
            $table = AssetLocation::find($id);
            $name = $values['addLocation'];
        }
        
        $table->name = $name;
        
        if ($table->save()) {
            return Response()->json(array('message' => 'success'), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
    }

    public function delete(Request $request) {
        $id = $request->get("recordId");
        $for = $request->get("for");

        if ($for == "categories") {
            $table = new AssetCategories();
        } else if ($for == "status") {
            $table = new AssetStatus();
        } else if( $for == "location") {
            $table = new AssetLocation();
        }

        if ($table->destroy($id)) {
            return Response()->json(array('message' => "Delete Successful"), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

}
