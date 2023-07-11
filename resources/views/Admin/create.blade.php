/*Formulario de cración de Administradores.*/

@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/Admin') }}" method="post" enctype="multipart/form-data">
@csrf
@include('Admin.form',['modo'=>'Crear'] );



</form>
</div>
@endsection
