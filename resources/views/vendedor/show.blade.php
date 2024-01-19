@extends('layouts.app')

@section('title', 'Vendedor show')

@section('content')

<h1>Detalles del Vendedor</h1>

<p>Nombre: {{ $vendedor->nombre }}</p>
<p>Apellido: {{ $vendedor->apellido }}</p>
<!-- Otros detalles del vendedor -->

@endsection