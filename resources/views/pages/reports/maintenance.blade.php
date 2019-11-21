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
                        <h2>Maintenance <small>Assets for maintenance</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-buttons"class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Job Order</th>
                                    <th>Asset Tag</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Date Endorsed</th>
                                    <th>ETC</th>
                                    <th>Date Released</th>
                                    <th>Comments/Notes: </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($records['maintenance']) && !empty($records['maintenance']))
                                @foreach($records['maintenance'] as $asset)
                                <tr>
                                    <td>{{ $asset->joborderid }}</td>
                                    <td><a href="{{ route('profile.show', $asset->asset_id) }}" data-toggle="tooltip" data-placement="top" title="View profile">{{ $asset->asset_id }}</a></td>
                                    <td>{{ $asset->asset->brand }}</td>
                                    <td>{{ $asset->asset->model }}</td>
                                    <td>{{ $asset->status->name }}</td>
                                    <td>{{ date('F d, Y H:i:s', strtotime($asset->date_endorsed)) }}</td>
                                    <td>{{ $asset->etc != null ? date('F d, Y', strtotime($asset->etc)) : '-' }}</td>
                                    <td>{{ $asset->date_released != null ? date('F d, Y H:i:s', strtotime($asset->date_released)) : '-' }}</td>
                                    <td>{{ $asset->comments }}</td>
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


