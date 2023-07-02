<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input required class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($proveedor->nombre) ? $proveedor->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('propietario') ? 'has-error' : ''}}">
    <label for="propietario" class="control-label">{{ 'Propietario' }}</label>
    <input required class="form-control" name="propietario" type="text" id="propietario" value="{{ isset($proveedor->propietario) ? $proveedor->propietario : ''}}" >
    {!! $errors->first('propietario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cinit') ? 'has-error' : ''}}">
    <label for="cinit" class="control-label">{{ 'Cinit' }}</label>
    <input required class="form-control" name="cinit" type="text" id="cinit" value="{{ isset($proveedor->cinit) ? $proveedor->cinit : ''}}" >
    {!! $errors->first('cinit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telcelular') ? 'has-error' : ''}}">
    <label for="telcelular" class="control-label">{{ 'Telcelular' }}</label>
    <input required class="form-control" name="telcelular" type="text" id="telcelular" value="{{ isset($proveedor->telcelular) ? $proveedor->telcelular : ''}}" >
    {!! $errors->first('telcelular', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input required class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($proveedor->direccion) ? $proveedor->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
