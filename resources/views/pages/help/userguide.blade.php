@extends("../../main")

@section("content-body")

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Help</h3>
            </div>


        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="#" class="btn btn-default btn-sm">User Guide</a> <a href="{{ URL::to('help/installation') }}" class="btn btn-warning btn-sm">Installation Guide</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <iframe src="{{ asset('storage/userguide.pdf') }}" height="500" width="100%"></iframe>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection


