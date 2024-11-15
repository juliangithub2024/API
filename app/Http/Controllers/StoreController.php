<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('negocios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = Store::all();     // muestra las unidades en la parte de abajo
        return  view('negocios.create', compact('stores')); // en compact va negocios
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
     
        //$negocio->user_id = $request->user_id;
        $store->name = $request->name;
        $store->adress = $request->adress;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->altitud = $request->altitud;
        $store->latitud = $request->latitud;


        $store->save();
 
        return view('negocios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $store=Store::findOrFail($id);
    
    
        return view('negocios.show', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store= Store::findOrFail($id);
           
        $store->name = $request->name;
        $store->adress = $request->adress;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->altitud = $request->altitud;
        $store->latitud = $request->latitud;
        // Guardamos en base de datos
        $store->save();


        return view('negocios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
