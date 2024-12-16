@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registro de promociones -</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
    @if ($errors->any())
         <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos!</strong>
             @foreach($errors->all() as $error)
                  <span class="badge badge-danger" >{{$error}}</span> 
             @endforeach
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true" >&times;</span>   
             </button>
         </div>
    @endif


  


 

    <form action="{{route('articulos.store')}}" method="POST"  enctype="multipart/form-data"  >
        @csrf

        <div class="container">
                    <div class="row"> 
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">       
                                <label> Usuário que registra: {{Auth::user()->name}}  </label>
                            <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input class="form-control" type="hidden" name="store_id" value="{{$store->id}}">    
                                @error('user_id')
                                <br>
                                <small>*{{$message}}</small>
                                @enderror
                        </div>
                    </div>


                    <div class="row">  <!-- Nombre del producto o servicio:  -->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                                <label> Name of the product or service: </label>            
                                <input class="form-control" type="text" name="name" value="{{old('name')}}">
                            
                                @error('name')
                                        <br>
                                        <small>*{{$message}}</small>                  
                                @enderror
                        </div>
                    </div>

                    <div class="row"> 
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                                <label> Price: </label>  <!-- Precio  -->
                                <input class="form-control" type="text" name="price" value="{{old('price')}}">
                                
                                    @error('price')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                                    <label> Discount percentage:  </label>    <!--   Prcentaje de descuento:    -->
                                    <input class="form-control" type="text" name="discount" value="{{old('discount')}}">
                                        
                                        @error('discount')
                                                <br>
                                                <small>*{{$message}}</small>
                                                <br>
                                            @enderror
                            </div>

                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">         
                                <label>Sale price:  </label>  <!-- Precio de venta:  -->
                                <input class="form-control" type="text" name="sale" value="{{old('sale')}}">
                        
                                    @error('sale')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                        </div>

                    </div>
     
 

                    <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img id="imagenSeleccionada" style="max-height: 100px;">           
                    </div>

 

                    <div class="row"> 
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                            <label >Upload Image</label>
                            <p  >Select image</p>
                        
                                <input name="image" id="image" type='file' class="hidden" />

                        </div>
                    </div>    


 
    
                   <div class="row"> 
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4"> 
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg" > Save </button> 
                        </div>   
                    </div>       
        </div> <!--  cierre del cotainer principal del formulario  -->
      </form>

      <br><br>


      <h3>   Listado de promociones  -</h3>

      <table class="table table-striped mt-2">
                <thead style="background-color:blueviolet">
                        <th style="color:#fff;">Name </th>
                        <th style="color:#fff;">Price</th>
                        <th style="color:#fff;">discount</th> <!-- Descuento  -->
                        <th style="color:#fff;">Sale price</th> <!-- Precio de venta   -->
                        <th style="color:#fff;">Image</th> 
                        <th style="color:#fff;">Actions</th>
                </thead>
               
                
           @foreach($items  as $articulo)
           <tr>
               <td>{{$articulo->name}}</td>
               <td>{{$articulo->price}} </td>
               <td>{{$articulo->discount}} </td>
               <td>{{$articulo->sale}} </td>
               <td   >
                <img src="/image/{{$articulo->image}}" width="25%">
              </td> 
               <td>    {{$cadena= $articulo->id.'-'.$store->id}}                 
                   <a href="{{route('articulos.show', $cadena)}}" class="btn btn-primary" > Editar </a>  
               </td>
          </tr>
   
       @endforeach


     
    
          </table>

 
       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

 
<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#image').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>


