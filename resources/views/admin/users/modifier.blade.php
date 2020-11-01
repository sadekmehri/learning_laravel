@extends('layouts.admin.dashboard')

@section('content')
    <script src="{{ asset("js/api/easyhttp.js") }}"></script>
    <script src="{{ asset("js/admin/users/request.js") }}"></script>
    <script src="{{ asset("js/admin/users/role.js" ) }}"></script>
    <script src="{{ asset("js/admin/users/modifier.js" )}}"></script>
    <script src="{{ asset("js/admin/users/error.js" )}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            data();
        });

        let data = async function(){
            try{
                const http = new easyhttp();
                const roles = await http.getData("{{ route('admin.users.getRolesData') }}",http.getHTTP());
                const person = await http.getData("{{ route('admin.users.fetch',$id) }}",http.getHTTP());
                http.formatDataRole(roles);
                http.formatDataPerson(person);
            }catch(err){
                error(err.message);
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/form_index.min.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4"></div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="pull-right" style="margin-bottom: 20px;">
                            <a class="btn btn-warning" href="{{ route('admin.users.index') }}">Users Dashboard</a>
                        </div>
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Update user</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" autocomplete="off" action="{{ action(App\Http\Controllers\admin\users\CrudUserController::class.'@update', $id) }}" method="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }} rounded-0" name="nom" id="nom" value="" required>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('nom') }}</small></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prenom</label>
                                        <input type="text" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }} rounded-0" name="prenom" id="prenom" value="" required>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('prenom') }}</small></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} rounded-0" name="email" id="email" value="" required>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('email') }}</small></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="question">Role</label>
                                        <select class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }} rounded-0" id="role" name="role" required></select>
                                        <div class="invalid-feedback"><small class="text-danger">{{ $errors->first('role') }}</small></div>
                                    </div>
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
@endsection

