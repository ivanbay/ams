@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Register Asset</h3>
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
                        <h2>Asset Information <small>Registration form</small></h2>
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

                        <form url="{{ url('assets/register') }}" class="form-horizontal form-label-left form" name="assetRegistrationForm" novalidate method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="item form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Asset Tag</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="assetTag" value="{{ old('assetTag') }}" class="form-control" placeholder="" required="required">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-tag"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-xs-12"><font color="red">*</font> Asset Category</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="category" class="form-control assetCategoryList" required>
                                        <option value="">Select Category</option>
                                        @if(!empty($lookup['assetCategories']))
                                        @foreach($lookup['assetCategories'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                @if($user->hasRole(['admin']))
                                <button type="button" class="btn btn-default addViewForm" id="addCategory" formTitle="Add Asset Category" for="assetCategoryList">Add</button>
                                @endif
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="brand" value="{{ old('brand') }}" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Model</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="model" value="{{ old('model') }}" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Name</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Description</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="description" value="{{ old('description') }}" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-xs-12"><font color="red">*</font> Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="status" class="form-control assetStatusList" required>
                                        <option value="">Select Status</option>
                                        @if(!empty($lookup['assetStatus']))
                                        @foreach($lookup['assetStatus'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                @if($user->hasRole(['admin']))
                                <button type="button" class="btn btn-default addViewForm" id="addStatus" formTitle="Add Status" for="assetStatusList">Add</button>
                                @endif
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="serial" value="{{ old('serial') }}" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-xs-12"><font color="red">*</font> Supplier</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="supplier" class="form-control" required>
                                        <option value="">Select Status</option>
                                        @if(!empty($lookup['suppliers']))
                                        @foreach($lookup['suppliers'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Purchased Date</label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12" id="cus_datepicker">
                                        <input type="text" name="purchased_date" value="{{ old('purchased_date') }}" id="cus_datepicker" class="form-control" placeholder="" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Purchase Cost</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <span class="input-group-addon">
                                            Php
                                        </span>
                                        <input type="text" name="purchase_cost" value="{{ old('purchase_cost') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Invoice Number</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="invoice_number" value="{{ old('invoice_number') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">PO Number</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="po_number" value="{{ old('po_number') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">OR Number</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="or_number" value="{{ old('or_number') }}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Useful Life</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="lifespan" value="{{ old('lifespan') }}" class="form-control" placeholder="" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                                <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="day" name="lifespan_format" @if(Settings::get('branding_format') == 'logo') checked="" @endif class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Days
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="month" name="lifespan_format" @if(Settings::get('branding_format') == 'sitename') checked="" @endif class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Months
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;">
                                                <input type="radio" value="year" name="lifespan_format" @if(Settings::get('branding_format') == 'logo_sitename') checked="" @endif class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div> Years
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Warranty</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="warranty" value="{{ old('warranty') }}" class="form-control">
                                        <span class="input-group-addon">
                                            <span>Months</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Location</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="location" class="form-control assetLocationList" required>
                                        <option value="">Select Location</option>
                                        @if(!empty($lookup['assetLocations']))
                                        @foreach($lookup['assetLocations'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                @if($user->hasRole(['admin']))
                                <button type="button" class="btn btn-default addViewForm"  id="addLocation" formTitle="Add Location" for="assetLocationList">Add</button>
                                @endif
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">&nbsp;</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="flat" name="isRequireLicense"> Require License?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Notes</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="textarea" name="notes" class="form-control col-md-7 col-xs-12" placeholder="Max: 150 characters">{{ old('notes') }}</textarea>
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
                                    <a href='{{ url('assets/list') }}' class='btn btn-default'>Cancel</a>
                                    <button id="submitBtn" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="addFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="addModalForm" id="addForm" class="form-horizontal form-label-left form">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFormModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><div id="formLabel"></div></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="brand" class="form-control addFormModalInput">
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addFormModalBtn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving...">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


