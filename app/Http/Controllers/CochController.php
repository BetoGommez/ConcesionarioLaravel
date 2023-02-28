<?php

namespace App\Http\Controllers;

use App\Models\Carroceria;
use App\Models\Coch;
use Illuminate\Http\Request;

/**
 * Class CochController
 * @package App\Http\Controllers
 */
class CochController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = Coch::paginate();

        return view('coch.index', compact('coches'))
            ->with('i', (request()->input('page', 1) - 1) * $coches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coch = new Coch();
        $carrocerias = Carroceria::pluck('nombre','id');
        return view('coch.create',compact('coch','carrocerias'));
    }

    

      

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coch::$rules);

        $coch = Coch::create($request->all());

        return redirect()->route('coches.index')
            ->with('success', 'Coche creado satisfactioriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coch = Coch::find($id);

        return view('coch.show', compact('coch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coch = Coch::find($id);
        $carrocerias = Carroceria::pluck('nombre','id');
        return view('coch.edit',compact('coch','carrocerias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coch $coch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coch $coch)
    {
        request()->validate(Coch::$rules);

        $coch->update($request->all());

        return redirect()->route('coches.index')
            ->with('success', 'Coche actualizado correctamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coch = Coch::find($id)->delete();

        return redirect()->route('coches.index')
            ->with('success', 'Coche eliminado satisfactoriamente!');
    }
}
