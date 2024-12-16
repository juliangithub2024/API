@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
           
            <h3 class="page__heading">  Bussinesess </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          




                            <a href="{{route('negocios.create')}}" class="nav-link nav-link-lg"  >Registar Negocio</a>

       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

