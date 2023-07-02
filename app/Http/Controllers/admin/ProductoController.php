<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Clasificacion;
use App\Models\Marca;
use App\Models\Nacionalidad;
use App\Models\Producto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
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
            $producto = Producto::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descrip', 'LIKE', "%$keyword%")
                ->orWhere('precioant', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('stock', 'LIKE', "%$keyword%")
                ->orWhere('destacado', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->orWhere('clasificacion_id', 'LIKE', "%$keyword%")
                ->orWhere('marca_id', 'LIKE', "%$keyword%")
                ->orWhere('nacionalidad_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $producto = Producto::latest()->paginate($perPage);
        }

        return view('admin.producto.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clasificaciones = Clasificacion::all();
        $marcas = Marca::all();
        $nacionalidades = Nacionalidad::all();
        return view('admin.producto.create', compact('clasificaciones', 'marcas', 'nacionalidades'));
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

        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Alert::alert()->success('Registro Agregado', 'El registro ha sido agregado correctamente.');

        Producto::create($requestData);

        return redirect('admin/producto')->with('flash_message', 'Producto added!');
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
        $producto = Producto::findOrFail($id);

        return view('admin.producto.show', compact('producto'));
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
        $producto = Producto::findOrFail($id);
        $clasificaciones = Clasificacion::all();
        $marcas = Marca::all();
        $nacionalidades = Nacionalidad::all();
        return view('admin.producto.edit', compact('producto', 'clasificaciones', 'marcas', 'nacionalidades'));
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

        $producto = Producto::findOrFail($id);
        $producto->update($requestData);

        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/producto')->with('flash_message', 'Producto updated!');
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
        Producto::destroy($id);

        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/producto')->with('flash_message', 'Producto deleted!');
    }

    
    public function plantilla(){
        return view('plantilla.index');
    }
}
