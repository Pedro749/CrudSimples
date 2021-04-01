<?php
    // iniciando sessão
    session_start();
    // incluindo parte superior do html
    include_once '../includes/header.php';
    // incluindo conexão com o banco de dados
    include_once '../connect.php';
    // verificar se o botão para deletar o usuario foi clicado
    if(isset($_POST['btn-deletar'])){
        // coletando o id do usuario para deletar
        $id = mysqli_escape_string($connect, $_POST['id']);
        // sql para deletar usuario com o id que foi passado 
        $sql = "DELETE FROM users_dados WHERE id = '$id'";

        if($query = mysqli_query($connect, $sql)){
            // criando uma sessao mensagem para passar pro arquivo mensagem e mostrar na tela
            $_SESSION['mensagem']= "Deletado com sucesso!";
        }else{
             $_SESSION['mensagem']= "Erro ao deletar";
        }
        // direcionando para a página inicial após todos os comandos
        header('location:../index.php');
        
    }

?>
<?php
    // incluindo parte inferior do html
    include_once '../includes/footer.php';
?>