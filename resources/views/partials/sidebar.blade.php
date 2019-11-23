<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">

            <a href="{{ URL::to('dashboard') }}" class="site_title">
                @if(Settings::get('branding_format') == 'logo' || Settings::get('branding_format') == 'logo_sitename')
                <image src="{{ asset('images/logo.png') }}" width="30px">&nbsp;
                @endif
                @if(Settings::get('branding_format') == 'sitename' || Settings::get('branding_format') == 'logo_sitename')
                <span>{{ Settings::get('sitename') }}</span>
                @endif
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                @if(file_exists( public_path().'/images/users/'.Auth::user()->id.'.jpg' ))
                <img src="{{ asset('images/users') }}/{{ Auth::user()->id }}.jpg" alt="..." class="img-circle profile_img">
                @else
                <img src="{{ asset('assets/images/user.png') }}" alt="..." class="img-circle profile_img">
                @endif
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">

                <ul class="nav side-menu">
                    <li><a href="{{ url("dashboard") }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li>
                        @if(Auth::user()->hasAnyRole(['Administrator', 'technician', 'viewer', 'allocator']))
                        <a><i class="fa fa-home"></i> Assets <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if(!Auth::user()->hasAnyRole(['technician']))
                            <li><a href="{{ url('assets/list') }}">All</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['admin', 'viewer']))
                            <li><a href="{{ url('assets/licenses') }}">Licenses</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['allocator']))
                            <li><a href="{{ route('maintenance.index') }}">Maintenance</a></li>
                            @endif
                        </ul>
                        @endif
                    </li>
                    <li>
                        @if(Auth::user()->hasAnyRole(['Administrator', 'technician', 'viewer', 'allocator']))
                        <a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if(!Auth::user()->hasAnyRole(['technician']))
                            <li><a href="{{ route('report.assets.index') }}">Assets</a></li>
                            <li><a href="{{ route('report.qrcodes.index') }}">QR Codes</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['allocator']))
                            <li><a href="{{ route('report.maintenance.index') }}">Maintenance History</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['allocator', 'technician']))
                            <li><a href="{{ route('report.depreciation.index') }}">Deprecation Table</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['technician']))
                            <li><a href="{{ route('report.disposed.index') }}">Disposed Assets</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['technician']))
                            <li><a href="{{ route('report.suppliers.index') }}">Suppliers/Vendors</a></li>
                            @endif
                            @if(!Auth::user()->hasAnyRole(['technician']))
                            <li><a href="{{ route('report.activities.index') }}">Activity logs</a></li>
                            @endif

                        </ul>
                        @endif
                    </li>
                    @if(Auth::user()->hasAnyRole(['Administrator']))
                    <li><a href="{{ url('personnels') }}"><i class="fa fa-users"></i>Personnels</a></li>
                    <li><a href="{{ url('locations') }}"><i class="fa fa-map-marker"></i>Locations</a></li>
                    <li><a><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <!--<li><a href="{{ url('settings/users') }}">General Settings</a></li>-->
                            <li><a href="{{ url('settings/users') }}">User Management</a></li>
                            <li><a href="{{ url('settings/roles') }}">User Roles</a></li>
                            <li><a href="{{ url('settings/suppliers') }}">Suppliers/Vendors</a></li>
                            <li><a href="{{ url('settings/assetCategories') }}">Asset Categories</a></li>
                            <li><a href="{{ url('settings/status') }}">Status Labels</a></li>
                            <li><a href="{{ url('settings/system') }}">System Preferences</a></li>
                        </ul>
                    </li>
                    @else 
                    <li><a><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('settings/system') }}">System Preferences</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a style="cursor: arrow;">
                &nbsp;
            </a>
            <a style="cursor: arrow;">
                &nbsp;
            </a>
            <a href="{{ url('settings/system') }}" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url("logout") }}">
               <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

