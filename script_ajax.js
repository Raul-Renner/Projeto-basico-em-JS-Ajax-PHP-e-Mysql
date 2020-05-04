
function buscaDados(){

    var nome = document.getElementById("buscanome").value;
    var result = document.getElementById("dados");

    var requestAjax =  new XMLHttpRequest();

    result.innerHTML = '<img src = "loading.gif" width = "100px">';
    requestAjax.open("GET","script_back.php?buscanome= " + nome, true);

    requestAjax.onreadystatechange = function(){
        if(requestAjax.readyState == 4){
            if(requestAjax.status == 200){
                result.innerHTML = requestAjax.responseText;
            }else{
                result.innerHTML = "Houve um erro na conexão AJAX: " + requestAjax.statusText;
            }
        }
    };

    requestAjax.send(null);
}

function insereDados(){
    var nome = document.getElementById('insereNome').value;
    var endereco = document.getElementById('insereEndereco').value;
    var telefone = document.getElementById('insereTelefone').value;
    var email = document.getElementById('insereEmail').value;

    var result = document.getElementById('resposta');


    var requestAjax = new XMLHttpRequest();

    result.innerHTML = '<img src = "loading.gif" width = "100px">';

    requestAjax.open("GET","script_back.php?nome= " + nome + "&endereco= "+endereco+"&telefone= "+ 
    telefone+"&email= "+email, true);

    requestAjax.onreadystatechange = function(){
        if(requestAjax.readyState == 4){
            if(requestAjax.status == 200){
                result.innerHTML = requestAjax.responseText;
            }else{
                result.innerHTML = "Houve um erro na conexão AJAX: " + requestAjax.statusText;
            }
        }
    };

    requestAjax.send(null);




}

function deletarUsuario(id){

    var result = document.getElementById("dados");

    var requestAjax =  new XMLHttpRequest();

    result.innerHTML = '<img src = "loading.gif" width = "100px">';
    requestAjax.open("GET","script_back.php?deleta= " + id, true);

    requestAjax.onreadystatechange = function(){
        if(requestAjax.readyState == 4){
            if(requestAjax.status == 200){
                result.innerHTML = requestAjax.responseText;
            }else{
                result.innerHTML = "Houve um erro na conexão AJAX: " + requestAjax.statusText;
            }
        }
    };

    requestAjax.send(null);
}