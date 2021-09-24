<div class="form-group" >
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'INGRESE EL NOMBRE DEL ROL']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror

</div>

<h2 class="h3">Lista de Permisos</h2>


@foreach ($permissions as $permission)
    <div>
        
        <label for="">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
            {{$permission->description}}
        </label>
        
    </div>
@endforeach