<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Item; // Item: Articulo en español
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $products = Item::all('id','name', 'price');

       // return  response()->json($products, 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show($cadena)
    {

            $porciones = explode("u", $cadena);
            $latitud1=$porciones[0]; 
            $longitud1=$porciones[1]; 

            // se obtiene las coordenadas de todos los centros comercales
            $negocios = Store::all('id','name', 'altitud','latitud');         
            
                for($i=0;$i<count($negocios);$i++){
                    $negocio= new Store();
                    $id=$negocios[$i]->id;
                    $name=$negocios[$i]->name;
                    $latitud2=$negocios[$i]->latitud;
                    $altitud2=$negocios[$i]->altitud;   // longitud    

                    // Calculo de la distancia 
                    $theta =  $longitud1 - $altitud2; 
                    $distance = (sin(deg2rad($latitud1)) * sin(deg2rad($latitud2))) + (cos(deg2rad($latitud1)) * cos(deg2rad($latitud2)) * cos(deg2rad($theta)));
                
                    $distance = acos($distance); 
                    $distance = rad2deg($distance); 
                    $distance = $distance * 60 * 1.1515; 
                
                    $distance = $distance * 1.609344;  // en kilometros
                    $distance = $distance * 1000; // en metros   
                    
                    $distance2 = round($distance);

                    if($distance<=600){    //  precio | descuento | p_venta, $name
                            $items=DB::table('items')
                            ->select('name','price', 'discount', 'sale', 'image')
                            ->where('stores_id',$id)->get();
                       // nos regresa el primer comercio que se encuentre en 200 mts a la redonda  o menos    
                       // return compact('distance2','name');
                       return $items;                        
                    }

                } 
                //return $porciones;
    }


    // Para obtener los shops
    public function shows($cadena)
    {

            $porciones = explode("u", $cadena);
            $latitud1=$porciones[0]; 
            $longitud1=$porciones[1]; 


            // se obtiene las coordenadas de todos los centros comercales
            $negocios = Store::all('id','name', 'altitud','latitud');         
            
                for($i=0;$i<count($negocios);$i++){
                    $negocio= new Store();
                    $id=$negocios[$i]->id;
                    $name=$negocios[$i]->name;
                    $latitud2=$negocios[$i]->latitud;
                    $altitud2=$negocios[$i]->altitud;   // longitud    

                    // Calculo de la distancia 
                    $theta =  $longitud1 - $altitud2; 
                    $distance = (sin(deg2rad($latitud1)) * sin(deg2rad($latitud2))) + (cos(deg2rad($latitud1)) * cos(deg2rad($latitud2)) * cos(deg2rad($theta)));
                
                    $distance = acos($distance); 
                    $distance = rad2deg($distance); 
                    $distance = $distance * 60 * 1.1515; 
                
                    $distance = $distance * 1.609344;  // en kilometros
                    $distance = $distance * 1000; // en metros   
                    
                    $distance = round($distance);

                    if($distance<=500){   
                        // Si la distancia es menor a 200 m nos regresa la distancia y el nombre de  centro comercial
                                                   
                        return compact('distance','name');                                                
                    }

                }                
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
        //
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
