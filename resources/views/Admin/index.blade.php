/*Mostrar la lista de Administradores.*/

@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mansaje'))
{{ Session::get('mensaje') }}

@endif

<a href="{{ url('Admin/create') }}" class="btn btn-success"> Registrar nuevo Administrador </a>
<br/>
<br/>
<table class="table table-ligth">

    <thead class=thead-ligth>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @forech( $Administradores as $Admin )
        <tr>
            <td>{{ $Admin->id }}</td>

            <td>
            <img class="img-thumbnail img-fliud" src="{{asset('favicon.ico').'/'.$Admin->Foto }}" width="100" alt="">
            </td>


            <td>{{ $Admin->Nombre }}</td>
            <td>{{ $Admin->ApellidoPaterno }}</td>
            <td>{{ $Admin->ApellidoMaterno }}</td>
            <td>{{ $Admin->Correo }}</td>
            <td>

            <a href="{{ url('/Admin/'.$Admin->ID.'/edit') }}" class="btn btn-warning">
                    Editar
            </a>
             |

            <form action="{{ url('/Admin/'.$Admin->ID ) }}" class="d-inline" method="post">
            @csrf
            {{  method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
             value="Borrar">

            </form>

            </td>
        </tr>
        @endforeach

    </tbody>

</table>

</div>
@endsection
