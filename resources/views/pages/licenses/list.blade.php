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
            <div class="col-12 col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Licenses</h2>
                        @if(Auth::user()->hasRole('Administrator'))
                        <span class="pull-right">
                            <a href="{{ route('licenses.create') }}" class="btn btn-sm btn-primary">Add New</a>
                            <a href="{{ route('licenses.excel') }}" class="btn btn-sm btn-default">
                                <i class="glyphicon glyphicon-save"></i>
                                Excel
                            </a>
                            <a href="{{ route('licenses.pdf') }}" target="_blank"  class="btn btn-sm btn-default">
                                <i class="glyphicon glyphicon-print"></i>
                                Print/PDF
                            </a>
                        </span>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="licenseListTable" class="table table-striped table-bordered genericDelete licenseListTable datatable">
                            <thead>
                                <tr>
                                    <th>License Type</th>
                                    <th>Manufacturer</th>
                                    <th>Vendor</th>
                                    <th>License Key</th>
                                    <th>Number of Usage</th>
                                    <th>Available License</th>
                                    <th>Cost</th>
                                    <th>Description</th>
                                    <th>Assigned To</th>
                                    <th>Acquisition Date</th>
                                    <th>Expiry Date</th>
                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Allocator']))
                                    <th width='150px'>Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($licenses) && !empty($licenses))
                                @foreach($licenses as $license)
                                <tr>
                                    <td>{{ $license->license_type }}</td>
                                    <td>{{ $license->manufacturer }}</td>
                                    <td>{{ $license->vendor }}</td>
                                    <td>{{ $license->license_key}}</td>
                                    <td>{{ $license->number_of_usage}}</td>
                                    <td>{{ $license->number_of_usage - count($license->assignedTo) }}</td>
                                    <td>{{ $license->cost != '' ? "Php " . number_format($license->cost, 2) : '-' }}</td>
                                    <td>{{ $license->description}}</td>
                                    <td>
                                        @if( !empty($license->assignedTo))
                                        {{ $license->assignedTo->implode('asset_id', ', ') }}
                                        @endif
                                    </td>
                                    <td>{{ date('F d, Y', strtotime($license->acquisition_date)) }}</td>
                                    <td>{{ date('F d, Y', strtotime($license->expiry_date)) }}</td>

                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Allocator']))
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success assignAssetBtn" data-toggle="tooltip" data-placement="top" title="Assign To" licenseKey='{{ $license->license_key }}' licenseId='{{ $license->id }}' @if(($license->number_of_usage - count($license->assignedTo)) == 0) disabled="disabled" @endif><span class="glyphicon glyphicon-hand-right"></span></button>
                                        <a href="{{ route('licenses.edit', $license->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $license->id }}" model="License" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="assignAssetFormModal" tabindex="-1" role="dialog" aria-labelledby="assignAssetFormModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="addModalForm" id="addForm" class="form-horizontal form-label-left form">
                <div class="modal-header">
                    <h5 class="modal-title">License Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">License Key: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="licenseId">
                            <input type="text" name="licenseKey" class="form-control" readonly='readonly'>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assign To: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="selectpicker form-control" name='assignTo' data-live-search="true">
                                <option value=''>Select Asset</option>
                                @foreach($assets as $asset)
                                <option value='{{ $asset->tag }}'>{{ $asset->tag }}: {{ $asset->name }}</option>
                                @endforeach
                            </select>
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="assignLicenseBtn" forRefresh data-loading-text="<i class='fa fa-spinner fa-spin '></i> Assigning...">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


