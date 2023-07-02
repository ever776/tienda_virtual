<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Proveedor;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class ProveedorController extends Controller
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
            $proveedor = Proveedor::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('propietario', 'LIKE', "%$keyword%")
                ->orWhere('cinit', 'LIKE', "%$keyword%")
                ->orWhere('telcelular', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $proveedor = Proveedor::latest()->paginate($perPage);
        }

        return view('admin.proveedor.index', compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.proveedor.create');
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
        
        Proveedor::create($requestData);

        Alert::alert()->success('Registro Agregado', 'El registro ha sido agregado correctamente.');

        return redirect('admin/proveedor')->with('flash_message', 'Proveedor added!');
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
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedor.show', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedor.edit', compact('proveedor'));
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
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($requestData);

        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/proveedor')->with('flash_message', 'Proveedor updated!');
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
        Proveedor::destroy($id);
        
        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/proveedor')->with('flash_message', 'Proveedor deleted!');
    }
}
