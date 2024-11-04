@extends('layouts.app')
 
@section('content')
    
 
    
 
    <h2>Entrar</h2>
 
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <div class="logo">
            <img src="{{ asset('storage/logo_etec_pb.png') }}" alt="Logo"> <!-- Adicione aqui sua logo -->
        </div>
 
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
 
        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
 
        <!-- Novo campo Select para Aluno ou Professor -->
        <div>
            <label for="type">Tipo de Usuário:</label>
            <select name="type" id="type" required>
                <option value="aluno">Aluno</option>
                <option value="professor">Professor</option>
            </select>
            @error('type')
                <span>{{ $message }}</span>
            @enderror
        </div>
 
        <button type="submit">Entrar</button>
    </form>
@endsection
 