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
                                <h3 class="mb-0">Reset Password</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" autocomplete="off" method="POST">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control rounded-0" name="email" id="email" required>
                                    </div>
                                    <div style="text-align:right;margin-top: 20px;">
                                        <button type="submit" class="btn btn-success">Reset</button>
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
