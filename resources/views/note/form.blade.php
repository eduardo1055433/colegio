<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('NOTA') }}
            {{ Form::text('nota', $note->nota, ['class' => 'form-control' . ($errors->has('nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
            {!! $errors->first('nota', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>