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
                    <form action="{{ url('reports/qrcodes') }}" name="depreciation_table_form" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Asset Name/Asset Tag" value="@if(isset($_POST['filterValue'])) {{  $_POST['filterValue'] }} @endif" name="filterValue">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>




        <form action="{{ route('report.qrcodes.pdf') }}" method="POST" target="_blank">

            <div class="row">
                <div class="col-12 col-md-12">

                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Assets' QR Codes</h2>

                            <div class="pull-right">

                                {{ csrf_field() }}
                                <a href="{{ url()->current() }}" class="btn btn-danger btn-sm" style="height: 25px; padding: 3px 10px;">Clear selection</a>
                                <button class="btn btn-default btn-sm" type="submit">
                                    <i class="glyphicon glyphicon-print"></i>
                                    Print/PDF
                                </button>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                        <div class="x_content">

                            <table border='0' cellpadding='10' cellspacing='0' width='100%' class="qrcodes" style='margin: 20px 0;'>

                                <tbody>
                                    @if(isset($qrcodes) && !empty($qrcodes))

                                    @php $i = 1; @endphp
                                    @foreach($qrcodes as $code)
                                    @if($i == 4) <tr> @endif
                                        <td sytle='border: 1px; padding: 50px 0;' align='center'>
                                            <input type="checkbox" name="tags[]" value="{{ $code['tag'] }}" class="flat"> &nbsp;
                                            @php $content = "Asset Tag: " . $code['tag'] . PHP_EOL . "Assigned To: " . $code['assigned_to']->assignedTo; @endphp
                                            <img data-toggle="tooltip" data-placement="top" title="Enlarge QR Code" width="150px" id="enlarge_qr" src='data:image/png;base64,{{ DNS2D::getBarcodePNG($content, "QRCODE") }}' tag="{{ $code['tag'] }}" location="{{ $code['location'] }}" assignedTo="{{ $code['assigned_to']->assignedTo}}" />
                                            <div style="margin: 5px 0 0 0;">{{ $code['name'] }}</div>
                                            <div>{{ $code['tag'] }}</div>
                                        </td>
                                        @if($i == 4) </tr> @endif
                                    @php $i++; @endphp
                                    @if($i == 4) @php $i = 1; @endphp @endif
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </form>

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


