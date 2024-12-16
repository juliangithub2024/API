@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Business Registration  -</h3>
        </div> <!--  Registro de negocios  -->
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


  


 

    <form action="{{route('negocios.store')}}" method="POST">
        @csrf

        <div class="container">
                    <div class="row"> 
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">       
                                <label>Registering user: {{Auth::user()->name}}  </label>
                            <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <!-- Usuário que registra  -->
                                @error('user_id')
                                <br>
                                <small>*{{$message}}</small>
                                @enderror
                        </div>
                    </div>


                    <div class="row"> 
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                                <label>Store name or enterprice: </label>            
                                <input class="form-control" type="text" name="name" value="{{old('name')}}">
                            
                                @error('nombre')
                                        <br>
                                        <small>*{{$message}}</small>                  
                                @enderror
                        </div>
                    </div>

                    <div class="row"> 
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">  
                                <label> Address: </label>
                                <input class="form-control" type="text" name="adress" value="{{old('adress')}}">
                                
                                    @error('adress')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4">  
                                    <label> Phone   </label>
                                    <input class="form-control" type="text" name="phone" value="{{old('phone')}}">
                                        
                                        @error('phone')
                                                <br>
                                                <small>*{{$message}}</small>
                                                <br>
                                            @enderror
                            </div>
                    </div>
    

                    <div class="row"> 
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">         
                                    <label> e-mail: </label>
                                    <input class="form-control" type="text" name="email" value="{{old('email')}}">
                            
                                        @error('email')
                                            <br>
                                            <small>*{{$message}}</small>
                                            <br>
                                        @enderror
                            </div>
                    
                   </div>


                   <div class="row"> 


                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                        <label> Latitude: </label>
                        <input class="form-control" type="text" name="latitud" value="{{old('latitud')}}">
                
                            @error('latitud')
                                <br>
                                <small>*{{$message}}</small>
                                <br>
                            @enderror
                    </div> 

                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">         
                            <label> Longitude: </label>
                            <input class="form-control" type="text" name="altitud" value="{{old('altitud')}}">
                    
                                @error('altitud')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                                @enderror
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


      <h3>   List of businesses  </h3>

      <table class="table table-striped mt-2">
                <thead style="background-color:blueviolet">
                        <th style="color:#fff;" >Store name</th>
                        <th style="color:#fff;">Address</th>
                        <th style="color:#fff;">Actions</th>
                </thead>
         

           @foreach($stores  as $store)
           <tr>
               <td>{{$store->name}}</td>
               <td>{{$store->adress}} </td>
               <td>                   
                 <a href="{{route('negocios.edit', $store->id)}}" class="btn btn-primary" > Update </a>  
                 <a href="{{route('articulos.create', $store->id)}}" class="btn btn-primary" > Add Items </a>               
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

