@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Producto {{ $producto->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/producto') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/producto/' . $producto->id . '/edit') }}" title="Edit Producto"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/producto' . '/' . $producto->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Producto"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $producto->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Nombre </th>
                                        <td> {{ $producto->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Descrip </th>
                                        <td> {{ $producto->descrip }} </td>
                                    </tr>
                                    <tr>
                                        <th> Precio </th>
                                        <td> {{ $producto->precio }} </td>
                                    </tr>
                                    <tr>
                                        <th> Precio Anterior </th>
                                        <td> {{ $producto->precioant }} </td>
                                    </tr>
                                    <tr>
                                        <th> Stock </th>
                                        <td> {{ $producto->stock }} </td>
                                    </tr>
                                    <tr>
                                        <th> Clasificación </th>
                                        <td> {{ $producto->clasificacion->descrip }} </td>
                                    </tr>
                                    <tr>
                                        <th> Marca </th>
                                        <td> {{ $producto->marca->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nacionalidad </th>
                                        <td> {{ $producto->nacionalidad->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Foto </th>
                                        <td><img src="{{ asset('storage') . '/' . $producto->foto }}" alt="" width="200px">
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
