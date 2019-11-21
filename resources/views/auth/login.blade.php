@extends('../plain')

@section('body')
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">


                    <image src="{{ asset('images/login_logo.png') }}" width="150px">

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <h1>Login Form</h1>
                        <div>
                            <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input id="password" type="password" class="form-control" placeholder="password" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit pull-right">
                                Log in
                            </button>
                            <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
<!--                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>-->

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>{{ Settings::get('system_name') }}</h1>
                                <p>{{ Settings::get('login_footer_text') }}</p>
                            </div>
                        </div>
                    </form>

                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form class="form-horizontal" method="POST" action="{{ route('registerUser') }}">
                        {{ csrf_field() }}

                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus  />
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required  />
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email"  name="email" value="{{ old('email') }}" required />
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required />
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">
                                Register
                            </button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1>{{ Settings::get('system_name') }}</h1>
                                <p>{{ Settings::get('login_footer_text') }}</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

@endsection
