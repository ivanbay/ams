<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Asset;
use App\Model\ActivityLog;
use App\Model\Maintenance;
use App\Model\License;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Helpers\Settings;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records = array();

        if (!Settings::has(Auth::user()->id . '_dashboard')) {
            Settings::set(Auth::user()->id . '_dashboard', '{"dashboard_type":"numeric","total_assets":"on","total_deployed":"on","for_deployment":"on","due_for_maintenance":"on","asset_per_category":"on","asset_per_status":"on","users_per_role":"on","asset_maintenance":"on","expiring_warranty":"on","expiring_licenses":"on","recent_activities":"on"}');
            Settings::clear();
        }

            $records['totalAsset'] = Asset::count();
            $records['deployedAssets'] = Asset::where('status', '=', 6)->count();
            $records['forDeployment'] = Asset::where('status', '=', 5)->count();
            $records['forMaintenance'] = Asset::where('status', '=', 7)->count();
            $records['activityLog'] = ActivityLog::with('user')->orderBy('created_at', 'desc')->take(5)->get();
            
        if (Settings::get(Auth::user()->id . '_dashboard')->dashboard_type == 'numeric') {

            $records['assetCategoriesCnt'] = Asset::select(DB::raw('asset_categories.name, count(assets.tag) assetCount'))
                    ->rightJoin('asset_categories', 'id', 'category')
                    ->groupBy('asset_categories.name')
                    ->get();

            $records['assetStatusCnt'] = Asset::select(DB::raw('asset_status.name, count(assets.tag) assetCount'))
                    ->rightJoin('asset_status', 'id', 'status')
                    ->groupBy('asset_status.name')
                    ->get();

            $records['usersCount'] = Role::select(DB::raw('roles.name, count(users.id) userCount'))
                    ->leftJoin('role_user', 'role_user.role_id', 'roles.id')
                    ->leftJoin('users', 'users.id', 'role_user.user_id')
                    ->groupBy('roles.name')
                    ->get();
        }

        $asset = Asset::get();
        $records['expiringWarranty'] = $asset->map(function ($asset) {
                    return collect($asset->toArray())
                                    ->only(['tag', 'name', 'warranty', 'warranty_expiry', 'days_remaining', 'description'])
                                    ->all();
                })->filter(function($item, $key) {
                    if ($item['days_remaining'] != null && $item['days_remaining'] <= 60) {
                        return true;
                    }
                })->values();

        $status = \App\Model\MaintenanceStatus::where('name', 'like', '%Released')->first();
        $released = $status->id;
        $records['maintenance'] = Maintenance::with(['asset' => function($q) {
                        $q->select(['tag', 'model', 'brand', 'name']);
                    }, 'status'])
                ->where('maintenance_status_id', '!=', $released)
                ->orderBy('date_endorsed', 'desc')
                ->get();

        $licenses = License::get();
        $records['expiringLicenses'] = $licenses->map(function ($licenses) {
                    return collect($licenses->toArray())
                                    ->only(['id', 'vendor', 'license_key', 'expiry_date', 'days_remaining', 'acquisition_date', 'description'])
                                    ->all();
                })->filter(function($item, $key) {
                    if ($item['days_remaining'] != null && $item['days_remaining'] <= 60) {
                        return true;
                    }
                })->values();


        $dashType = Settings::get(Auth::user()->id . '_dashboard')->dashboard_type;
        if ($dashType == 'bar') {
            $view = 'pages/home/dashboard_bar';
        } else if ($dashType == 'pie') {
            $view = 'pages/home/dashboard_pie';
        } else if ($dashType == 'line') {
            $view = 'pages/home/dashboard_line';
        } else {
            $view = 'pages/home/dashboard';
        }



        return view($view)->with('records', $records);
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

    // -----> to be refactor in the future
    public function getTotalAssets() {
        $records = DB::select(DB::raw("SELECT b.name, count(a.tag) count FROM assets a RIGHT JOIN asset_status b ON a.`status` = b.id WHERE b.id IN (5,6,7) GROUP BY b.name ORDER BY count(a.tag) DESC"));

        $data = [];
        foreach ($records as $key => $record) {
            $name = $record->name;
            if ($record->name == 'Ready to Deploy') {
                $name = "For Deployment";
            }

            $data[$key]['name'] = $name;
            $data[$key]['value'] = $record->count;
        }

        return json_encode($data);
    }

    public function getTotalAssetsPerCategory() {

        $records = Asset::select(DB::raw('asset_categories.name, count(assets.tag) assetCount'))
                ->rightJoin('asset_categories', 'id', 'category')
                ->groupBy('asset_categories.name')
                ->orderBy(DB::raw('count(assets.tag)'), 'desc')
                ->get();

        $data = [];
        foreach ($records as $key => $record) {
            $data[$key]['name'] = $record->name;
            $data[$key]['value'] = $record->assetCount;
        }

        return json_encode($data);
    }

    public function getTotalAssetsPerStatus() {
        $records = Asset::select(DB::raw('asset_status.name, count(assets.tag) assetCount'))
                ->rightJoin('asset_status', 'id', 'status')
                ->groupBy('asset_status.name')
                ->orderBy(DB::raw('count(assets.tag)'), 'DESC')
                ->get();

        $data = [];
        foreach ($records as $key => $record) {
            $data[$key]['name'] = $record->name;
            $data[$key]['value'] = $record->assetCount;
        }

        return json_encode($data);
    }

    public function getTotalUsersPerRole() {
        $records = Role::select(DB::raw('roles.name, count(users.id) userCount'))
                ->leftJoin('role_user', 'role_user.role_id', 'roles.id')
                ->leftJoin('users', 'users.id', 'role_user.user_id')
                ->groupBy('roles.name')
                ->get();

        $data = [];
        foreach ($records as $key => $record) {
            $data[$key]['name'] = $record->name;
            $data[$key]['value'] = $record->userCount;
        }

        return json_encode($data);
    }

}
