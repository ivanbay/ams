@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Assets</h3>
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
                        <h2>Maintenance Details<small>Update asset maintenance details</small></h2>
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

                        <form action="{{ route('maintenance.update', $data['asset']->joborderid) }}" class="form-horizontal form-label-left form" method="POST">
                            {{ csrf_field() }}
                            <input type='hidden' name='_method' value='PUT'>

                            <div class="item form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Order</label>
                                    <div class="input-group col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="assetTag" value="{{ $data['asset']->joborderid }}" class="form-control" placeholder="" readonly>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-tag"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Tag</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="brand" value="{{ $data['asset']->asset_id }}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="brand" value="{{ $data['asset']->asset->brand }}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Model</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="model" value="{{ $data['asset']->asset->model }}" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="status" class="form-control assetLocationList" required>
                                        <option value="">Select Status</option>
                                        @if(!empty($data['status']))
                                        @foreach($data['status'] as $value)
                                        @if($data['asset']->maintenance_status_id == $value->id)
                                        <option value="{{ $value->id }}" selected='selected'>{{ $value->name }}</option>
                                        @else
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Endorsed Date</label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" name="date_endorsed" value="{{ $data['asset']->date_endorsed }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><font color="red">*</font> ETC</label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12" id="cus_datepicker">
                                        <input type="text" name="etc" value="{{ $data['asset']->etc }}" id="cus_datepicker" class="form-control" required="required">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>    

                            <div class="form-group">
                                <div style="margin: 0 0 0 13px;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Released</label>
                                    <div class="input-group date col-md-3 col-sm-3 col-xs-12" id="cus_datepicker">
                                        <input type="text" name="date_released" value="{{ $data['asset']->date_released }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>    

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Comments/Notes</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="textarea" name="comments" class="form-control col-md-7 col-xs-12" placeholder="Max: 150 characters">{{ $data['asset']->comments }}</textarea>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ route('maintenance.index') }}" class='btn btn-default'>Cancel</a>
                                    <button id="submitBtn" type="submit" class="btn btn-success">Update</button>
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


