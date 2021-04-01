<?php
    // iniciando sessão
    session_start();
    // incluindo parte superior do html
    include_once '../includes/header.php';
    // incluindo conexão com o banco de dados
    include_once '../connect.php';
    // coletando o id passado pela url e filtrando com mysqli
    $id = mysqli_escape_string($connect,$_GET['id']);
    // sql para selecionar todos os campos da tabela onde o id é igual ao passado pela url
    $sql = "SELECT * FROM   users_dados WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    // colocando os resultados num array para ser usado no formulario para recuperar os valores anteriores 
    $dados = mysqli_fetch_array($query);

    // verificando se o botão de atualizar foi clicado e filtrando os valores
    if(isset($_POST['btn-atualizar'])){
        
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $idade = mysqli_escape_string($connect, $_POST['idade']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        // sql para atualizar os valores recebidos na tabela
        $sql = "UPDATE users_dados  SET nome = '$nome', sobrenome = '$sobrenome', idade = '$idade', email = '$email' WHERE id = '$id'";

        // verificando se a query foi executada com sucesso e atribuindo um valor à session mensagem para exibir na tela com o arquivo mensagem.php
        if($query = mysqli_query($connect, $sql)){
            $_SESSION['mensagem']= "Atualizado com sucesso!";
        }else{
             $_SESSION['mensagem']= "Erro ao atualizar";
        }
        // redirecionando a pagina para index depois dos processos
        header('location:../index.php');
        
    }

?>
    <!-- Formulário para atualizar cliente -->
    <div class="row">
        <div class ="col s12 m6 push-m3">
            <h3 class="light">Atualizar Cliente</h3>
            <form  method="post">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']?>" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']?>" required>
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="idade" id="idade" value="<?php echo $dados['idade']?>" required>
                    <label for="idade">Idade</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" value="<?php echo $dados['email']?>" required>
                    <label for="email">Email</label>
                </div>
                <button type ="submit" class="btn" name="btn-atualizar">Atualizar</button>
                <a href="../index.php" class="btn blue">Lista de clientes</a>
            </form>
        </div>
    </div>


<?php
    // incluindo parte inferior do html
    include_once '../includes/footer.php';
?>