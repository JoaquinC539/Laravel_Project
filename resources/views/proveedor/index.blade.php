@extends('layouts.app')

@section('title', 'Proveedores')


@section('content')

    <div class="card w-100">
        <div class="card-title text-center mb-2">
            Proveedores
        </div>
        <div class="card-subtitle mb-2 text-body-secondary text-center">
            Index
        </div>
        <div class="card-subtitle">
            <div class="d-flex justify-content-center">
                <a href="{{ route('proveedor.create') }}" class="btn btn-primary" type="button">Nuevo Proveedor</a>
            </div>
        </div>
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
        <div class="card-subtitle">
            <form class="form" id="vendedores_filter" method="GET" action="{{ route('proveedor.index') }}">
                @method('GET')
                <div class="row">
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Nombre" name="nombre" aria-label="nombre"
                            value="{{ $request->get('nombre') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Contacto" name="contacto"
                            aria-label="contacto" value="{{ $request->get('contacto') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Email" name="email" aria-label="email"
                            value="{{ $request->get('email') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <input class="form-control " type="search" placeholder="Dirección" name="direccion"
                            aria-label="direccion" value="{{ $request->get('direccion') }}">
                    </div>
                    <div class="col-12 col-md-4 form-box">
                        <select name="activo">
                            <option value="2">Todos</option>
                            <option value="1" {{ $activo == '1' ? 'selected' : '' }}>Activos</option>
                            <option value="0" {{ $activo == '0' ? 'selected' : '' }}>No activos</option>
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
                    <th class="text-center">Contacto</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Dirección</th>
                    <th class="text-center">Activo</th>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('proveedor.show', $proveedor->_id) }}"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="deleteProveedorRow" data-id="{{ $proveedor->_id }}"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            </td>
                            <td class="text-center">{{ $proveedor->_id }}</td>
                            <td class="text-center">{{ $proveedor->nombre }}</td>
                            <td class="text-center">{{ $proveedor->contacto }}</td>
                            <td class="text-center">{{ $proveedor->email }}</td>
                            <td class="text-center">{{ $proveedor->direccion }}</td>
                            <td class="text-center">{{ $proveedor->activo ? 'Activo' : 'Inactivo' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            // import { fetchDelete } from '/resources/js/globals.js';
            import {
                fetchDelete
            } from '{{ asset('resources/js/globals.js') }}';
            window.deleteRow = async (e, element) => {
                const id = element.getAttribute('data-id');
                const response = await fetchDelete('/proveedor/' + id, csrfToken);
                await location.reload(true);
            }

            document.addEventListener('DOMContentLoaded', () => {
                const deleteButtons = document.querySelectorAll('.deleteProveedorRow');
                deleteButtons.forEach((element) => {
                    element.addEventListener('click', () => {
                        window.deleteRow(event, element);
                    });
                });
            });
        </script>
    @endpush


@endsection
