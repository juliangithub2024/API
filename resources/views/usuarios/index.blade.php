@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Users</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            Users
                        
                        <a class="btn btn-warning" href="{{route('usuarios.create')}}" >New</a>
                        
                        <table class="table table-striped mt-2">
                             <thead style="background-color:blueviolet">
                                 <th style="display: none;" > ID  </th>
                                 <th style="color:#fff;" > Name  </th>
                                 <th style="color:#fff;" > E-mail  </th>
                                 <th style="color:#fff;" > Rol  </th>
                                 <th style="color:#fff;" > Actions  </th>
                            </thead>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                   <tr>
                                       <td style="display: none;" > {{$usuario->id}} </td>
                                       <td> {{$usuario->name}} </td>
                                       <td> {{$usuario->email}} </td>
                                        <td> --
                                            @if(!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                @endforeach

                                            @endif    
                                        </td>
                                        <td>
                                               <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id)}}" >Update </a> 

                                               {!!Form::open(['method'=> 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style'=>'display:inline' ]) !!}
                                                    {!!  Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                               {!!Form::close()  !!}
                                        </td>                                     
                                   </tr>    
                                @endforeach


                            </tbody>
                        </table>

                        <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}

                        </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

