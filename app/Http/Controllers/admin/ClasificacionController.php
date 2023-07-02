<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Clasificacion;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class ClasificacionController extends Controller
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
            $clasificacion = Clasificacion::where('descrip', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $clasificacion = Clasificacion::latest()->paginate($perPage);
        }

        return view('admin.clasificacion.index', compact('clasificacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.clasificacion.create');
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
        
        Clasificacion::create($requestData);

        Alert::alert()->success('Registro Agregado', 'El registro ha sido agregado correctamente.');

        return redirect('admin/clasificacion')->with('flash_message', 'Clasificacion added!');
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
        $clasificacion = Clasificacion::findOrFail($id);

        return view('admin.clasificacion.show', compact('clasificacion'));
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
        $clasificacion = Clasificacion::findOrFail($id);

        return view('admin.clasificacion.edit', compact('clasificacion'));
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
        
        $clasificacion = Clasificacion::findOrFail($id);
        $clasificacion->update($requestData);
        
        Alert::alert()->success('Registro Actualizado', 'El registro ha sido actualizado correctamente.');

        return redirect('admin/clasificacion')->with('flash_message', 'Clasificacion updated!');
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
        Clasificacion::destroy($id);
        
        Alert::alert()->success('Registro Eliminado', 'El registro ha sido eliminado correctamente.');

        return redirect('admin/clasificacion')->with('flash_message', 'Clasificacion deleted!');
    }
}
