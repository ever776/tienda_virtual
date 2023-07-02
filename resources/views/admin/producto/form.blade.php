<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input required class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($producto->nombre) ? $producto->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descrip') ? 'has-error' : ''}}">
    <label for="descrip" class="control-label">{{ 'Descrip' }}</label>
    <input required class="form-control" name="descrip" type="text" id="descrip" value="{{ isset($producto->descrip) ? $producto->descrip : ''}}" >
    {!! $errors->first('descrip', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precioant') ? 'has-error' : ''}}">
    <label for="precioant" class="control-label">{{ 'Precioant' }}</label>
    <input required class="form-control" name="precioant" type="number" id="precioant" value="{{ isset($producto->precioant) ? $producto->precioant : ''}}" >
    {!! $errors->first('precioant', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="control-label">{{ 'Precio' }}</label>
    <input required class="form-control" name="precio" type="number" id="precio" value="{{ isset($producto->precio) ? $producto->precio : ''}}" >
    {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    <label for="stock" class="control-label">{{ 'Stock' }}</label>
    <input required class="form-control" name="stock" type="number" id="stock" value="{{ isset($producto->stock) ? $producto->stock : ''}}" >
    {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('destacado') ? 'has-error' : ''}}">
    <label for="destacado" class="control-label">{{ 'Destacado' }}</label>
    <div class="radio">
    <label><input name="destacado" type="radio" value="1" {{ (isset($producto) && 1 == $producto->destacado) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="destacado" type="radio" value="0" @if (isset($producto)) {{ (0 == $producto->destacado) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('destacado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input required class="form-control" name="foto" type="file" id="foto" value="{{ isset($producto->foto) ? $producto->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('clasificacion_id') ? 'has-error' : ''}}">
    <label for="clasificacion_id" class="control-label">{{ 'Clasificacion' }}</label>
    <select required name="clasificacion_id" class="form-control" id="exampleFormControlSelect1">
        <option value="">--Seleccione la Clasificación--</option>
        @foreach ($clasificaciones as $clasificacion)
            <option value="{{ isset($clasificacion->id) ? $clasificacion->id : '' }}"
                @if(@isset($producto))
                    @if($clasificacion->id == $producto->clasificacion_id)
                        selected
                    @endif                   
                @endif
               >{{ $clasificacion->descrip }}</option>
        @endforeach
    </select>
    {!! $errors->first('clasificacion_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
    <label for="marca_id" class="control-label">{{ 'Marca' }}</label>
    <select required name="marca_id" class="form-control" id="exampleFormControlSelect1">
        <option value="">--Seleccione la Marca--</option>
        @foreach ($marcas as $marca)
            <option value="{{ isset($marca->id) ? $marca->id : '' }}"
                @if(@isset($producto))
                    @if($marca->id == $producto->marca_id)
                        selected
                    @endif                   
                @endif
               >{{ $marca->nombre }}</option>
        @endforeach
    </select>
    {!! $errors->first('marca_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nacionalidad_id') ? 'has-error' : ''}}">
    <label for="nacionalidad_id" class="control-label">{{ 'Nacionalidad' }}</label>
    <select required name="nacionalidad_id" class="form-control" id="exampleFormControlSelect1">
        <option value="">--Seleccione la Nacionalidad--</option>
        @foreach ($nacionalidades as $nacionalidad)
            <option value="{{ isset($nacionalidad->id) ? $nacionalidad->id : '' }}"
                @if(@isset($producto))
                    @if($nacionalidad->id == $producto->nacionalidad_id)
                        selected
                    @endif                   
                @endif
               >{{ $nacionalidad->nombre }}</option>
        @endforeach
    </select>

    {!! $errors->first('nacionalidad_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
