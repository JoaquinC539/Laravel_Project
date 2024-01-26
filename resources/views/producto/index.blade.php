@extends('layouts.app')

@section('title', 'Productos')


@section('content')

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            Productos
        </div>
        <div class="card-subtitle mb-2 text-body-secondary text-center">
            Index
        </div>
        <div class="card-subtitle">
            <div class="d-flex justify-content-center">
                <a href="{{ route('producto.create') }}" class="btn btn-primary" type="button">Nuevo Producto</a>
            </div>
        </div>
        <br>

        @if (!empty($successMessage))
            <div class="row message-container">
                <div class="col-12 bg-success message">
                    <p class="text-center" style="color: azure; font-size:1.3em">{{ $successMessage }}</p>
                </div>
            </div>
        @endif
        @if (!empty($errorMessage))
            <div class="row message-container">
                <div class="col-12 bg-danger message">
                    <p class="text-center" style="color: azure; font-size:1.3em">{{ $errorMessage }}</p>
                </div>
            </div>
        @endif
        <br>

        <br>
        <div class="card-body">
            <form class="form" id="vendedores_filter" method="GET" action="{{ route('producto.index') }}">
                @method('GET')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            value="{{ $request->get('nombre') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Categoria" name="category"
                            aria-label="category" value="{{ $request->get('category') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="number" placeholder="Precio" name="precio" aria-label="precio"
                            value="{{ number_format($request->get('precio'), 2) }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <select name="proveedor" class="form-control" id="proveedor">
                            <option value="">Selecciona un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->_id }}"
                                    {{ $proveedor->_id == $request->get('proveedor') ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <br>
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Filtrar">
            </form>
        </div>

        <div class="card-body table-responsive">
            <table class="table align-middle table-stripped" id="app-table">
                <thead>
                    <th class="text-center">Acciones</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Descripción</th>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('producto.show', $producto->_id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td class="text-center">{{ $producto->_id }}</td>
                            <td class="text-center">{{ $producto->nombre }}</td>
                            <td class="text-center">{{ $producto->category }}</td>
                            <td class="text-center">${{ $producto->precio }}</td>
                            <td class="text-center">{{ $producto->nombre_proveedor }}</td>
                            <td class="text-center">
                                <textarea class="form-control" readonly cols="30" rows="4">{{ $producto->descripcion }}</textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginator">
                {{ $productos->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            // import { fetchDelete } from '/resources/js/globals.js';
            import {
                fetchDelete
            } from '{{ asset('resources/js/globals.js') }}';
            // console.log(@json($productos));
            window.deleteRow = async (e, element) => {
                const id = element.getAttribute('data-id');
                const response = await fetchDelete('/producto/' + id, csrfToken);
                await location.reload(true);
            }

            document.addEventListener('DOMContentLoaded', () => {
                const deleteButtons = document.querySelectorAll('.deleteProductoRow');
                deleteButtons.forEach((element) => {
                    element.addEventListener('click', () => {
                        window.deleteRow(event, element);
                    });
                });
            });
        </script>
    @endpush


@endsection
