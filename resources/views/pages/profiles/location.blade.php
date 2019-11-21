@extends("../../main")

@section("content-body")

<div class="right_col" role="main" id="personnel_profile">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    @include("../../partials/searchbar")
                </div>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Location</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#assgined_asset_tab" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Endorsed Asset(s)</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Endorsed Asset History</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="assgined_asset_tab" aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        <ul class="messages">
                                            @if(!empty($location->assigned_assets) && count($location->assigned_assets) > 0 )
                                            @foreach($location->assigned_assets as $asset) 
                                            <li>
                                                <div class="pull-left">
                                                    <button class="btn btn-sm btn-danger pull-out-asset" 
                                                            route="{{ route('profile.location.destroy', $asset->assetTag) }}"
                                                            data-toggle="tooltip" data-placement="top" title="Pull-out"><i class="fa fa-mail-reply-all"></i></button>
                                                </div>
                                                <div class="message_date">
                                                    <h3 class="date text-info">{{ date('d', strtotime($asset->created_at)) }}</h3>
                                                    <p class="month">{{ date('M', strtotime($asset->created_at)) }}</p>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">{{ $asset->assetTag }}: {{ $asset->asset->name }}</h4>
                                                    <blockquote class="message">{{ $asset->asset->description }}</blockquote>
                                                    <br />
                                                    <p class="url">
                                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                        <a href="#"><i class="fa fa-clock-o"></i> Endorsed {{ $asset->assignedAgo }} </a>
                                                    </p>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li>
                                                No endorsed asset yet.
                                            </li>
                                            @endif

                                        </ul>
                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Tag</th>
                                                    <th>Asset Name</th>
                                                    <th>Description</th>
                                                    <th>State</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($location->assignedAssetsHistorical) && count($location->assignedAssetsHistorical) > 0)
                                                @foreach($location->assignedAssetsHistorical as $location)
                                                <tr>
                                                    <td>{{ $location->assetTag }}</td>
                                                    <td>{{ $location->name }}</td>
                                                    <td>{{ $location->description }}</td>
                                                    <td class="hidden-phone">{{ $location->status }}</td>
                                                    <td class="vertical-align-mid">{{ date('F d, Y H:i:s', strtotime($location->created_at)) }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                No historical records yet.
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


