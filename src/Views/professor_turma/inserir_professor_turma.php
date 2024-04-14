<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inserir Professor_turma</title>
  </head>
  <body>
    <main class="container">
        <h3>Inserir Professor_turma</h3>
        <form action="/professor_turma/novo" method="post">
            <div class="row">
                <div class="col-6">
                    <select id="id_professor" name="id_professor" class="form-select">
                        <option selected>Selecione</option>
                    <?php
                    if($dados_p != null){ #$dados foi uma variavel definida no controller
                        foreach ($dados_p as $d){
                            echo "<option value=\"{$d['id']}\">{$d['id']}</option>";
                        }
                      }
                      ?>
                    </select>
                </div>
                <div class="col-6">
                    <select id="id_turma" name="id_turma" class="form-select">
                        <option selected>Selecione</option>
                    <?php
                    if($dados_t != null){ #$dados foi uma variavel definida no controller
                        foreach ($dados_t as $d){
                            echo "<option value=\"{$d['id']}\">{$d['id']}</option>";
                        }
                      }
                      ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>