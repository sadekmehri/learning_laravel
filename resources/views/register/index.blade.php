@extends('layouts.register.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/form_index.min.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4"></div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" autocomplete="off" action="{{ action(App\Http\Controllers\RegisterController::class.'@authenticate') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} rounded-0" name="email" id="email" value="{{ old('email') }}" required>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('email') }}</small></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password </label><img src="{{ asset('photo/eye.png') }}" id="input_img" alt="" style="float: right; width:25px"/>
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} rounded-0" name="password" id="password" value="{{ old('password') }}" required>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('password') }}</small></div>
                                    </div>
                                    <a href="{{ route('home.email') }}" class="ml-auto">Forgot password?</a>
                                    <div style="text-align:center;margin-top: 20px;">
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#input_img').on('click', function() {;
            showPassword();
        });

        function showPassword() {
            const passwordField = $('#password');
            const passwordFieldType = passwordField.attr('type');
            if (passwordField.val() !== '') {
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $("#input_img").attr("src", "{{ asset('photo/hide.png') }}");
                } else {
                    passwordField.attr('type', 'password');
                    $("#input_img").attr("src", "{{ asset('photo/eye.png') }}");
                }
            }
        }
    </script>
@endsection
