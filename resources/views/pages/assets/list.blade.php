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
                        <h2>All Assets</h2>
                        @if(Auth::user()->hasRole('Administrator'))
                        <span class="pull-right">
                            <a href="{{ url('assets/register') }}" class="btn btn-sm btn-primary">Add New</a>
                        </span>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="assetListTable" class="table table-striped table-bordered genericDelete assetListTable">
                            <thead>
                                <tr>
                                    <th>QR</th>
                                    <th>Asset Tag</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <th>Purchased Date</th>
                                    <th>Purchased Cost</th>
                                    <th>Checked Out To</th>
                                    <th>Location</th>
                                    <th>Date Added</th>
                                    @if(Auth::user()->hasAnyRole(['Administrator', 'Allocator']))
                                    <th width='110px'>Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($records['assets']) && !empty($records['assets']))
                                @foreach($records['assets'] as $asset)
                                <tr>
                                    <td data-toggle="tooltip" data-placement="top" title="Enlarge QR Code"><a id="enlarge_qr" tag='{{ $asset->tag }}' location='{{ $asset->location }}' assignedTo='{{ $asset->assignedTo }}'><i class="glyphicon glyphicon-qrcode" style='font-size: 25px;'></i></a></td>
                                    <td><a href="{{ route('profile.show', $asset->tag) }}" data-toggle="tooltip" data-placement="top" title="View profile">{{ $asset->tag }}</a></td>
                                    <td>{{ $asset->category}}</td>
                                    <td>{{ $asset->brand }}</td>
                                    <td>{{ $asset->model }}</td>
                                    <td>{{ $asset->supplier }}</td>
                                    <td>{{ $asset->status}}</td>
                                    <td>{{ date('Y-m-d', strtotime($asset->purchasedDate)) }}</td>
                                    <td>{{ $asset->purchasedCost != '' ? "Php " . number_format($asset->purchasedCost, 2) : '-' }}</td>
                                    <td>

                                        @if( $asset->assignedType == 'personnel' )
                                        <span class="label label-info text-sm">
                                            <a href="{{ route('profile.personnel.show', $asset->assignedToId) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                @elseif($asset->assignedType == 'location')
                                                <span class="label label-warning text-sm">
                                                    <a href="{{ route('profile.location.show', $asset->assignedToId) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        @else
                                                        <span class="label label-secondary text-sm">
                                                            @endif
                                                            {{ $asset->assignedTo != null ? $asset->assignedTo : '' }}</a>
                                                </span>
                                                </td>
                                                <td>{{ $asset->location }}</td>
                                                <td>{{ date('F d, Y H:i:s', strtotime($asset->created_at)) }}</td>

                                                @if(Auth::user()->hasAnyRole(['Administrator', 'Allocator']))
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-success assignAssetBtn" @if($asset->assignedTo != null) disabled="disabled" @endif data-toggle="tooltip" data-placement="top" title="Assign To" assetTag='{{ $asset->tag }}'><span class="glyphicon glyphicon-hand-right"></span></button>
                                                    @endif
                                                    @if(Auth::user()->hasAnyRole(['Administrator']))
                                                    <a href='{{ url("assets/register/$asset->tag/edit") }}' class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                                    <button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $asset->tag }}" model="Asset" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
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

<div class="modal fade" id="assetQR" tabindex="-1" role="dialog" aria-labelledby="assetQR" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                
                <div id="qr-code-large"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="assignAssetBtn" forRefresh data-loading-text="<i class='fa fa-spinner fa-spin '></i> Assigning...">Assign</button>
            </div>
        </div>
    </div>
</div>

@endsection


