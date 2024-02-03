document.addEventListener("DOMContentLoaded", function() {
    var nome = document.getElementById('nome');
    var email = document.getElementById('email');
    var telefone = document.getElementById('telefone');
    var data_nasc = document.getElementById('data_nasc');
    var cidade = document.getElementById('cidade');
    var estado = document.getElementById('estado');
    var botao = document.getElementById('botao');

    botao.addEventListener('click', function() {
        if (nome.value.length < 3) {
            alert('O nome precisa ter mais de 3 caracteres');
            return false;
        }
        if (!validarEmail(email.value)) {
            alert('Digite um endereço de e-mail válido');
            return false;
        }

        if (!isNumero(telefone.value)) {
            alert('O telefone deve conter apenas números');
            return false;
        }
        if(data_nasc.value == ""){
            alert('coloque sua data de nascimento');
            return false;
        }
        if(cidade.value == ""){
            alert('coloque sua cidade');
            return false;
        }
        if(estado.value == ""){
            alert('coloque seu estado');
            return false;
        }

        window.location.href = "gravar-cliente.php";

    });
});
function isNumero(str) {
    return /^\d+$/.test(str);
}
function validarEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}