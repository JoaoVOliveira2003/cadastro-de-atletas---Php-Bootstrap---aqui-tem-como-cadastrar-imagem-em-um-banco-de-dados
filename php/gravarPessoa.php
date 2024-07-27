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
    $foto=$_POST['foto'];

    // Verifica se foram selecionadas modalidades coletivas e define os valores como 0 ou 1
    $basquete = in_array('basquete', $_POST['modalidadeColetivas']) ? 1 : 0;
    $futebolCampo = in_array('futebolCampo', $_POST['modalidadeColetivas']) ? 1 : 0;
    $futsal = in_array('futsal', $_POST['modalidadeColetivas']) ? 1 : 0;
    $handebol = in_array('handebol', $_POST['modalidadeColetivas']) ? 1 : 0;
    $tenisDeMesa = in_array('tenisMesa', $_POST['modalidadeColetivas']) ? 1 : 0;
    $voleibol = in_array('voleibal', $_POST['modalidadeColetivas']) ? 1 : 0;
    $voleiPraia = in_array('voleiPraia', $_POST['modalidadeColetivas']) ? 1 : 0;
    $xadrez = in_array('xadrez', $_POST['modalidadeColetivas']) ? 1 : 0;


    // Prepara a consulta SQL para inserir na tabela atletas
    $sql = "INSERT INTO atletas (nome, instituicao, matricula, rg, basquete, futebolCampo, futsal, handebol, tenisDeMesa, voleibol, voleiPraia, xadrez) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepara a declaração SQL
    $stmt = $conexao->prepare($sql);

    // Verifica se a preparação da declaração foi bem-sucedida
    if ($stmt === false) {
        $response = array('success' => false, 'error' => 'Erro na preparação da consulta: ' . $conexao->error);
        echo json_encode($response);
        exit;
    }

    // Bind dos parâmetros e execução da consulta
    $stmt->bind_param("ssssiiiiiiii", $nome, $instituicao, $matricula, $rg, $basquete, $futebolCampo, $futsal, $handebol, $tenisDeMesa, $voleibol, $voleiPraia, $xadrez);

    if ($stmt->execute()) {
        // Se a inserção foi bem-sucedida, retorna um JSON indicando sucesso
        $response = array('success' => true);
        echo json_encode($response);

        // Redireciona para a página Desenvolvimento.php após 2 segundos
        exit;
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