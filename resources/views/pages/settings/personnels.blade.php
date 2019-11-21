@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Settings</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    @include("../../partials/searchbar")
                </div>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12 col-md-9">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Personnels <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered genericDelete personnelsTable">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Contact Number</th>
                                    <th>Date Added</th>
                                    <th width='100px'>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if(isset($personnels) && !empty($personnels))
                                @foreach($personnels as $personnel)
                                <tr>
                                    <td><a href="{{ URL('profile/personnel') }}/{{ $personnel->id }}" data-toggle="tooltip" data-placement="top" title="View profile">{{ $personnel->id }}</a></td>
                                    <td>{{ $personnel->lastname }}</td>
                                    <td>{{ $personnel->firstname }}</td>
                                    <td>{{ $personnel->contact }}</td>
                                    <td>{{ $personnel->created_at }}</td>
                                    <td>
                                        <a href="{{ URL('profile/personnel') }}/{{ $personnel->id }}" type="button" class="btn btn-sm btn-default btnView"  data-toggle="tooltip" data-placement="top" title="View profile"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <button type="button" class="btn btn-sm btn-warning btnEdit" recordId="{{ $personnel->id }}"><span class="glyphicon glyphicon-pencil"></span>
                                        </button><button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $personnel->id }}" model="Personnel" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Updating..."><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Personnel <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12 center-margin">
                            <form action="{{ url('personnels') }}" method="POST" class="form-horizontal form-label-left" name="personnelForm" data-parsley-validate>
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label>Employee ID: </label>
                                    <input type="text" name="employeeID" class="form-control" placeholder="Enter employee ID" required="required">
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                <div class="form-group">
                                    <label>Last Name: </label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Enter last name" required>
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label>First Name: </label>
                                    <input type="text" name="firstName" class="form-control" placeholder="Enter first name" required>
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                
                                 <div class="form-group">
                                    <label>Contact Number: </label>
                                    <input type="text" name="contactNumber" class="form-control" placeholder="Enter contact number" data-parsley-type="number">
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-success" id="genericFormBtn">Add</button>
                                    <button type="submit" class="btn btn-warning" id="btnEdit" disabled="disable">Update</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


