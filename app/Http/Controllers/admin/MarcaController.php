<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Marca;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MarcaController extends Controller
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
            $marca = Marca::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $marca = Marca::latest()->paginate($perPage);
        }

        return view('admin.marca.index', compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.marca.create');
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

        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')->store('uploads', 'public');
        }

        Marca::create($requestData);
        
        Alert::alert()->success('Registro Agregado', 'El registro ha sido agregado correctamente.');

        return redirect('admin/marca')->with('flash_message', 'Marca added!');
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
        $marca = Marca::findOrFail($id);

        return view('admin.marca.show', compact('marca'));
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
        $marca = Marca::findOrFail($id);

        return view('admin.marca.edit', compact('marca'));
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

        $marca = Marca::findOrFail($id);
        $marca->update($requestData);
        
        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/marca')->with('flash_message', 'Marca updated!');
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
        Marca::destroy($id);
        
        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/marca')->with('flash_message', 'Marca deleted!');
    }
}
