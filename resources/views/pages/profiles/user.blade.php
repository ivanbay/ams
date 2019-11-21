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
                        <h2>User</h2>
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
                                    @if(file_exists( public_path().'/images/users/'.$user->id.'.jpg' ))
                                    <img class="img-responsive avatar-view" src="{{ asset('images/users') }}/{{ $user->id }}.jpg" width="250px">
                                    @else
                                    <img class="img-responsive avatar-view" src="{{ asset('images/profile/user.png') }}" width="250px">
                                    @endif
                                </div>
                            </div>
                            <h3>{{ $user->name }}<h3>

                                    <ul class="list-unstyled user_data">
                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->role }}
                                        </li>
                                    </ul>

                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">

                                        <form class="form-horizontal form-label-left" action="{{ route('profile.user.update', $user->id) }}" method="POST" novalidate  enctype="multipart/form-data">
                                            <span class="section">Personal Information</span>

                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User ID <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="id" class="form-control col-md-7 col-xs-12" value="{{ $user->id }}" name="userid" placeholder="Enter employee number" type="text" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $user->name }}" name="name" placeholder="Enter first name" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="firstName" class="form-control col-md-7 col-xs-12" value="{{ $user->username }}" name="username" placeholder="Enter first name" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <small class="text-danger">Leave blank to keep current password</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password: </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <span class="text-danger passwordNote" style="display: none;"><small>Keep blank to keep password unchanged.</small></span>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter password" data-parsley-equalto="#confirm_password">
                                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password: </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm password">
                                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
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
                                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                                    <button id="send" type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>

                                    @endsection


