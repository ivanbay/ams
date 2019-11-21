@extends("../main")


@section('content-body')

<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">

            @if(Settings::get(Auth::user()->id . '_dashboard')->total_assets == 'on')
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <a href="{{ route('list.index') }}">
                        <div class="icon"><i class="glyphicon glyphicon-tasks"></i></div>
                        <div class="count">{{ isset($records['totalAsset']) && $records['totalAsset'] !== "" ? $records['totalAsset'] : 0 }}</div>
                        <h3>Total Assets</h3>
                        <p>Total number assets.</p>
                    </a>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->total_deployed == 'on')
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-circle"></i></div>
                    <div class="count">{{ isset($records['deployedAssets']) && $records['deployedAssets'] !== "" ? $records['deployedAssets'] : 0 }}</div>
                    <h3>Deployed</h3>
                    <p>Total number of deployed assets.</p>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->for_deployment == 'on')
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                    <div class="count">{{ isset($records['forDeployment']) && $records['forDeployment'] !== "" ? $records['forDeployment'] : 0 }}</div>
                    <h3>For Deployment</h3>
                    <p>Total number of assets due for deployment.</p>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->due_for_maintenance == 'on')
            <div class="animated flipInY col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('maintenance.index') }}">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-wrench"></i></div>
                        <div class="count">{{ isset($records['forMaintenance']) && $records['forMaintenance'] !== "" ? $records['forMaintenance'] : 0 }}</div>
                        <h3>Due for Maintenance</h3>
                        <p>Total number of assets due for maintenance.</p>
                    </div>
                </a>
            </div>
            @endif
        </div>

        <div class="row">

            @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_category == 'on')
            <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                    <div class="x_title">
                        <h2>Asset Categories <small>Assets per category</small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bar-chart"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="categories_chart_select" content="categories-numeric-content">Numeric</a></li>
                                    <li><a class="categories_chart_select" content="categories-bar-content">Bar</a></li>
                                    <li><a class="categories_chart_select" content="categories-line-content">Line</a></li>
                                    <li><a class="categories_chart_select" content="categories-pie-content">Pie</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="categories-numeric-content">
                            <table class="" style="width:100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table class="tile_info">
                                                <tbody>

                                                    @foreach($records['assetCategoriesCnt'] as $category)
                                                    <tr>
                                                        <td>
                                                            <p>{{ $category->name }} </p>
                                                        </td>
                                                        <td><span class="badge">{{ $category->assetCount }}</span></td>
                                                    </tr>
                                                    @endforeach                                                

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- bar -->
                        <div id="categories-bar-content" style="display: none;">
                            <div id="assetCategories_bar" style="width:100%; height:230px;"></div>
                        </div>

                        <div id="categories-line-content" style="display: none;">
                            <div id="assetCategories_line" style="width:100%; height:230px;"></div>
                        </div>

                        <div id="categories-pie-content" style="display: none;">
                            <div id="assetCategories_pie" style="height:230px;"></div>
                        </div>

                    </div>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_status == 'on')
            <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                    <div class="x_title">
                        <h2>Asset Status <small>Assets per status</small></h2>
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bar-chart"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="status_chart_select" content="status-numeric-content">Numeric</a></li>
                                    <li><a class="status_chart_select" content="status-bar-content">Bar</a></li>
                                    <li><a class="status_chart_select" content="status-line-content">Line</a></li>
                                    <li><a class="status_chart_select" content="status-pie-content">Pie</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="tile_info">
                                            <tbody>

                                                @foreach($records['assetStatusCnt'] as $status)
                                                <tr>
                                                    <td>
                                                        <p>{{ $status->name }} </p>
                                                    </td>
                                                    <td><span class="badge">{{ $status->assetCount }}</span></td>
                                                </tr>
                                                @endforeach    

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->users_per_role == 'on')
            <div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                    <div class="x_title">
                        <h2>Users <small>Users per role</small></h2>
                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bar-chart"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="users_chart_select" content="users-numeric-content">Numeric</a></li>
                                    <li><a class="users_chart_select" content="users-bar-content">Bar</a></li>
                                    <li><a class="users_chart_select" content="users-line-content">Line</a></li>
                                    <li><a class="users_chart_select" content="users-pie-content">Pie</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="tile_info">
                                            <tbody>

                                                @foreach($records['usersCount'] as $user)
                                                <tr>
                                                    <td>
                                                        <p>{{ $user->name }} </p>
                                                    </td>
                                                    <td><span class="badge">{{ $user->userCount }}</span></td>
                                                </tr>
                                                @endforeach 

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->asset_maintenance == 'on')
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asset Maintenance</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if( !empty($records['maintenance']) )
                        @foreach($records['maintenance'] as $maintenance)
                        <article class="media event">
                            <a class="pull-left date" data-toggle='tooltip' data-placement='top' title='Cycle Time in Days'>
                                <p class="month">Days</p>
                                <p class="day">{{ $maintenance->days_cycle_time }}</p>
                            </a>
                            <div class="media-body">
                                <a href="{{ route('maintenance.edit',$maintenance->joborderid) }}" class="title" href="#">{{ $maintenance->joborderid }} - 
                                    <i>
                                        @if($maintenance->status->name == 'On-Queue' || $maintenance->status->name == 'For Repair')
                                        <i><span class="label label-danger">{{ $maintenance->status->name }}</span></i>
                                        @elseif($maintenance->status->name == 'Ongoing Repair' || $maintenance->status->name == 'Ongoing Maintenance')
                                        <i><span class="label label-warning">{{ $maintenance->status->name }}</span></i>
                                        @elseif($maintenance->status->name == 'Released')
                                        <i><span class="label label-success">{{ $maintenance->status->name }}</span></i>
                                        @else
                                        <i>{{ $maintenance->status->name }}</i>
                                        @endif
                                    </i>
                                </a>
                                <p>(Tag: {{ $maintenance->asset_id }}) {{ $maintenance->asset->name }}</p>
                                <p>Date Endorsed: {{ date('F m, Y', strtotime($maintenance->date_endorsed)) }}</p>
                                <p>EDC: {{ $maintenance->etc != null ? date('F m, Y', strtotime($maintenance->etc)) : '-' }}</p>
                            </div>
                        </article>
                        @endforeach
                        @else
                        <p>No assets due for maintenance</p>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->expiring_warranty == 'on')
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Expiring Warranty</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        @if( !empty($records['expiringWarranty']) )
                        @foreach($records['expiringWarranty'] as $warranty)
                        <article class="media event">

                            @if(date('Ymd', strtotime($warranty['warranty_expiry'])) < date('Ymd'))
                            <a class="pull-left date" style='background-color: #FF9090;'>
                                <p class="month" >Day/s Expired</p>
                                <p class="day">{{ $warranty['days_remaining'] }}</p>
                            </a>
                            @else
                            <a class="pull-left date">
                                <p class="month">Day/s Left</p>
                                <p class="day">{{ $warranty['days_remaining'] }}</p>
                            </a>
                            @endif

                            <div class="media-body">
                                <a class="title" href="{{ route('profile.show', $warranty['tag']) }}">{{ $warranty['tag'] . ": " . $warranty['name'] }}</a>
                                <p>{{ $warranty['description'] }}</p>

                                @if(date('Ymd', strtotime($warranty['warranty_expiry'])) < date('Ymd'))
                                <p>Expired on <b>{{ date('F d, Y', strtotime($warranty['warranty_expiry'])) }}</b></p>
                                @else
                                <p>Expires on <b>{{ date('F d, Y', strtotime($warranty['warranty_expiry'])) }}</b></p>
                                @endif
                            </div>
                        </article>
                        @endforeach
                        @else
                        <p>No expiring warranty yet</p>
                        @endif


                    </div>
                </div>
            </div>
            @endif

        </div>

        <div class="row">

            @if(Settings::get(Auth::user()->id . '_dashboard')->expiring_licenses == 'on')
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Expiring Licenses</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        @if( !empty($records['expiringLicenses']) )
                        @foreach($records['expiringLicenses'] as $license)
                        <article class="media event">

                            @if(date('Ymd', strtotime($license['expiry_date'])) < date('Ymd'))
                            <a class="pull-left date" style='background-color: #FF9090;'>
                                <p class="month">Day/s Expired</p>
                                <p class="day">{{ $license['days_remaining'] }}</p>
                            </a>
                            @else
                            <a class="pull-left date">
                                <p class="month">Day/s Left</p>
                                <p class="day">{{ $license['days_remaining'] }}</p>
                            </a>
                            @endif


                            <div class="media-body">
                                <a class="title" href="{{ route('licenses.show', $license['id']) }}">{{ $license['license_key'] }}</a>
                                <p>{{ $license['description'] }}</p>
                                @if(date('Ymd', strtotime($license['expiry_date'])) < date('Ymd'))
                                <p>Expired on <b>{{ date('F d, Y', strtotime($license['expiry_date'])) }}</b></p>
                                @else
                                <p>Expires on <b>{{ date('F d, Y', strtotime($license['expiry_date'])) }}</b></p>
                                @endif

                            </div>
                        </article>
                        @endforeach
                        @else
                        <p>No expiring warranty yet</p>
                        @endif


                    </div>
                </div>
            </div>
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->recent_activities == 'on')
            <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Recent Activities</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(isset($records['activityLog']) && !empty($records['activityLog']))
                        @foreach($records['activityLog'] as $log)
                        <ul class="list-unstyled msg_list">
                            <li>
                                <a>
                                    <span class="image">
                                        @if(file_exists( public_path().'/images/users/' . $log->user->id . '.jpg' ))
                                        <img src="{{ asset('images/users') }}/{{ $log->user->id }}.jpg">
                                        @else
                                        <img src="{{ asset('assets/images/user.png') }}" alt="img">
                                        @endif
                                    </span>
                                    <span>
                                        <span>{{ $log->user->name }}</span>
                                        <span class="time">{{ $log->time_ago }}</span>
                                    </span>
                                    <span class="message">
                                        {{ $log->activity }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endif 

        </div>
    </div>
</div>

@endsection