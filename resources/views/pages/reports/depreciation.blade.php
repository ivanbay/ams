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
                        <h2>Depreciation Table <small>Depreciated value over the span of years</small></h2>
                        <div class="pull-right">
                            <form action="{{ route('report.depreciation.pdf') }}" method="POST" target="_blank">
                                {{ csrf_field() }}
                                <input type='hidden' name="sortBy" value="{{ $settings['sortBy'] }}">
                                <input type='hidden' name="sorting" value="{{ $settings['sorting'] }}">
                                <input type='hidden' name="filterValue" value="{{ $settings['filterValue'] }}">
                                <input type='hidden' name="format" value="{{ $settings['format'] }}">
                                <button class="btn btn-default btn-sm" type="submit">
                                    <i class="glyphicon glyphicon-print"></i>
                                    Print/PDF
                                </button>
                            </form>

<!--                            <form action="{{ route('report.depreciation.excel') }}" method="POST" target="_blank">
                                {{ csrf_field() }}
                                <input type='hidden' name="sortBy" value="{{ $settings['sortBy'] }}">
                                <input type='hidden' name="sorting" value="{{ $settings['sorting'] }}">
                                <input type='hidden' name="filterValue" value="{{ $settings['filterValue'] }}">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-print"></i>
                                    Excel
                                </button>
                            </form>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <form action="{{ url('reports/depreciation') }}" name="depreciation_table_form" method="POST">
                                {{ csrf_field() }}
                                 <div class="col-md-3">
                                    <label>Lifespan Format: </label>
                                    <select name="format">
                                        <option value="day" @if(isset($settings['format']) && $settings['format'] == 'day') selected="selected" @endif)>Days</option>
                                        <option value="month" @if(isset($settings['format']) && $settings['format'] == 'month') selected="selected" @endif>Months</option>
                                        <option value="year" @if(isset($settings['format']) && $settings['format'] == 'year') selected="selected" @endif>Years</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Sort: </label>
                                    <select name="sortBy">
                                        <option value="created_at" @if(isset($settings['sortBy']) && $settings['sortBy'] == 'created_at') selected="selected" @endif)>Date of Purchased</option>
                                        <option value="lifespan" @if(isset($settings['sortBy']) && $settings['sortBy'] == 'lifespan') selected="selected" @endif>No. of years</option>
                                    </select>
                                    <select name="sorting">
                                        <option value="asc" @if(isset($settings['sorting']) && $settings['sorting'] == 'asc') selected="selected" @endif)>Ascending</option>
                                        <option value="desc" @if(isset($settings['sorting']) && $settings['sorting'] == 'desc') selected="selected" @endif)>Descending</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label>Filter: </label>
                                    <input type="text" placeholder="Enter Asset name" value="@if(isset($settings['filterValue'])) {{ $settings['filterValue'] }} @endif" name="filterValue" class="input-xs">
                                    <button type="submit">Apply sorting & filter</button>
                                    <a href="{{ url()->current() }}" class="btn btn-danger btn-xs" style="height: 25px; padding: 3px 10px;">Reset</a>
                                </div>
                            </form>
                        </div>

                        <table id="datatable-buttons"class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ ucwords($settings['format']) }} #</th>
                                    <th></th>
                                    @for($a = 1; $a <= $settings['maxYear']; $a++)
                                    <th>{{ $a }}</th>
                                    @endfor

                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($records) && count($records) > 0)
                                @foreach($records as $asset => $data)
                                <tr>
                                    <td colspan="{{ $settings['maxYear'] + 2 }}"><b>{{ $asset }}</b> ({{ $data['start'] }} - {{ $data['end'] }})</td>
                                </tr>

                                <tr>
                                    <td colspan="2">&nbsp;&nbsp;&nbsp&nbsp;Opening Book value</td>

                                    @foreach($data['depreciation'] as $value)
                                    <td>{{ number_format($value['cost']) }}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td style="border-top: none;">&nbsp;&nbsp;&nbsp&nbsp;Depreciation</td>
                                    <td style="border-top: none;">{{ $data['depreciation'][1]['rate'] }}%</td>
                                    @foreach($data['depreciation'] as $value)
                                    <td style="border-top: none;">{{ number_format($value['less']) }}</td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td style="border-top: none;">&nbsp;&nbsp;&nbsp&nbsp;Ending Book value</td>
                                    <td>{{ number_format($data['depreciation'][1]['cost']) }}</td>
                                    @foreach($data['depreciation'] as $value)
                                    <td>{{ number_format($value['newCost']) }}</td>
                                    @endforeach
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


