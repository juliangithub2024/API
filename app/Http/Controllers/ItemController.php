<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $store=Store::findOrFail($id);
                    
        $items=DB::table('items')
        ->select('id','stores_id', 'name', 'price', 'discount', 'sale' , 'image')
        ->where('stores_id',$id)->get();

       
        //return "NO encontrado ";
        return view('articulos.create',compact('items', 'store'));
        //} 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              
                $store=Store::findOrFail($request->store_id);    


                $item = new Item();
                
                $item->stores_id = $request->store_id;
                $item->name = $request->name;
                $item->price = $request->price;
                $item->discount = $request->discount;
                $item->sale = $request->sale;


                if($image = $request->file('image')) {
                    $rutaGuardarImg = 'image/';
                    $imagenProducto = date('YmdHis'). "." . $image->getClientOriginalExtension();
                    $image->move($rutaGuardarImg, $imagenProducto);
                    $item->image = "$imagenProducto";  //$item['image'] = "$imagenProducto";             
                }


                       
                $item->save();

                $items=DB::table('items')
                ->select('id','stores_id', 'name', 'price', 'discount','sale','image','created_at', 'updated_at' )
                ->where('stores_id',$request->store_id)->get();

            
                return view('articulos.create', compact('items','store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cadena)
    {
        $porciones = explode("-", $cadena);
        $item_id=$porciones[0]; 
        $negocio_id=$porciones[1]; 

        $items=DB::table('items')
        ->select('id','stores_id', 'name', 'price', 'discount','sale','image','created_at', 'updated_at' )
        ->where('id',$item_id)->get();

        $store=Store::findOrFail($negocio_id);


         return view('articulos.show', compact('items','store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
                   // $unidades = Unidade::all();     // muestra las unidades en el registro de pacientes
                    
                    $store=Store::findOrFail($request->stores_id);
                    $item=Item::findOrFail($id);
                    // Seteamos un nuevo titulo
                   // $item->paciente_id = $request->paciente_id;
                    $item->name = $request->name;
                    $item->price = $request->price;
                    $item->discount = $request->discount;
                    $item->sale = $request->sale;

                    if($image = $request->file('image')){
                        $rutaGuardarImg = 'image/';
                        $imagenProducto = date('YmdHis') . "." . $image->getClientOriginalExtension(); 
                        $image->move($rutaGuardarImg, $imagenProducto);
                        //$prod['imagen'] = "$imagenProducto";
                        $item->image = "$imagenProducto";
                     }else{
                        unset($item->image);
                     }
                                      
                    
                    $item->save();

                    // Retornamos todos los articulos del negocio
                    $items=DB::table('items')
                    ->select('id','stores_id', 'name', 'price', 'discount', 'sale','image' )
                    ->where('stores_id',$request->store_id)->get();

        
                    return view('articulos.create', compact('store', 'items'));
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
