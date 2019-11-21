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
            <div class="col-12 col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Management <small></small></h2>
                        <span class="pull-right">
                            <button type="button" class="btn btn-primary btnUserFormModal">
                                Add User
                            </button>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered genericDelete usersTable">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Date Added</th>
                                    <th width='100px'>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if(isset($data['users']) && !empty($data['users']))
                                @foreach($data['users'] as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning btnEdit" recordId="{{ $user->id }}"><span class="glyphicon glyphicon-pencil"></span>
                                        </button><button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $user->id }}" model="User"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
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
<div class="modal fade" id="userAddForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('users.store') }}" method="POST" class="form-horizontal form-label-left" name="userForm" data-parsley-validate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    
                    <input type="hidden" name="id">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="username" class="form-control" placeholder="Enter username" required="required">
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Address: <small><i>(Optional)</i></small></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="email" class="form-control" placeholder="Enter email address">
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Role: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <select name='role' class="form-control" required>
                                <option value=''>Select Role</option>
                                @if(isset($data['roles']) && !empty($data['users']))
                                @foreach($data['roles'] as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <span class="text-danger passwordNote" style="display: none;"><small>Keep blank to keep password unchanged.</small></span>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required data-parsley-equalto="#confirm_password">
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" required placeholder="Confirm password">
                            <div id="div-message" style="margin: 5px 0 0 0;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="genericFormBtn">Add</button>
                    <button type="submit" class="btn btn-warning" id="btnEdit" disabled="disable">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


