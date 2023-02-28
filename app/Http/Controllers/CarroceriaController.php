<?php

namespace App\Http\Controllers;

use App\Models\Carroceria;
use Illuminate\Http\Request;

/**
 * Class CarroceriaController
 * @package App\Http\Controllers
 */
class CarroceriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrocerias = Carroceria::paginate();

        return view('carroceria.index', compact('carrocerias'))
            ->with('i', (request()->input('page', 1) - 1) * $carrocerias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carroceria = new Carroceria();
        return view('carroceria.create', compact('carroceria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carroceria::$rules);

        $carroceria = Carroceria::create($request->all());

        return redirect()->route('carrocerias.index')
            ->with('success', 'Carroceria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carroceria = Carroceria::find($id);

        return view('carroceria.show', compact('carroceria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carroceria = Carroceria::find($id);

        return view('carroceria.edit', compact('carroceria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carroceria $carroceria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carroceria $carroceria)
    {
        request()->validate(Carroceria::$rules);

        $carroceria->update($request->all());

        return redirect()->route('carrocerias.index')
            ->with('success', 'Carroceria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carroceria = Carroceria::find($id)->delete();

        return redirect()->route('carrocerias.index')
            ->with('success', 'Carroceria deleted successfully');
    }
}
