<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nube Colectiva">
    <link rel="shortcut icon" href="http://nubecolectiva.com/favicon.ico" />

    <meta name="theme-color" content="#000000" />

    <title>Como crear un CRUD con Laravel 5.8 y Bootstrap 4 </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">      

  </head>

  <body> 

        @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a href="{{ route('admin/jugos/crear') }}" class="btn btn-success mt-4 ml-3">  Agregar </a>
         
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugos as $jug)
                <tr>
                    <td class="v-align-middle">{{$jug->nombre}}</td>
                    <td class="v-align-middle">{{$jug->precio}}</td>
                    <td class="v-align-middle">{{$jug->stock}}</td>
                    <td class="v-align-middle">
                        
                        <img src="{!! asset("uploads/$jug->img") !!}" width="30" class="img-responsive">
                    </td>
                    <td class="v-align-middle">
         
                        <form action="{{ route('admin/jugos/eliminar',$jug->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
         
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="{{ route('admin/jugos/actualizar',$jug->id) }}" class="btn btn-primary">Editar</a>
         
                            <button type="submit" class="btn btn-danger">Eliminar</button>
         
                        </form>
         
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



        <script type="text/javascript">
         
            function confirmarEliminar()
            {
                var x = confirm("Estas seguro de Eliminar?");
                if (x)
                   return true;
                else
                   return false;
            }
         
        </script>

</body>
</html>