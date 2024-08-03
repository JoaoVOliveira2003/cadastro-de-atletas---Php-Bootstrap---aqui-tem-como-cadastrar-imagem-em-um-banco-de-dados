<?php

// Verifica se a requisição foi feita via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conexão com o banco de dados - substitua pelas suas configurações
    include "conexao.php";

    // Atribui os valores recebidos do formulário às variáveis
    $nome = $_POST['nome'];
    $instituicao = $_POST['instituicao'];
    $matricula = $_POST['matricula'];
    $rg = $_POST['rg'];

    // Corrigido: Verifica se o campo 'modalidadeColetivas' está definido
    $modalidadeColetivas = isset($_POST['modalidadeColetivas']) ? $_POST['modalidadeColetivas'] : array();
    
    // Verifica se foram selecionadas modalidades coletivas e define os valores como 0 ou 1
    $basquete = in_array('basquete', $modalidadeColetivas) ? 1 : 0;
    $futebolCampo = in_array('futebolCampo', $modalidadeColetivas) ? 1 : 0;
    $futsal = in_array('futsal', $modalidadeColetivas) ? 1 : 0;
    $handebol = in_array('handebol', $modalidadeColetivas) ? 1 : 0;
    $tenisDeMesa = in_array('tenisDeMesa', $modalidadeColetivas) ? 1 : 0;  // Corrigido
    $voleibol = in_array('voleibol', $modalidadeColetivas) ? 1 : 0;  // Corrigido
    $voleiPraia = in_array('voleiPraia', $modalidadeColetivas) ? 1 : 0;
    $xadrez = in_array('xadrez', $modalidadeColetivas) ? 1 : 0;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $caminho = 'upload/' ;//';
        $nomeFoto = $_FILES['foto']['name'];
    } else {
        $nomeFoto ='' ;//'Nenhum arquivo selecionado';
    }

    $caminhoImagem = $caminho . $nomeFoto;

    
    // Prepara a consulta SQL para inserir na tabela atletas
    $sql = "INSERT INTO atletas (nome, instituicao, matricula, rg, basquete, futebolCampo, futsal, handebol, tenisDeMesa, voleibol, voleiPraia, xadrez, caminhoImagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara a declaração SQL
    $stmt = $conexao->prepare($sql);

    // Verifica se a preparação da declaração foi bem-sucedida
    if ($stmt === false) {
        $response = array('success' => false, 'error' => 'Erro na preparação da consulta: ' . $conexao->error);
        echo json_encode($response);
        exit;
    }

    // Bind dos parâmetros e execução da consulta
    // Corrigido: String de tipos 'ssssiiiiiiii' deve corresponder ao número de variáveis
    $stmt->bind_param("ssssiiiiiiiis", $nome, $instituicao, $matricula, $rg, $basquete, $futebolCampo, $futsal, 
            $handebol, $tenisDeMesa, $voleibol, $voleiPraia, $xadrez, $caminhoImagem);

    if ($stmt->execute()) {
        // Se a inserção foi bem-sucedida, retorna um JSON indicando sucesso
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        // Se ocorreu algum erro na execução da consulta, retorna um JSON com a mensagem de erro
        $response = array('success' => false, 'error' => 'Erro ao inserir atleta no banco de dados: ' . $stmt->error);
        echo json_encode($response);
    }

    // Fecha a declaração
    $stmt->close();

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Se não foi uma requisição POST, retorna um JSON com mensagem de erro
    $response = array('success' => false, 'error' => 'Método não permitido.');
    echo json_encode($response);
}
?>
