@if (count($errors) > 0)
<!--Formulario de errores -->

<div class="alert alert-danger">
    <strong>Algo anda mal</strong>
    <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li> 
        @endforeach
    </ul>
</div>
@endif
