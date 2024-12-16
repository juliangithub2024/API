@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
          <!-- Modificación de promociones del negocio: -->
            <h3 class="page__heading">   Business Promotions Modification: {{$store->name}} </h3>
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


   
    @foreach($items as $item)
    <form action="{{route('articulos.update', $item->id)}}" method="POST" enctype="multipart/form-data" >
        <input class="form-control" type="hidden" name="stores_id" value="{{$store->id}}"> 
        
        @csrf
        @method('put')


        <div class="container">
            <div class="row"> 
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                        <label> User who modified: {{Auth::user()->name}}  </label>
                        
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                            <label> Name:  </label>
                            <input class="form-control" type="text" name="name" value="{{$item->name}}">
                        
                            @error('nombre')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                            @enderror
                        </div>
                </div>


                <div class="row"> 
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                                <label> Price: </label>
                                <input class="form-control" type="text" name="price" value="{{$item->price}}">
                                
                                @error('price')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                @enderror
    
                            </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4"> 
                                        <label> Discount percentage: </label>
                                        <input class="form-control" type="text" name="discount" value="{{$item->discount}}">         
                            
                                        @error('discount')
                                            <br>
                                            <small>*{{$message}}</small>
                                            <br>
                                        @enderror
                        </div>   
                        
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                            <label> Sale price:  </label>
                            <input class="form-control" type="text" name="sale" value="{{$item->sale}}">
                            @error('sale')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                        </div>

                    </div>
    
                    <div class="grid grid-cols-1 mt-5 mx-7">  <!-- Aqui se mostrara la imagen  -->
                        <img src="/image/{{ $item->image }}" width="100px" id="imagenSeleccionada">
                    </div> 

                    <div class="row"> 
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                            <label >Subir Imagen</label>
                            <p  >Seleccione la imagen</p>
                        
                                <input name="image" id="image" type='file' class="hidden" />

                        </div>
                    </div>  

         
                        <div class="row"> 
                             <div class="col-4 col-sm-4 col-md-4 col-lg-4">     
                                    <button type="submit" class="btn btn-primary" > Update  </button> 
                            </div>   
                     </div>       
        </div> <!--  cierre del cotainer principal del formulario  -->
</form>
      
      @endforeach


       
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