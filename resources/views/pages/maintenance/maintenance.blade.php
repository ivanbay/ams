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
                        <h2>Maintenance <small>Assets for maintenance</small></h2>
                        <span class="pull-right">
                            <a href="{{ route('maintenance.excel') }}" class="btn btn-sm btn-default">
                                <i class="glyphicon glyphicon-save"></i>
                                Excel
                            </a>
                            <a href="{{ route('maintenance.pdf') }}" target="_blank"  class="btn btn-sm btn-default">
                                <i class="glyphicon glyphicon-print"></i>
                                Print/PDF
                            </a>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="assetListTable" class="table table-striped table-bordered genericDelete assetListTable">
                            <thead>
                                <tr>
                                    <th>Job Order</th>
                                    <th>Asset Tag</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Date Endorsed</th>
                                    <th>ETC</th>
                                    <th>Comments/Notes</th>
                                    <th>Date Released</th>
                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Technician']))
                                    <th width='110px'>Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($records['maintenance']) && !empty($records['maintenance']))
                                @foreach($records['maintenance'] as $asset)
                                <tr>
                                    <td>{{ $asset->joborderid }}</a></td>
                                    <td><a href="{{ route('profile.show', $asset->asset_id) }}" data-toggle="tooltip" data-placement="top" title="View profile">{{ $asset->asset_id }}</a></td>
                                    <td>{{ $asset->asset->brand }}</td>
                                    <td>{{ $asset->asset->model }}</td>
                                    <td>{{ $asset->status->name }}</td>
                                    <td>{{ date('F d, Y H:i:s', strtotime($asset->date_endorsed)) }}</td>
                                    <td>{{ $asset->etc != null ? date('F d, Y', strtotime($asset->etc)) : '-' }}</td>
                                    <td>{{ $asset->comments }}</td>
                                    <td>{{ $asset->date_released != null ? date('F d, Y H:i:s', strtotime($asset->date_released)) : '-' }}</td>
                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Technician']))
                                    <td>
                                        <a href="{{ route('maintenance.edit', $asset->joborderid) }}" @if(strpos('Released', $asset->status->name) !== false) disabled="disabled" @endif class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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
                    <h5 class="modal-title">Asset Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Tag: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="assetTag" class="form-control" readonly='readonly'>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assign To: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="selectpicker form-control" name='assignTo' data-live-search="true">
                                <option value=''>Select Personnel/Location</option>
                                <optgroup label="Personnels">
                                    @foreach($records['personnels'] as $personnel)
                                    <option value='p_{{ $personnel->id }}'>{{ $personnel->lastname }}, {{ $personnel->firstname }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Locations">
                                    @foreach($records['locations'] as $location)
                                    <option value='l_{{ $location->id }}'>{{ $location->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="assignAssetBtn" forRefresh data-loading-text="<i class='fa fa-spinner fa-spin '></i> Assigning...">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


