@extends('layouts.admin.dashboard')

@section('content')
    <script src="{{ asset("js/api/easyhttp.js") }}"></script>
    <script src="{{ asset("js/admin/users/request.js") }}"></script>
    <script src="{{ asset("js/admin/users/consulter.js") }}"></script>
    <script src="{{ asset("js/admin/users/error.js") }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            data();
        });

        let data = async function(){
            try{
                const http = new easyhttp();
                const data = await http.getData("{{ route('admin.users.getUsersData') }}",http.getHTTP());
                http.formatDataTable(data);
            }catch(err){
                error(err.message);
            }
        }
    </script>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
                <div class="pull-right" style="margin-bottom: 20px;">
                    <a class="btn btn-warning" href="{{ route('admin.index') }}">Return to Home</a>
                    <a class="btn btn-secondary" href="{{ route('admin.users.create') }}">Add an account</a>
                </div>
                <table class="table table-bordered table-striped table-hover table-sm table-responsive-lg" style="text-align: center;">
                    <thead>
                    <th width="5%">Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Actions</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-md-1"> </div>
        </div>
    </div>
@endsection

