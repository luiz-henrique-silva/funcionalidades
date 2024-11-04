@extends('layouts.app')

@section('content')
<h1>Enviar Projeto</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome do Projeto:</label>
        <input type="text" class="form-control" name="title" id="nome" required>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <textarea class="form-control" name="description" id="descricao" required></textarea>
    </div>
    <div class="form-group">
        <label for="data_inicio">Data de Início:</label>
        <input type="date" class="form-control" name="data_inicio" id="data_inicio">
    </div>
    <div class="form-group">
        <label for="data_final">Data Final:</label>
        <input type="date" class="form-control" name="data_final" id="data_final">
    </div>
    <div class="form-group">
        <label for="integrantes">Integrantes:</label>
        <textarea class="form-control" name="integrantes" id="integrantes"></textarea>
    </div>
    <div class="form-group">
        <label for="curso_id">Curso:</label>
        <select class="form-control" name="curso_id" id="curso_id" onchange="fetchProfessors()">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="professor_orientador_id">Professor Orientador:</label>
        <select class="form-control" name="professor_orientador_id" id="professor_orientador_id">
            <!-- Os professores serão carregados aqui -->
        </select>
    </div>
    <div class="form-group">
        <label for="link_github">Link do GitHub:</label>
        <input type="url" class="form-control" name="link_github" id="link_github">
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Projeto</button>
</form>

<script>
    function fetchProfessors() {
        const courseId = document.getElementById('curso_id').value;

        fetch(`/api/professores?course_id=${courseId}`)
            .then(response => response.json())
            .then(data => {
                const professorSelect = document.getElementById('professor_orientador_id');
                professorSelect.innerHTML = ''; // Limpa opções anteriores

                data.forEach(professor => {
                    const option = document.createElement('option');
                    option.value = professor.id;
                    option.textContent = professor.name;
                    professorSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erro ao carregar professores:', error));
    }
</script>

@endsection
