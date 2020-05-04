<?php
//autenticacao do gerente do banco de dados
$servidor = '127.0.0.1:3306';
$usuario = 'gerente';
$senha = 'qwe123';
$base = 'banco_alunos';

$conexao = new mysqli($servidor, $usuario, $senha, $base) or die("Erro na conexão");


if(isset($_GET['buscanome'])){
    

    
    //busca
    $nome = $_GET['buscanome'];

    if(empty($nome)){
        $query = "SELECT * FROM alunos";
    }else{
        $query = " SELECT * FROM alunos WHERE nome LIKE '%$nome%' LIMIT 2";
    }

    $sql = $conexao->query($query);

    $contagem = $sql->num_rows;


    sleep(2);
    //exibir
    if($contagem > 0){
        echo "<table class='table table-hover table-striped'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>TELEFONE</th>
                            <th>E-MAIL</th>
                            <th>ENDEREÇO</th>
                            <th>EXCLUIR</th>
                        </tr>
                    </thead>
                <tbody>";


        while($linha = $sql->fetch_array()){
            
            echo '<tr>';
                echo '<td>'. $linha['id']. '</td>';
                echo '<td>'. $linha['nome']. '</td>';
                echo '<td>'. $linha['email']. '</td>';
                echo '<td>'. $linha['telefone']. '</td>';
                echo '<td>'. $linha['endereco']. '</td>';
                echo '<td><a href="#" onclick="deletarUsuario( '.$linha['id'].');">Excluir</a></td>';
            echo '</tr>';

        }
        echo "</tbody></table>";
    
    }else{
        echo 'Nenhum registro encontrado!';
    }    
}elseif(
    isset($_GET['nome']) and
    isset($_GET['endereco']) and
    isset($_GET['telefone']) and
    isset($_GET['email']) 
){
    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $telefone = $_GET['telefone'];
    $email = $_GET['email'];

    $query = "INSERT INTO alunos(nome,endereco,telefone,email) VALUES ('$nome','$endereco','$telefone','$email')";

    sleep(1);

    $sql = $conexao->query($query);
    echo "<span class='btn btn-success'> Inserido com sucesso! </span>";
}elseif(
    isset($_GET['deleta'])
){
    $id = $_GET['deleta'];

    $query = "DELETE FROM alunos WHERE ID = '$id' ";

    sleep(1);

    $sql = $conexao->query($query);
    echo "<span class='btn btn-success'> Deletado com sucesso! </span>";


}

else{
    echo "<span class='btn btn-danger'> Um erro ocorreu.Por favor,preencha todos os campos </span>";
    
}