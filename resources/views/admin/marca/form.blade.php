<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input required class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($marca->nombre) ? $marca->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input required class="form-control" name="logo" type="file" id="logo" value="{{ isset($marca->logo) ? $marca->logo : ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
