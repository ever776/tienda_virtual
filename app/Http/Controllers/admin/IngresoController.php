<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ingreso = Ingreso::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('preciounit', 'LIKE', "%$keyword%")
                ->orWhere('producto_id', 'LIKE', "%$keyword%")
                ->orWhere('proveedor_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ingreso = Ingreso::latest()->paginate($perPage);
        }

        return view('admin.ingreso.index', compact('ingreso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('admin.ingreso.create', compact('productos', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Ingreso::create($requestData);

        Alert::alert()->success('Registro Agregado', 'El registro ha sido agregado correctamente.');

        return redirect('admin/ingreso')->with('flash_message', 'Ingreso added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ingreso = Ingreso::findOrFail($id);

        return view('admin.ingreso.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('admin.ingreso.edit', compact('ingreso', 'productos', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update($requestData);

        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/ingreso')->with('flash_message', 'Ingreso updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Ingreso::destroy($id);

        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/ingreso')->with('flash_message', 'Ingreso deleted!');
    }
}
