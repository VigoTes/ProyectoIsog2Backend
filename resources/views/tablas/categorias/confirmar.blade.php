@extends('layout.plantilla')
@section('contenido')

    <div class="container">
        <h1>¿Desea eliminar el registro? Codigo : {{ $categoria->codcategoria }} - Descripcion:  {{ $categoria->descripcion }}  </h1>


                                    {{-- nombre de la ruta,         atributo --}}
        <form method="POST" action="{{route('categoria.destroy',$categoria->codcategoria)}}">
            @method('delete')
            @csrf
        

            <button type="submit" class="btn btn-danger">
                <i class="fas fa-check-square"></i>
                    Si
             </button>



            <a href="{{ route('cancelar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>No</a>

          </form>

    </div>

@endsection