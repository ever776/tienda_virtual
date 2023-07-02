<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Nacionalidad;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class NacionalidadController extends Controller
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
            $nacionalidad = Nacionalidad::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('bandera', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nacionalidad = Nacionalidad::latest()->paginate($perPage);
        }

        return view('admin.nacionalidad.index', compact('nacionalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.nacionalidad.create');
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

        if ($request->hasFile('bandera')) {
            $requestData['bandera'] = $request->file('bandera')->store('uploads', 'public');
        }

        Nacionalidad::create($requestData);

        Alert::alert()->success('Registro agregado', 'El registro ha sido agredo correctamente.');

        return redirect('admin/nacionalidad')->with('flash_message', 'Nacionalidad added!');
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
        $nacionalidad = Nacionalidad::findOrFail($id);

        return view('admin.nacionalidad.show', compact('nacionalidad'));
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
        $nacionalidad = Nacionalidad::findOrFail($id);

        return view('admin.nacionalidad.edit', compact('nacionalidad'));
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

        $nacionalidad = Nacionalidad::findOrFail($id);
        $nacionalidad->update($requestData);

        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/nacionalidad')->with('flash_message', 'Nacionalidad updated!');
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
        Nacionalidad::destroy($id);

        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/nacionalidad')->with('flash_message', 'Nacionalidad deleted!');
    }
}
