@extends('layouts.admin')

@section('title', 'Aicionar Tarefas')

@section('content')
    <h1>Adicionar Tarefas</h1>

    @if($errors->any())
        @component('components.alert')
            @foreach($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        @endcomponent
    @endif

    <form method="POST">
        @csrf
        
        <label>
            titulo: <br>
            <input type="text" name="titulo" />
        </label>

        <input type="submit" value="adicionar" />

    </form>
@endsection