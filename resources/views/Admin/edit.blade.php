/*Formulario de edición de Administradores.*/

@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/Admin/.$Admin->$ID') }} " method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('Admin.form', ['modo'=>'Editar'] );

</form>

</div>
@endsection
