@extends('layouts.admin')

@section('title', 'Edicao de Tarefas')

@section('content')
    <h1>Edicao</h1>

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
            <input type="text" name="titulo" value="{{ $data->titulo }}" />
        </label>

        <input type="submit" value="salvar" />

    </form>
@endsection