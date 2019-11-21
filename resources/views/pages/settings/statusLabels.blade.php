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
                        <h2>Status Label <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered assetStatusTable">
                            <thead>
                                <tr>
                                    <th>Status Name</th>
                                    <th>Date Added</th>
                                    <th width='100px'>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if(isset($status) && !empty($status))
                                @foreach($status as $stat)
                                <tr>
                                    <td>{{ $stat->name }}</td>
                                    <td>{{ $stat->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning btnEdit" recordId="{{ $stat->id }}" value="{{ $stat->name }}" for="addStatus"><span class="glyphicon glyphicon-pencil"></span>
                                        </button><button type="button" class="btn btn-sm btn-danger btnDelete" recordId="{{ $stat->id }}" for="status"><span class="glyphicon glyphicon-trash"></span></button>
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
                        <h2>Add Asset Status <small></small></h2>
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
                            <form class="form-horizontal form-label-left" id="addForm" name="addModalForm">
                                <div class="form-group">
                                    <label>Status Name</label>
                                    <input type="text" name="addStatus" class="form-control addFormModalInput" placeholder="Enter status name">
                                    <div id="div-message" style="margin: 5px 0 0 0;"></div>
                                </div>
                                <div class="form-group pull-right">
                                    <button type="button" class="btn btn-success" id="addFormModalBtn" for="assetCategoryList" forRefresh>Add</button>
                                    <button type="button" class="btn btn-warning" id="addFormModalBtn" for="assetCategoryList" forRefresh>Update</button>
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


