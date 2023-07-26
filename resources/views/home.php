<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
</head>
<body>
  <main>
    <header>
      <h1>Formulário de cadastro</h1>
      <a href="{{ route('home') }}">adicionar</a>
      <a href="{{ route('usuarios') }}">listar</a>
    </header>
    <form action="{{ route('novoUsuario') }}" method="post">
      @csrf
      <label for="">
        Razao Social:
        <input type="text" name="razao_social" value="{{ $usuario->nome }}" required>
      </label>
      <label for="">
        Nome Fantasia:
        <input type="text" name="nome_fantasia" value="{{ $usuario->fantasia }}" required>
      </label>
      <label for="">
        CPF/CNPJ:
        <input type="number" name="cnpj" value="{{ $usuario->cnpj }}" required>
      </label>
      <label for="">
        Celular:
        <input type="number" name="celular" value="{{ $usuario->celular }}">
      </label>
      <label for="">
        Cidade:
        <select name="cidades" id="id-cidade" required>
        </select>
      </label>
      <label for="">
        Estado:
        <select name="estado" id="id-estado" onchange="selecionaEstado()" required>
          @foreach ($estados as $estado)
            <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
          @endforeach
        </select>
      </label>
      
      <button type="submit">Enviar cadastro</button>
    </form>
  </main>
  <script>
    let estados = @json($estados);
    let cidades = @json($cidades);

    function selecionaEstado() {
      let selectEstado = document.getElementById('id-estado').value;
      let selectCidade = document.getElementById('id-cidade');
      selectCidade.innerHTML = '';

      let filtraCidades = cidades.filter((cidade) => {
        return cidade.id_estado === Number(selectEstado);
      });

      filtraCidades.forEach((cidade) => {
        let option = document.createElement('option');
        option.value = cidade.id;
        option.textContent = cidade.cidade;
        selectCidade.appendChild(option);
      });
    }

    selecionaEstado();
  </script>
</body>
</html>