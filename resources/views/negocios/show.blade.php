@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
           
            <h3 class="page__heading">Modification of {{$store->name}} </h3>
        </div> <!--  Modificación de  -->
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


  


   

 
  
    <form action="{{route('negocios.update', $store->id)}}" method="POST">
        @csrf
        @method('put')


        <div class="container">
            <div class="row"> 
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                        <label>User who modified:  {{Auth::user()->name}}  </label>
                        <!-- Usuário que modifica:  -->
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                            <label> Name:  </label>
                            <input class="form-control" type="text" name="name" value="{{$store->name}}">
                        
                            @error('name')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                            @enderror
                        </div>
                </div>


                <div class="row"> 
                            <div class="col-8 col-sm-8 col-md-8 col-lg-8">  
                                <label> Address: </label> <!-- Direccion  -->
                                <input class="form-control" type="text" name="adress" value="{{$store->adress}}">
                                
                                @error('adress')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                @enderror
    
                            </div>
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4"> 
                                        <label> Phone: </label>
                                        <input class="form-control" type="text" name="phone" value="{{$store->phone}}">         
                            
                                        @error('phone')
                                            <br>
                                            <small>*{{$message}}</small>
                                            <br>
                                        @enderror
                        </div>                
                    </div>
    

                    <div class="row"> 
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8">  
                                <label> e-mail:  </label>
                                <input class="form-control" type="text" name="email" value="{{$store->email}}">
                                @error('email')
                                    <br>
                                    <small>*{{$message}}</small>
                                    <br>
                                @enderror
                            </div>
                
                           
                        </div>



                        <div class="row"> 

                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">  
                                <label> Latitud: </label>
                                <input class="form-control" type="text" name="latitud" value="{{$store->latitud}}">
                        
                                    @error('latitud')
                                        <br>
                                        <small>*{{$message}}</small>
                                        <br>
                                    @enderror
                            </div> 

                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">         
                                    <label> Longitud: </label>
                                    <input class="form-control" type="text" name="altitud" value="{{$store->altitud}}">
                            
                                        @error('altitud')
                                            <br>
                                            <small>*{{$message}}</small>
                                            <br>
                                        @enderror
                            </div>
                
                          
                   </div>

 


         
                        <div class="row"> 
                             <div class="col-4 col-sm-4 col-md-4 col-lg-4">     
                                    <button type="submit" class="btn btn-primary" > Update  </button> 
                            </div>   
                     </div>       
        </div> <!--  cierre del cotainer principal del formulario  -->
</form>
      </form>



       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

