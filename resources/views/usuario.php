<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Listar Agricultores</title>
</head>
<body>
  <main>
    <header>
      <a href="{{ route('home') }}">adicionar</a>
      <a href="{{ route('usuarios') }}">listar</a>
    </header>
    <h1>Agricultores</h1>
    @foreach ($usuarios as $usuario)
      <p>Nome: {{ $usuario->nome }}</p>
      <p>Cpf/Cnpj: {{ $usuario->cnpj }}</p>
      <a href="{{ route('editar', $usuario->id) }}">Editar</a>
      <a href="{{ route('excluir', $usuario->id) }}">Excluir</a>
    @endforeach
  </main>
</body>
</html>