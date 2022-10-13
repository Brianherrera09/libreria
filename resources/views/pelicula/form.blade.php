<div class="box box-info padding-1">
    <div class="box-body">
        
        

        <div class="form-group">
            {{ Form::label('generos_id') }}
            {{ Form::select('generos_id', $generos , $pelicula->generos_id, ['class' => 'form-control' . ($errors->has('generos_id') ? ' is-invalid' : ''), 'placeholder' => 'Generos Id']) }}
            {!! $errors->first('generos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>




        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $pelicula->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>