<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['Administradores']=Admin::paginate(5);
        return view('Admin.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpj',

        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=> 'La Foto'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosAdmin = request()->all();
        $datosAdmin = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosAdmin['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Admin::insert( $datosAdmin);

        // return response()->json($datosAdmin);
        return redirect('Admin')->whith('mensaje','Admin agregado con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $ID)
    {
        //
        $Admin=Admin::findOrFail($ID);
        return view('Admin.edit', compact('Admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ID)
    {
        //
        $datosAdmin = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $Admin=Admin::findOrFail($ID);

            Storage::delete('public/'.$Admin->Foto);

            $datosAdmin['Foto']=$request->file('Foto')->store('uploads','public');
            }



        Admin::where('ID','=',$ID)->update($datosAdmin);
        $Admin=Admin::findOrFail($ID);
        return view('Admin.edit', compact('Admin') );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ID)
    {
        //

        $Admin=Admin::findOrFail($ID);

        if(Storage::delete('public/'.$Admin->Foto)){

            Admin::destroy($ID);

        }




       return redirect('Admin')->with('mansaje','Admin Borrado');
    }
}
