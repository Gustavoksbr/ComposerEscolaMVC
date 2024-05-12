<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inserir Aluno</title>
  </head>
  <body>
    <main class="container">
        <h3>Inserir Aluno</h3>
        <form action="/aluno/novo" method="post">
            <div class="row">
                <div class="col-6">
                    <label for="id" class="form-label">ID:</label>
                    <input type="number" name="id" class="form-control" >
                </div>
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-6">
                <label for="turma" class="form-label">ID da turma:</label>
                    <select id="turma" name="turma" class="form-select" required>
                        <option selected>Selecione</option>
                    <?php
                    if($dados != null){ #$dados foi uma variavel definida no controller
                        foreach ($dados as $d){
                            echo "<option value=\"{$d['id']}\">{$d['id']}</option>";
                        }
                      }
                      ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Salvar
            </button>
            <a href="/aluno" class="btn btn-secondary">
                Voltar
            </a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>