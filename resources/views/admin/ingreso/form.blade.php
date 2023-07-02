<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input required class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($ingreso->fecha) ? $ingreso->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="control-label">{{ 'Cantidad' }}</label>
    <input required class="form-control" name="cantidad" type="number" id="cantidad" value="{{ isset($ingreso->cantidad) ? $ingreso->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('preciounit') ? 'has-error' : ''}}">
    <label for="preciounit" class="control-label">{{ 'Preciounit' }}</label>
    <input required class="form-control" name="preciounit" type="number" id="preciounit" value="{{ isset($ingreso->preciounit) ? $ingreso->preciounit : ''}}" >
    {!! $errors->first('preciounit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
    <label for="producto_id" class="control-label">{{ 'Producto Id' }}</label>
    <select required name="producto_id" class="form-control" id="exampleFormControlSelect1">
        <option value="">--Seleccione el Producto--</option>
        @foreach ($productos as $producto)
            <option value="{{ isset($producto->id) ? $producto->id : '' }}"
                @if(@isset($ingreso))
                    @if($producto->id == $ingreso->producto_id)
                        selected
                    @endif                   
                @endif
               >{{ $producto->nombre }}</option>
        @endforeach
    </select>
    {!! $errors->first('producto_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : ''}}">
    <label for="proveedor_id" class="control-label">{{ 'Proveedor Id' }}</label>
    <select required name="proveedor_id" class="form-control" id="exampleFormControlSelect1">
        <option value="">--Seleccione el Proveedor--</option>
        @foreach ($proveedores as $proveedor)
            <option value="{{ isset($proveedor->id) ? $proveedor->id : '' }}"
                @if(@isset($ingreso))
                    @if($proveedor->id == $ingreso->proveedor_id)
                        selected
                    @endif                   
                @endif
               >{{ $proveedor->nombre }}</option>
        @endforeach
    </select>
    {!! $errors->first('proveedor_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
