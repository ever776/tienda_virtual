<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input required class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($nacionalidad->nombre) ? $nacionalidad->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bandera') ? 'has-error' : ''}}">
    <label for="bandera" class="control-label">{{ 'Bandera' }}</label>
    <input required class="form-control" name="bandera" type="file" id="bandera" value="{{ isset($nacionalidad->bandera) ? $nacionalidad->bandera : ''}}" >
    {!! $errors->first('bandera', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
