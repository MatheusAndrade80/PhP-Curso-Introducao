@extends('layouts.app')

@section('title', 'Mostrando o usuario ' . $user->name)

@section('content')
    <h1 class="title">Mostrar Usuario {{ $user->name }}</h1>
    
    @php
        $isAdmin = true;
    @endphp
    
    @if ($user->id == 1)
        <div>Sou admin</div>
    @endif    
    
    @if (app()->environment('local'))
        {{ dump($user) }}
    @endif
@endsection