@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Note</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.notes.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf

                        
                        <label  for="">ALUMNO</label>
                        @foreach ($users as $user)
                        <div>
                             
                                {!! Form::radio('id_user', $user->id ) !!}
                                {{ $user->name}}
                             
                        </div>
                        @endforeach
                        <label for="">CURSOS</label>
                        @foreach ($courses as $course)
                        <div>
                                {!! Form::radio('id_course', $course->id ) !!}
                                {{$course->name}}
                        </div>
                        @endforeach

                        @include('note.form')
                        

                    </form>
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