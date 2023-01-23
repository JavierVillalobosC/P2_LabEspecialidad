<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;

class EstadosController extends Controller
{

    public function index()
    {
        $estados = Estados::all();
        return view('estados', compact('estados'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $estado = new Estados($request->input());
        $estado->saveOrFail();
        return redirect('estados');
    }


    public function show($id)
    {
        $estado = Estados::find($id);
        return view('editEstado', compact('estado'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $estado = Estados::find($id);
        $estado->fill($request->input())->saveOrFail();
        return redirect('estados');
    }


    public function destroy($id)
    {
        $estado = Estados::find($id);
        $estado->delete();
        return redirect('estados');
    }
}
