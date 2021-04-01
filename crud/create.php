<?php
    // iniciando sessão
    session_start();
    // incluindo parte superior do html
    include_once '../includes/header.php';
    // incluindo conexão com o banco de dados
    include_once '../connect.php';
    // verificando se existe o botão cadastrar e filtrando dados do formulario
    if(isset($_POST['btn-cadastrar'])){
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
        $idade = mysqli_escape_string($connect, $_POST['idade']);
        $email = mysqli_escape_string($connect, $_POST['email']);
        // sql para inserir valores filtrados no banco de dados
        $sql = "INSERT INTO users_dados (nome, sobrenome, idade, email) VALUES ('$nome', '$sobrenome', '$idade' , '$email')";
        // verificando se a query foi realizada com sucesso e passando para session mensagem o resultado, para ser utilizado no mensagem.php
        if($query = mysqli_query($connect, $sql)){
           $_SESSION['mensagem']= "Cadastrado com sucesso!"; 
        }else{
            $_SESSION['mensagem']= "Erro ao cadastrar"; 
        }
        
        // redirecionando para a index
        header('location:../index.php');

        
    }
?>
    <!-- Formulário para o cadastro de clientes -->
    <div class="row">
        <div class ="col s12 m6 push-m3">
            <h3 class="light">Adicionar Cliente</h3>
            <form  method="post">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="sobrenome" id="sobrenome" required>
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="idade" id="idade" required>
                    <label for="idade">Idade</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <button type ="submit" class="btn" name="btn-cadastrar">Cadastrar</button>
                <a href="../index.php" class="btn blue">Lista de clientes</a>
            </form>
        </div>
    </div>


<?php
    // incluindo parte inferior do html
    include_once '../includes/footer.php';
?>