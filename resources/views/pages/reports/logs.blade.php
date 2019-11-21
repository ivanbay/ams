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
                        <h2>Activity Logs</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-buttons" class="table table-striped table-bordered genericDelete assetListTable">
                            <thead>
                                <tr>
                                    <th width="300px">Transaction Date</th>
                                    <th width="300px">Performed By</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($logs))
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{ date('F m, Y H:i:s', strtotime($log->created_at)) }}</td>
                                    <td>{{ $log->user != null ? $log->user->name : '-' }}</td>
                                    <td>{{ $log->activity }}</td>
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

