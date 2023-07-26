<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Agricultor</title>
</head>
<body>
  <main>
    <header>
      <h1>Formulário de edição</h1>
      <a href="{{ route('usuarios') }}">listar</a>
    </header>
    <form action="{{ route('usuarioAtualizado', $usuario->id) }}" method="post">
      @csrf
      @method("PUT")
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
     
     
      <button type="submit">Atualizar usuário</button>
    </form>
  </main>
  <script>
    let estados = @json($estados);
    let cidades = @json($cidades);
    let usuario = @json($usuario);

    function renderizaCidade() {      
      let cidadeFiltrada = cidades.filter((cidade) => {
        return cidade.id === usuario.id_cidade;
      });
      // console.log(cidade[0]);

      let estadoSelect = document.getElementById('id-estado');
      estadoSelect.value = cidadeFiltrada[0].id_estado;

      let cidadeSelect = document.getElementById('id-cidade');
      cidadeSelect.innerHTML = '';

      let cidadesFiltro = cidades.filter((cidade) => {
        return cidade.id_estado === Number(estadoSelect.value);
      });

      cidadesFiltro.forEach((cidade) => {
        let option = document.createElement('option');
        option.value = cidade.id;
        option.textContent = cidade.cidade;
        cidadeSelect.appendChild(option);
      });

      cidadeSelect.value = usuario.id_cidade;
    }

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

    function mask($val, $mask) {
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k])) $maskared .= $val[$k++];
        } else {
            if(isset($mask[$i])) $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

// Executa Javascript para mascara dinamica do CPF/CNPJ
<script language="javascript" type="text/javascript">
 $(".cnpj").mask("000.000.000-00", {
  onKeyPress: function(cpfcnpj, e, field, options) {
    const masks = ["000.000.000-000", "00.000.00000/000", "00.000.000/0000-00"];
    let mask = null;
    if (cpfcnpj.length <= 14) {
      mask = masks[0];
    } else if (cpfcnpj.length <= 15) {
      mask = masks[1];
    } else {
      mask = masks[2];
    }
    $(".cnpj").mask(mask, options);
  }
 });
 </script>

    renderizaCidade();
  </script>
</body>
</html>