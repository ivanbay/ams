@extends("../main")


@section('content-body')

<div class="right_col" role="main">
    <div class="">
        <div class="row">

            <!-- pie chart -->
            <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Assets</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="totalAssets_pie" style="height:350px;"></div>
                    </div>
                </div>
            </div>
            <!-- /pie charts -->

            @if(Settings::get(Auth::user()->id . '_dashboard')->total_assets == 'on')

            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->total_deployed == 'on')

            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->for_deployment == 'on')

            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->due_for_maintenance == 'on')

            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_category == 'on')
            <!-- pie chart -->
            <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asset Categories <small>Total assets per category</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="assetCategories_pie" style="height:350px;"></div>
                    </div>
                </div>
            </div>
            <!-- /pie charts -->
            @endif

        </div>

        <div class="row">

            @if(Settings::get(Auth::user()->id . '_dashboard')->asset_per_status == 'on')
            <!-- pie chart -->
            <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asset Status <small>Total assets per status</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="assetStatus_pie" style="height:350px;"></div>
                    </div>
                </div>
            </div>
            <!-- /pie charts -->
            @endif

            @if(Settings::get(Auth::user()->id . '_dashboard')->users_per_role == 'on')
            <!-- pie chart -->
            <div class="animated flipInY col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users per Role <small>Number of users per role</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="userRole_pie" style="height:350px;"></div>
                    </div>
                </div>
            </div>
            <!-- /pie charts -->           
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