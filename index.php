<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap/css/style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
        <h4 class="text-light mt-2">Cadastro de Alunos</h4>
    </nav>

    <div class="container mt-4">
        <form enctype="multipart/form-data" id="formulario" name="formulario"   method="POST" class="w-100" style="max-width: 800px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3">

                        <!-- <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" id="id" name="id">
                        </div> -->

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>

                        <div class="form-group">
                            <label for="instituicao">Instituição:</label>
                            <select class="form-control" id="instituicao" name="instituicao">
                                <option>IFPR</option>
                                <option>IFSC</option>
                                <option>IFC</option>
                                <option>IFRS</option>
                                <option>IFSUL</option>
                                <option>IFFAR</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg">
                        </div>

                        <div class="form-group">
                            <label for="matricula">Matrícula:</label>
                            <input type="text" class="form-control" id="matricula" name="matricula">
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo:</label>
                            <select class="form-control" id="sexo" name="sexo">
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Modalidades Coletivas:</label>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeBasquete" name="modalidadeColetivas[]" value="basquete" class="form-check-input">
                                <label for="modalidadeBasquete" class="form-check-label">Basquete</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeFutebolCampo" name="modalidadeColetivas[]" value="futebolCampo" class="form-check-input">
                                <label for="modalidadeFutebolCampo" class="form-check-label">Futebol de Campo</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeFutsal" name="modalidadeColetivas[]" value="futsal" class="form-check-input">
                                <label for="modalidadeFutsal" class="form-check-label">Futsal</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeHandebol" name="modalidadeColetivas[]" value="handebol" class="form-check-input">
                                <label for="modalidadeHandebol" class="form-check-label">Handebol</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeTenisMesa" name="modalidadeColetivas[]" value="tenisMesa" class="form-check-input">
                                <label for="modalidadeTenisMesa" class="form-check-label">Tênis de Mesa</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeVoleibal" name="modalidadeColetivas[]" value="voleibal" class="form-check-input">
                                <label for="modalidadeVoleibal" class="form-check-label">Voleibol</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" id="modalidadeVoleiPraia" name="modalidadeColetivas[]" value="voleiPraia" class="form-check-input">
                                <label for="modalidadeVoleiPraia" class="form-check-label">Vôlei de Praia</label>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="foto" class="form-label">Inserir Foto:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="image" accept="image/*">
                                    <label class="custom-file-label" for="foto">Escolher arquivo</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">

                            <button type="submit" onclick="gravarPessoa()" class="btn btn-primary">Gravar</button>
                            <button type="button" class="btn btn-secondary ml-2" onclick="location.href='index.html';">Sair</button>
                        </div>

                        

                    </div>
                </div>
            </div>
        </form>

    </div>

    <script src="jQuery/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/scripts.js"></script>
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("foto").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
</body>

</html>
