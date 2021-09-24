@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show User</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.studentsuser.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                    <div class="form-group">
                        <strong>Password:</strong>
                        {{ $user->password }}
                    </div>
     

                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
