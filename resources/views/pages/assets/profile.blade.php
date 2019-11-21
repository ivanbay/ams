@extends("../../main")

@section("content-body")

<div class="right_col" role="main" id="asset_profile">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
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
                        <h2>Asset</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    @if(file_exists( public_path().'/images/assets/'.$asset->tag.'.jpg' ))
                                    <img class="img-responsive avatar-view" src="{{ asset('images/assets') }}/{{ $asset->tag }}.jpg" width="250px">
                                    @else
                                    <img class="img-responsive avatar-view" src="{{ asset('images/assets/default.png') }}" width="250px">
                                    @endif
                                </div>
                            </div>
                            <h3><i class="fa fa-tag"></i> {{ $asset->tag }} : {{ $asset->name }}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-location-arrow"></i> Endorsed To: {{ $asset->assigned_to != null ? $asset->assigned_to->assignedTo : '-' }}
                                </li>

                                <li>
                                    <i class="fa fa-clock-o"></i> {{ $asset->assigned_to != null ? $asset->assigned_to->created_at : '-' }}
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_tab" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">History</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-depreciation" data-toggle="tab" aria-expanded="false">Depreciation</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="maintenance-tab" data-toggle="tab" aria-expanded="false">License</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content5" role="tab" id="maintenance-tab" data-toggle="tab" aria-expanded="false">Maintenance</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_tab" aria-labelledby="profile-tab">

                                        <div class="form-horizontal form-label-left">
                                            <span class="section">Asset Information</span>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Tag : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->tag }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Asset Category : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->categoryDetails != '' ? $asset->categoryDetails->name : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Brand : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->brand != '' ? $asset->brand : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Model : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->model != '' ? $asset->model : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Description : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->description }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Status : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->statusDetails->name }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Serial : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->serial != '' ? $asset->serial : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Supplier : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->supplier != '' ? $asset->supplier->name : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Invoice No. : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->invoice_no != '' ? $asset->invoice_no : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">PO No. : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->po_no != '' ? $asset->po_no : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">OR No. : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->or_no != '' ? $asset->or_no : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Purchased Date : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ date('F d, Y', strtotime($asset->purchasedDate)) }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Purchased Cost : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->purchasedCost != '' ? "Php " . number_format($asset->purchasedCost, 2) : '' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Useful Life : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->lifespan }} Year(s)</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Warranty : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->warranty != '' ? $asset->warranty . ' Months' : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Warranty Expiration Date : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->warranty_expiry != null || $asset->warranty_expiry != '' ? $asset->warranty_expiry : '-' }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Location : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->locationDetails->name }}</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Requires License : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">@if($asset->isRequireLicense == 1) Yes @else No @endif</label>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-xs-12">Notes : </label>
                                                <div class="input-group col-md-9 col-sm-9 col-xs-12">
                                                    <label class="control-label" style="font-weight: normal;">{{ $asset->notes }}</label>
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <a href="{{ route('list.index') }}" class="btn btn-primary">Back</a>
                                                    @if(Auth::user()->hasAnyRole(['Administrator']))
                                                    <a href="{{ route('register.edit', $asset->tag) }}" class="btn btn-warning">Edit</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Personnel/Location</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($asset->historical) && count($asset->historical) > 0)
                                                @foreach($asset->historical as $rec)
                                                <tr>
                                                    <td>{{ $rec->status }}</td>
                                                    <td>{{ $rec->assignedTo }}</td>
                                                    <td class="vertical-align-mid">{{ date('F d, Y H:i:s', strtotime($rec->created_at)) }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="3">No historical records yet.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Year #</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>

                                                    @php
                                                    $maxyr = count($depTable) > 0 ? count($depTable) : 0;
                                                    @endphp

                                                    @for($a = 1; $a <= $maxyr; $a++)
                                                    <th>{{ $a }}</th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(!empty($depTable) && count($depTable) > 0)

                                                <tr>
                                                    <td>Opening Book value</td>
                                                    <td colspan="3"></td>
                                                    @foreach($depTable as $cost)
                                                    <td>{{ number_format($cost['cost']) }}</td>
                                                    @endforeach
                                                </tr>

                                                <tr>
                                                    <td style="border-top: none;">Depreciation</td>
                                                    <td style="border-top: none;">{{ $depTable[1]['rate'] }}%</td>
                                                    <td colspan="2" style="border-top: none;"></td>
                                                    @foreach($depTable as $less)
                                                    <td style="border-top: none;">{{ number_format($less['less']) }}</td>
                                                    @endforeach
                                                </tr>

                                                <tr>
                                                    <td>Ending Book value</td>
                                                    <td>{{ number_format($asset->purchasedCost) }}</td>
                                                    <td colspan="2"></td>
                                                    @foreach($depTable as $newCost)
                                                    <td>{{ number_format($newCost['newCost']) }}</td>
                                                    @endforeach
                                                </tr>

                                                @else
                                                <tr>
                                                    <td colspan="4">No records yet</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="license-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <td width='5px'></td>
                                                    <th>License Key</th>
                                                    <th>License Type</th>
                                                    <th>Description</th>
                                                    <th>Date Endorsed</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(!empty($asset->assignedLicense))
                                                <tr>
                                                    <td>
                                                        <div class="pull-left">
                                                            <button class="btn btn-sm btn-danger pull-out-license" 
                                                                    route="{{ route('profile.destroy', $asset->assignedLicense->id) }}"
                                                                    data-toggle="tooltip" data-placement="top" title="Pull-out"><i class="fa fa-mail-reply-all"></i></button>
                                                        </div>
                                                    </td>
                                                    <td>{{ $asset->assignedLicense->license->license_key }}</td>
                                                    <td>{{ $asset->assignedLicense->license->license_type->name }}</td>
                                                    <td>{{ $asset->assignedLicense->license->description }}</td>
                                                    <td>{{ date('F d, Y', strtotime($asset->assignedLicense->created_at)) }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td colspan="6">No endorsed license.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Job Order</th>
                                                    <th>Status</th>
                                                    <th>Remarks</th>
                                                    <th>Date Endorsed</th>
                                                    <th>Est. Date of Completion</th>
                                                    <th>Date Released</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($asset->maintenance) && count($asset->maintenance) > 0)
                                                @foreach($asset->maintenance as $maintenance)
                                                <tr>
                                                    <td>{{ $maintenance->joborderid }}</td>
                                                    <td>{{ $maintenance->status->name }}</td>
                                                    <td>{{ $maintenance->comments }}</td>
                                                    <td>{{ date("F d, Y", strtotime($maintenance->date_endorsed)) }}</td>
                                                    <td>{{ date("F d, Y", strtotime($maintenance->etc)) }}</td>
                                                    <td>{{ date("F d, Y", strtotime($maintenance->date_released)) }}</td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No maintenance records yet.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


