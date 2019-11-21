@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Register License</h3>
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
                        <h2>License Information <small>Registration form</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        
                        @if(isset($license)) 
                        <form action="{{ route('licenses.update', $license->id) }}" class="form-horizontal form-label-left form" novalidate method="POST">
                            {{ method_field('PUT') }}
                        @else
                        <form action="{{ route('licenses.store') }}" class="form-horizontal form-label-left form" novalidate method="POST">
                        @endif
                            {{ csrf_field() }}


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-xs-12"><font color="red">*</font> License Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="license_type" class="form-control assetCategoryList" required disabled>
                                        <option value="">Select Category</option>
                                        @if(!empty($licenseTypes))
                                        @foreach($licenseTypes as $value)
                                        @if(isset($license) && $value->id == $license->license_type_id)
                                        <option value="{{ $value->id }}" selected='selected'>{{ $value->name }}</option>
                                        @endif
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">License Key : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="license_key" value="@if(isset($license)) {{ $license->license_key }} @endif" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Manufacturer</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="manufacturer" value="@if(isset($license)) {{ $license->manufacturer }} @endif" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendor : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="vendor" value="@if(isset($license)) {{ $license->vendor }} @endif" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description : </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="description" value="@if(isset($license)) {{ $license->description }} @endif" class="form-control" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cost : </label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <span class="input-group-addon">
                                            Php
                                        </span>
                                        <input type="text" name="cost" value="@if(isset($license)) {{ $license->cost }} @endif" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Acquisition Date : </label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12" id="acq_datepicker">
                                        <input type="text" name="acquisition_date" value="@if(isset($license)) {{ $license->acquisition_date }} @endif" id="cus_datepicker" class="form-control" readonly>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Expiration Date : </label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12"  id="exp_datepicker">
                                        <input type="text" name="expiry_date" value="@if(isset($license)) {{ $license->expiry_date }} @endif" id="cus_datepicker" class="form-control" readonly>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ url()->previous() }}" class='btn btn-default'>Back</a>
                                    <a href="{{ route('licenses.edit', $license->id) }}" class="btn btn-success">Edit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


