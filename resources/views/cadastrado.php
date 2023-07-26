<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agricultor Cadastrado</title>
</head>
<body>
  <main>
    <header>
      <a href="{{ route('home') }}">adicionar</a>
      <a href="{{ route('usuarios') }}">listar</a>
    </header>
    <p>Usuário <strong>{{ $novoUsuario->nome }}</strong> cadastrado com sucesso!</p>
  </main>
</body>
</html>