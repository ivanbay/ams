@extends("../../main")

@section("content-body")

<div class="right_col" role="main" id='genericEdit'>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Settings</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    @include("../../partials/searchbar")
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        
        <form id="settings_form" action="{{ route('system.store') }}" method="POST" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="row">
                @if(Auth::user()->hasRole('Administrator'))
                
                    <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Application</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align">Header Color: </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" value="{{ Settings::get('header_bg_color') }}" name="header_bg_color" class="pick-a-color form-control">
                                    </div>
                                </div>

    <!--                            <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align">Sidebar Color: </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" value="{{ Settings::get('sidebar_bg_color') }}" name="sidebar_bg_color" class="pick-a-color form-control">
                                    </div>
                                </div>-->


                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="clearfix"></div>
                

                    <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Branding</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Site Name:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="sitename" class="form-control" value="{{ Settings::get('sitename') }}"/>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Logo:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="file" name="logo" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Format:</label>

                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" value="logo" @if(Settings::get('branding_format') == 'logo') checked="" @endif class="flat" name="branding_format" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div> Logo Only
                                            </label>
                                        </div>

                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" value="sitename" @if(Settings::get('branding_format') == 'sitename') checked="" @endif class="flat" name="branding_format" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div> Site Name Only
                                            </label>
                                        </div>

                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" value="logo_sitename" @if(Settings::get('branding_format') == 'logo_sitename') checked="" @endif class="flat" name="branding_format" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div> Logo and Site Name
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Footer:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="footer_text" class="form-control" value="{{ Settings::get('footer_text') }}"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                
                

                    <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Login</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">System Name:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="system_name" class="form-control" value="{{ Settings::get('system_name') }}"/>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Logo:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="file" name="login_logo" class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-3 col-sm-6 col-xs-6">Footer:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="login_footer_text" class="form-control" value="{{ Settings::get('login_footer_text') }}"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>

                @endif

                <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-bars"></i> Dashboard Content</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3  control-label">Content Type
                                </label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="bar" class="flat" @if(Settings::get(Auth::user()->id . '_dashboard')->dashboard_type == 'bar') checked="" @endif name="dashboard_type" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Bar Chart
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="line" class="flat" @if(Settings::get(Auth::user()->id . '_dashboard')->dashboard_type == 'line') checked="" @endif name="dashboard_type" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Line Chart
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="pie" class="flat" @if(Settings::get(Auth::user()->id . '_dashboard')->dashboard_type == 'pie') checked="" @endif name="dashboard_type" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Pie Chart
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="numeric" class="flat" @if(Settings::get(Auth::user()->id . '_dashboard')->dashboard_type == 'numeric') checked="" @endif name="dashboard_type" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Numbers
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <div style="margin: 0 0 20px 0;"></div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-3  control-label">Content
                                    <br>
                                    <small class="text-navy">Content to display in dashboard</small>
                                </label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='total_assets' @if(Settings::get(Auth::user()->id . '_dashboard')->total_assets == 'on') checked="checked" @endif  style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Total Assets</b> <small>(Total number of assets)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='total_deployed' @if(Settings::get(Auth::user()->id . '_dashboard')->total_deployed == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Deployed</b> <small>(Total number of deployed assets)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='for_deployment' @if(Settings::get(Auth::user()->id . '_dashboard')->for_deployment == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>For Deployment</b> <small>(Total number of assets due for deployment/release)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='due_for_maintenance' @if(Settings::get(Auth::user()->id . '_dashboard')->due_for_maintenance == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Due for Maintenance</b> <small>(Total number of assets due for maintenance)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='asset_per_category' @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_category == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Asset Categories</b> <small>(Total number of assets per Category)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='asset_per_status' @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_status == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Asset Status</b> <small>(Total number of assets per Status)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='users_per_role' @if(Settings::get(Auth::user()->id . '_dashboard')->users_per_role == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Users</b> <small>(Total number of users per Role)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='asset_maintenance' @if(Settings::get(Auth::user()->id . '_dashboard')->asset_maintenance == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Asset Maintenance</b> <small>(List of assets due for maintenance/under maintenance)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='expiring_warranty' @if(Settings::get(Auth::user()->id . '_dashboard')->expiring_warranty == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Expiring Warranty</b> <small>(List of Warranty near to expire)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='expiring_licenses' @if(Settings::get(Auth::user()->id . '_dashboard')->expiring_licenses == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Expiring Licenses</b> <small>(List of Licenses near to expire)</small>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat" name='recent_activities' @if(Settings::get(Auth::user()->id . '_dashboard')->recent_activities == 'on') checked="checked" @endif style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> <b>Recent Activities</b> <small>(List of recent user activities)</small>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                @if(Auth::user()->hasRole('Administrator'))
                
                    <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Email Notification</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group row">
                                    <label class="control-label col-lg-4 col-md-4 col-sm-6 col-xs-6">Email Alert:</label>

                                    <div class="input-group col-lg-3 col-md-6 col-sm-4 col-xs-6">
                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" value="1" @if(Settings::get('email_alert') == 1) checked="" @endif class="flat" name="email_alert" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div> Enable
                                            </label>
                                        </div>

                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green" style="position: relative;">
                                                    <input type="radio" value="0" @if(Settings::get('email_alert') == 0) checked="" @endif class="flat" name="email_alert" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div> Disable
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-4 col-sm-6 col-xs-6">Alerts Recipients List:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="alert_recipient_list" class="form-control tagsinput" value="{{ Settings::get('alert_recipient_list') }}" data-role="tagsinput" placeholder="Enter email and hit enter"/>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-4 col-sm-6 col-xs-6">Alerts CC List:</label>
                                    <div class="input-group col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="alert_cc_list" class="form-control tagsinput" value="{{ Settings::get('alert_cc_list') }}" data-role="tagsinput"  placeholder="Enter email and hit enter"/>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-4 col-sm-6 col-xs-6">Expiring Alerts Threshold:</label>
                                    <div class="input-group col-lg-3 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="expiring_alert_threshold" value="{{ Settings::get('expiring_alert_threshold') }}" class="form-control">
                                        <span class="input-group-addon">
                                            <span>Days</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group control-group row">
                                    <label class="control-label col-lg-4 col-md-4 col-sm-6 col-xs-6">Repair Alerts Threshold:</label>
                                    <div class="input-group col-lg-3 col-md-6 col-sm-4 col-xs-6">
                                        <input type="text" name="repair_alert_threshold" value="{{ Settings::get('repair_alert_threshold') }}" class="form-control">
                                        <span class="input-group-addon">
                                            <span>Days</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                @endif
                
                <div class="clearfix"></div>

                <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

</form>

</div>
</div>


@endsection


