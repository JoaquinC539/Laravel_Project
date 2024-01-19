@extends('layouts.app')

@section('title', 'Mi Metodo')


@section('content')
    <h1>Mi Metodo de prueba y test</h1>
    
    {{-- @foreach($vLara as $vendedor)
        <li><a href="{{ url('/vendedor/' . $vendedor->_id) }}">{{ $vendedor->nombre }}</a></li>
    @endforeach --}}
    
    <form action="/vendedor/miMetodo" method="get">
        <input type="text" name="nombre" value="{{ request()->get('nombre') }}">
        <select name="activo">
            <option value="">Todos</option>
            <option value="1" {{ request()->get('activo') == '1' ? 'selected' : '' }}>Activos</option>
            <option value="0" {{ request()->get('activo') == '0' ? 'selected' : '' }}>No activos</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <table id="miMetodoTable"></table>

    @push('scripts')
        <script type="module" >
            import { getTemplate,getData,tableBuilder } from "/resources/js/globals.js";
            try {
                const data=@json($vendedores);
                const headerTemplate=await getTemplate('tableHeader');
                const rowTemplate=await getTemplate('vendedorRow');
                const table=tableBuilder(data,headerTemplate,rowTemplate,true)
                document.getElementById('miMetodoTable').innerHTML=table
            } catch (error) {
                console.error(error)
            }
        </script>
    @endpush
@endsection


