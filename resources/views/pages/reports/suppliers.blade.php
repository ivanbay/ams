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
                        <h2>Suppliers/Vendors</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-column-btn"class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Supplier</th>
                                    <th>Asset/License Key</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Purchased Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(!empty($suppliers))
                                @foreach($suppliers as $supplier)

                                @foreach($supplier->assets as $asset)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $asset->tag }}</td>
                                    <td>{{ $asset->name }}</td>
                                    <td>Asset</td>
                                    <td>{{ date('F d, Y', strtotime($asset->purchasedDate)) }}</td>
                                </tr>
                                @endforeach
                                
                                @foreach($supplier->licenses as $license)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $license->license_key }}</td>
                                    <td>{{ $license->description }}</td>
                                    <td>License ({{ $license->license_type }})</td>
                                    <td>{{ date('F d, Y', strtotime($license->acquisition_date)) }}</td>
                                </tr>
                                @endforeach

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


