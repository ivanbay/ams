<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Settings;
use Illuminate\Support\Facades\Auth;
use App\Model\Setting;
use App\Helpers\Logging;
use App\Helpers\Notification;

class SystemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        Notification::showNotification();
        return view('pages.settings.system');
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
        if ($request->hasFile('logo')) {

            $validator = validator($request->all(), [
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $request->logo->move(public_path('images'), "logo.png");
        }

        if ($request->hasFile('login_logo')) {

            $validator = validator($request->all(), [
                'login_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $request->login_logo->move(public_path('images'), "login_logo.png");
        }


        # APPLICATION
        Settings::set('header_bg_color', strtoupper($request->get('header_bg_color')));
        Settings::set('sidebar_bg_color', strtoupper($request->get('sidebar_bg_color')));

        # BRANDING
        Settings::set('sitename', $request->get('sitename'));
        Settings::set('branding_format', $request->get('branding_format'));
        Settings::set('footer_text', $request->get('footer_text'));

        # LOGIN 
        Settings::set('system_name', $request->get('system_name'));
        Settings::set('login_footer_text', $request->get('login_footer_text'));

        # DASHBOARD CONTENT
        # EMAIL NOTIFICATION
        Settings::set('email_alert', $request->get('email_alert'));
        Settings::set('alert_recipient_list', $request->get('alert_recipient_list'));
        Settings::set('alert_cc_list', $request->get('alert_cc_list'));
        Settings::set('expiring_alert_threshold', $request->get('expiring_alert_threshold'));
        Settings::set('repair_alert_threshold', $request->get('repair_alert_threshold'));

        $dashboard_settings['dashboard_type'] = $request->get('dashboard_type');
        $dashboard_settings['total_assets'] = $request->get('total_assets');
        $dashboard_settings['total_deployed'] = $request->get('total_deployed');
        $dashboard_settings['for_deployment'] = $request->get('for_deployment');
        $dashboard_settings['due_for_maintenance'] = $request->get('due_for_maintenance');
        $dashboard_settings['asset_per_category'] = $request->get('asset_per_category');
        $dashboard_settings['asset_per_status'] = $request->get('asset_per_status');
        $dashboard_settings['users_per_role'] = $request->get('users_per_role');
        $dashboard_settings['asset_maintenance'] = $request->get('asset_maintenance');
        $dashboard_settings['expiring_warranty'] = $request->get('expiring_warranty');
        $dashboard_settings['expiring_licenses'] = $request->get('expiring_licenses');
        $dashboard_settings['recent_activities'] = $request->get('recent_activities');

        Settings::set(Auth::user()->id . "_dashboard", json_encode($dashboard_settings));

        Settings::clear();
        Logging::logActivity("Change settings");

        return redirect()->back()->with('successMessage', 'Settings updated!');
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
