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
                        <h2>Personnel</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    @if(file_exists( public_path().'/images/profile/'.$personnel->id.'.jpg' ))
                                    <img class="img-responsive avatar-view" src="{{ asset('images/profile') }}/{{ $personnel->id }}.jpg" width="250px">
                                    @else
                                    <img class="img-responsive avatar-view" src="{{ asset('images/profile/user.png') }}" width="250px">
                                    @endif
                                </div>
                            </div>
                            <h3>{{ $personnel->lastname }}, {{ $personnel->firstname }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $personnel->address }}
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ $personnel->position }}
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_tab" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#assgined_asset_tab" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Endorsed Asset(s)</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Endorsed Asset History</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_tab" aria-labelledby="profile-tab">

                                        <form class="form-horizontal form-label-left" action="{{ route('profile.personnel.update', $personnel->id) }}" method="POST" novalidate  enctype="multipart/form-data">
                                            <span class="section">Personal Information</span>

                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee Number <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="id" class="form-control col-md-7 col-xs-12" value="{{ $personnel->id }}" name="name" placeholder="Enter employee number" type="text" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="lastName" class="form-control col-md-7 col-xs-12" value="{{ $personnel->lastname }}" name="lastName" placeholder="Enter last name" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $personnel->firstname }}" name="firstName" placeholder="Enter first name" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="email" name="email" value="{{ $personnel->email }}" placeholder="Enter email" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contact Number <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="contactNumber" name="contactNumber"  value="{{ $personnel->contact }}" placeholder="Enter contact number" required="required" data-validate-minmax="10,20" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea id="address" required="required" name="address" placeholder="Enter complete address" class="form-control col-md-7 col-xs-12">{{ $personnel->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Position <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="position" type="text" name="position" placeholder="Enter position"  value="{{ $personnel->position }}" class="form-control col-md-7 col-xs-12" required>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Upload Photo</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" name="image" class="form-control-file btn btn-default" id="file">
                                                    @if ($errors->has('image'))
                                                    <div class="help-block">
                                                        <span class="text-danger">ERROR: {{ $errors->first('image') }}</span>
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="ln_solid"></div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <a href="{{ route('personnels.index') }}" class="btn btn-primary">Back</a>
                                                    <button id="send" type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="assgined_asset_tab" aria-labelledby="home-tab">

                                        <!-- start recent activity -->
                                        <ul class="messages">

                                            @if(!empty($personnel->assignedAssets) && count($personnel->assignedAssets) > 0 )
                                            @foreach($personnel->assignedAssets as $asset) 
                                            <li>
                                                <div class="pull-left">
                                                    <button class="btn btn-sm btn-danger pull-out-asset" 
                                                            route="{{ route('profile.personnel.destroy', $asset->assetTag) }}"
                                                            data-toggle="tooltip" data-placement="top" title="Pull-out"><i class="fa fa-mail-reply-all"></i></button>
                                                </div>
                                                <div class="message_date">
                                                    <h3 class="date text-info">{{ date('d', strtotime($asset->created_at)) }}</h3>
                                                    <p class="month">{{ date('M', strtotime($asset->created_at)) }}</p>
                                                </div>
                                                <div class="message_wrapper">
                                                    <h4 class="heading">{{ $asset->asset->tag }}: {{ $asset->asset->name }}</h4>
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
                                                @if(!empty($personnel->assignedAssetsHistorical) && count($personnel->assignedAssetsHistorical) > 0)
                                                @foreach($personnel->assignedAssetsHistorical as $asset)
                                                <tr>
                                                    <td>{{ $asset->assetTag }}</td>
                                                    <td>{{ $asset->name }}</td>
                                                    <td>{{ $asset->description }}</td>
                                                    <td class="hidden-phone">{{ $asset->status }}</td>
                                                    <td class="vertical-align-mid">{{ date('F d, Y H:i:s', strtotime($asset->created_at)) }}</td>
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


