

@extends('layouts.app')


 

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('includes.mensaje')

                <div class="card-header">USUARIOS</div>

                <div class="card-body">
                  
                    <a type="button" href="{{ route('register') }}" class="btn btn-primary">Nuevo Usuario</a>
                   
                   
                    <table class="table table-hover  table-responsive table-condensed table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">@sortablelink('name', 'Nombre')</th>
                            <th scope="col">@sortablelink('cedula','Cédula')</th>
                            <th scope="col">@sortablelink('celular','Celular')</th>
                            <th scope="col">@sortablelink('fechanacimiento','Fecha de nacimiento')</th>
                            <th scope="col">@sortablelink('email', 'Correo Electrónico')</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->cedula}}</td>
                            <td>{{$user->celular}}</td> 
                            <td>{{$user->fechanacimiento}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{ url('/home/'.$user->id.'/edit') }}"  class="btn btn-warning">Editar</a> 
                    
                                
                            </td>
                            <td>
                            <form method="post" action="{{ url('/home/'.$user->id) }}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" onclick="return confirm('Está seguro que desea eliminar el registro?')" class="btn btn-danger">Eliminar</button>
                            </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$users->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
