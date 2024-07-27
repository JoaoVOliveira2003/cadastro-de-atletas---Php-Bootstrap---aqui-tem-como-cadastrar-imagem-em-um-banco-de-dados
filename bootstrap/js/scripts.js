function funfou() {
    alert('funfou');
}

function limparCampos() {
    document.getElementById('nome').value = '';
    document.getElementById('cargo').value = '';
    document.getElementById('email').value = '';
    document.getElementById('telefonePessoal').value = '';
    document.getElementById('telefoneComercial').value = ''; 
    document.getElementById('cep').value = '';
    document.getElementById('orgao').value = '';
    document.getElementById('endereco').value = '';
    document.getElementById('numero').value = '';
    document.getElementById('complemento').value = '';
    document.getElementById('bairro').value = '';
    document.getElementById('uf').value = '';
    document.getElementById('municipio').value = '';
    document.getElementById('url').value = '';
}

// Função para gravar pessoa no banco de dados
function gravarPessoa() {
    SalvarArquivo();

    $.ajax({
        type: 'POST',
        url: 'php/gravarPessoa.php',
        data: $("#formulario").serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('Pessoa gravada com sucesso!');
                limparCampos();
                // Esconde os botões de ação
                $('.delete-person-acao').hide();
                $('.charge-person-acao').hide();
            } else {
                alert('Erro ao gravar pessoa: ' + response.error);
            }
        },
        error: function(xhr, status, error) {
            alert('Erro na requisição: ' + status);
            console.log(xhr.responseText);
        }
    });
}

function SalvarArquivo() {
    var fileInput = document.getElementById('foto');
    var file = fileInput.files[0];

    if (file) {
        // Exibir o nome do arquivo
        var formData = new FormData();
        formData.append('image', file);  

        $.ajax({
            url: 'php/gravarImagens.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Arquivo enviado com sucesso!');
                fileInput.value = '';  // Limpar o input após o envio
            },
            error: function() {
                alert('Erro ao enviar o arquivo.');
            }
        });
    } else {
        alert('Nenhum arquivo selecionado.');
    }
}

// Atualizar o nome do arquivo no label
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = e.target.files[0] ? e.target.files[0].name : 'Escolher arquivo';
    var nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = fileName;
});
