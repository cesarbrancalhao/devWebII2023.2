//Função de validação do formulário
function validar() {
    var nome = document.getElementById('nome').value.trim();
    var idade = document.getElementById('idade').value;

    if(nome == '') {
        //alert('Informe o nome!');
        exibeMsgErro('divMsg', 'Informe o nome!');
        return false;
    }

    if(idade == '') {
        //alert('Informe a idade!');
        exibeMsgErro('divMsg', 'Informe o idade!');
        return false;
    }

    return true;
}

function exibeMsgErro(id, msg) {
    var divMsg = document.getElementById(id);
    divMsg.innerHTML = msg;
}