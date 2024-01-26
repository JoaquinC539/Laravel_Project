<!-- resources/views/vendedores/index.blade.php -->
@extends('layouts.app')

@section('title', 'Vendedor')


@section('content')

    <form action="{{ route('vendedor.index') }}" method="GET">
        @method('GET')
        Nombre
        <input type="text" name="nombre" value="{{ request()->get('nombre') }}">
        <select name="activo">
            <option value="2">Todos</option>
            <option value="1" {{ $activo == '1' ? 'selected' : '' }}>Activos</option>
            <option value="0" {{ $activo == '0' ? 'selected' : '' }}>No activos</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <br>
    <a href="/vendedor/create" style="color: rgb(241, 241, 241)"><button class="btn" style="color: antiquewhite"><i
                class="fa fa-plus"> </i>Nuevo Vendedor</button></a>
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
    <table id="miMetodoTable"></table>

    @push('scripts')
        <script type="module">
            'use strict';
            import {
                getTemplate,
                getData,
                tableBuilder,
                fetchDelete
            } from "/resources/js/globals.js";

            window.deleteRow = async (event, element) => {
                const id = element.getAttribute('data-id');
                const response = await fetchDelete('/vendedor/' + id, csrfToken);
                await location.reload(true);
            }
            document.addEventListener("DOMContentLoaded", async () => {
                try {
                    const data = @json($vendedores);
                    const headerTemplate = await getTemplate('tableHeader');
                    const rowTemplate = await getTemplate('vendedorRow');
                    const table = tableBuilder(data, headerTemplate, rowTemplate, true)
                    document.getElementById('miMetodoTable').innerHTML = table;
                    const deleteButtons = document.querySelectorAll('.deleteVendedorRow');
                } catch (error) {
                    console.error(error)
                }
            })
        </script>
    @endpush
@endsection
