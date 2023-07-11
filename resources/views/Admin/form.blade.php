/*Formulario que tendrá los datos en común con create y edit.*/
<h1> {{ $modo }} Admin </h1>

@if(count($errors)> 0)

    <div class="alert alert danger" role="alert">

        <ul>
        @foreach( $errars->all() as $error )

        <li> {{ $error }} </li>

        @endforeach
        </ul>
    </div>



@endif

<div class="form-group">

<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value='{{ isset($Admin->Nombre)?$Admin->Nombre:'' }}' id="Nombre">

</div>

<div class="form-group">

<label for="ApellidoPaterno"> Apellido Paterno </label>
<input type="text" class="form-control" name="ApellidoPaterno" value='{{ isset($Admin->ApellidoPaterno)?$Admin->ApellidoPaterno:'' }}' id="ApellidoPaterno">

</div>>

<div class="form-group">

<label for="ApellidoMaterno"> Apellido Materno </label>
<input type="text" class="form-control" name="ApellidoMaterno" value='{{ isset($Admin->ApellidoMaterno)?$Admin->ApellidoMaterno:'' }}' id="ApellidoMaterno">

</div>

<div class="form-group">

<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo" value='{{ isset($Admin->Correo)?$Admin->Correo:'' }}' id="Correo">

</div>

<div class="form-group">

<label for="Foto"> </label>
@if(isset($Admin->Foto))
<img class="img-thumbnail img-fliud" src="{{asset('favicon.ico').'/'.$Admin->Foto }}" width="100" alt="">
@endif
<input type="file" class="form-control" name="Foto" value="" id="Foto">

</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">


<a class="btn btn-primary href="{{ url('Admin/') }}"> Regresar </a>

<br>
