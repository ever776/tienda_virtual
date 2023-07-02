@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Ingreso {{ $ingreso->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/ingreso') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/ingreso/' . $ingreso->id . '/edit') }}" title="Edit Ingreso"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/ingreso' . '/' . $ingreso->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Ingreso"
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
                                        <td>{{ $ingreso->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Fecha </th>
                                        <td> {{ $ingreso->fecha }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cantidad </th>
                                        <td> {{ $ingreso->cantidad }} </td>
                                    </tr>
                                    <tr>
                                        <th> Preciounit </th>
                                        <td> {{ $ingreso->preciounit }} </td>
                                    </tr>
                                    <tr>
                                        <th> Producto </th>
                                        <td> {{ $ingreso->producto->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Proveedor </th>
                                        <td> {{ $ingreso->proveedor->nombre }} </td>
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
