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
                        <span class="card-title">Show Note</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.notes.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Nota:</strong>
                        {{ $note->nota }}
                    </div>
                    <div class="form-group">
                        <strong>Id User:</strong>
                        {{ $note->id_user }}
                    </div>
                    <div class="form-group">
                        <strong>Id Course:</strong>
                        {{ $note->id_course }}
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
<script>
    console.log('Hi!'); 
</script>
@stop