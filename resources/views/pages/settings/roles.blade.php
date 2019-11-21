@extends("../../main")

@section("content-body")

<div class="right_col" role="main" id='genericEdit'>
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
                        <h2>User Roles <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered genericDelete">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Description</th>
                                    <th>Users</th>
                                    <th>Date Added</th>
                                    <th width='100px'>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if(isset($roles) && !empty($roles))
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning btnEdit" recordId="{{ $role->id }}" route="{{ route('roles.show', $role->id) }}"><span class="glyphicon glyphicon-pencil"></span>
                                        </button><button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $role->id }}" model="Role"><span class="glyphicon glyphicon-trash"></span></button>
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
                        <h2>Add User Role<small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12 center-margin" id="addFormModal">
                            <form route="roles.store" method="post" class="form-horizontal form-label-left" id="addForm" name="addEditForm">
                                {{ csrf_field() }}
                                <input type='hidden' name='id' id='input_id'>

                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" id='input_name' class="form-control addFormModalInput" placeholder="Enter location name">
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                <div class="form-group">
                                    <label>Role Description</label>
                                    <textarea name="description" id='input_description' class="form-control" placeholder="Enter role description"></textarea>
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="submit" class="btn btn-warning" id="btnEdit" disabled="disabled">Update</button>
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


