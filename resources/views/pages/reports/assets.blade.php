@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Reports</h3>
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-buttons" class="table table-striped table-bordered genericDelete assetListTable">
                            <thead>
                                <tr>
                                    <th>Asset Tag</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Purchased Date</th>
                                    <th>Purchased Cost</th>
                                    <th>Checked Out To</th>
                                    <th>Location</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($records['assets']) && !empty($records['assets']))
                                @foreach($records['assets'] as $asset)
                                <tr>
                                    <td><a href="{{ route('profile.show', $asset->tag) }}" data-toggle="tooltip" data-placement="top" title="View profile">{{ $asset->tag }}</a></td>
                                    <td>{{ $asset->category}}</td>
                                    <td>{{ $asset->brand }}</td>
                                    <td>{{ $asset->model }}</td>
                                    <td>{{ $asset->status}}</td>
                                    <td>{{ date('Y-m-d', strtotime($asset->purchasedDate)) }}</td>
                                    <td>{{ $asset->purchasedCost != '' ? "Php " . number_format($asset->purchasedCost, 2) : '-' }}</td>
                                    <td>

                                        @if( $asset->assignedType == 'personnel' )
                                        <span class="label label-info text-sm">
                                            <a href="{{ route('profile.personnel.show', $asset->assignedToId) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                @elseif($asset->assignedType == 'location')
                                                <span class="label label-warning text-sm">
                                                    <a>
                                                        @else
                                                        <span class="label label-secondary text-sm">
                                                            @endif
                                                            {{ $asset->assignedTo != null ? $asset->assignedTo : '' }}</a>
                                                </span>
                                                </td>
                                                <td>{{ $asset->location }}</td>
                                                <td>{{ date('F d, Y H:i:s', strtotime($asset->created_at)) }}</td>

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



                                                @endsection


