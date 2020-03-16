@extends('layouts.admin')

@section('title', 'Configuracoes')

@section('content')
    
<h1>Configuracoes</h1>

Meu nome eh {{ $nome }}. Eu tenho {{ $idade }} anos. <br/>

    @component('components.alert')
        ola
    @endcomponent 



{{-- CONDICIONAIS UTILIZANDO O BLADE COMO UMA VIEW ENGINE --}}
{{-- @if($idade > 18)
    Eu sou maior de idade
@else
    Eu nao sou maior de idade
@endif

@isset($versao)
    Existe uma versao, v{{$versao}}
@endisset

@empty($cidade)
    Nao existe uma cidade
@endempty --}}

    <ul>
        @forelse($lista as $item)
    <li>{{$item['nome']}} - quantidade {{$item['qt']}}</li>
        @empty
            <li>Nao ha ingredientes</li>
        @endforelse
    </ul>

<form method="POST">
    @csrf

    Nome:<br/>
    <input type="text" name="nome"/> <br/>

    Idade:<br/>
    <input type="text" name="idade"/> <br/>

    Cidade:<br/>
    <input type="text" name="cidade"/> <br/>

    <input type="submit" value="Enviar" name="enviar">
</form>

<a href="/config/info">informacoes</a>
<a href="/config/permissoes">Permissoes</a>

@endsection