<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projetos</title>
</head>

<body>
  <!-- Header -->
  <header>
    <div>
      @auth
        <a href="{{ route('dashboard') }}">Perfil</a>
      @else
        <a href="/login">Login</a>
      @endauth
    </div>
  </header>

  <!-- Projetos em Destaque Section -->
  <section id="Destaque">
    <div>
      <h1>Projetos</h1>
      <div>
        @foreach($projects as $project)
        <div>
          <!-- <img src="{{ asset('storage/' . $project->imagem) }}" alt="Imagem do Projeto"> -->
          <div>
            <h2>{{ $project->nome }}</h2>
            <p>{{ $project->descricao }}</p>
            <a href="#">Ver mais</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Footer (opcional) -->
  <footer>
    <p>&copy; {{ date('Y') }} Seu Nome ou Nome da Empresa. Todos os direitos reservados.</p>
  </footer>
</body>

</html>
