<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugos;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class JugosController extends Controller
{
    public function crear()
    {
    	$jugos = Jugos::all();
    	return view('admin.jugos.crear', compact('jugos'));
    }

    public function store(ItemCreateRequest $request)
    {
    	$jugos = new Jugos;

    	$jugos->nombre = $request->nombre;
    	$jugos->precio = $request->precio;
    	$jugos->stock = $request->stock;

    	$jugos->img = $request->file('img')->store('/');

    	$jugos->save();

    	return redirect('admin/jugos')->with('message', 'Guardado Satisfactoriamente!');
    }

    public function index()
    {
    	$jugos = Jugos::all();
    	return view('admin.jugos.index', compact('jugos'));
    }

    public function actualizar($id)
    {
    	$jugos = Jugos::find($id);
    	return view('admin/jugos.actualizar', ['jugos' => $jugos]);
    }

    public function update(ItemUpdateRequest $request, $id)
    {
    	$jugos = Jugos::find($id);
    	$jugos->nombre = $request->nombre;
    	$jugos->precio = $request->precio;
    	$jugos->stock = $request->stock;

    	if ($request->hasFile('img')) {
    		$jugos->img = $request->file('img')->store('/');
    	}

    	$jugos->save();

    	Session::flash('message', 'Editado Satisfactoriamente!');
    	return Redirect::to('admin/jugos');
    }

    public function eliminar($id)
    {
    	$jugos = Jugos::find($id);
    	$imagen = explode(",", $jugos->img);
    	Storage::delete($imagen);

    	Jugos::destroy($id);

    	Session::flash('message', 'Eliminado Satisfactoriamente!');
    	return Redirect::to('admin/jugos');
    }
}
