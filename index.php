<?php
    // iniciando a sessão
    session_start();
    // incluindo parte superior do html
    include_once 'includes/header.php';
    // inlcuindo conexão com o banco de dados
    include_once 'connect.php';
    // verificando se existe a sessão mensagem e incluindo o arquivo mensagem.php para mostrar a mensagem na tela
    if(isset($_SESSION['mensagem'])){
        include_once 'includes/mensagem.php';
        session_unset();
    }

?>
    <!-- Tabela para mostrar os clientes já cadastrados -->
    <div class="row">
        <div class="col s12 m6 push-m3 ">
            <h3 class="light">Clientes</h3>
            <table class="stiped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Idade</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // sql para selecionar todos os dados da tabela users_dados
    $sql= "SELECT * FROM users_dados ";
    $resultado = mysqli_query($connect, $sql);
    //utlizando while para recolher os dados que foram passados pelo banco de dados e transformados em array 
    while($usuario = mysqli_fetch_array($resultado)){
?>          
            <!-- codigo dentro do while que se repete para cada usuario encontrado na tabela -->
            <tr>
                <input type="hidden" name="id" <?php echo $usuario['id']?>>
                <td><?php echo $usuario['nome']; ?></td>            
                <td><?php echo $usuario['sobrenome']; ?></td>            
                <td><?php echo $usuario['idade']; ?></td>            
                <td><?php echo $usuario['email']; ?></td>
                <!-- botão para editar usuarios-->
                <td><a class="btn-floating orange" href="crud/update.php?id=<?php echo $usuario['id']?>"><i class="material-icons">edit</i></a></td>       
                <!-- botão para deletar usuarios -->
                <td><a href="#modal<?php echo $usuario['id']?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>   
                <!-- Modal para verificar se deseja excluir o usuario -->
                <div id="modal<?php echo $usuario['id']?>" class="modal">
                    <div class="modal-content">
                        <h4>Opa!</h4>
                        <p>Tem certeza que deseja excluir esse cliente?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="crud/delete.php" method="post">
                            <!-- input escondido para passar o id para pagina delete.php  -->
                            <input type="hidden" name="id" value="<?php echo $usuario['id']?>">
                            <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                    </div>
                </div>                                   
            </tr>
<?php
}
?>
                </tbody>
            </table>
            <br>
            <!-- botão para acessar a pagina de criação de novos usuarios -->
            <a href="crud/create.php" class="btn " >Adicionar cliente</a>
        </div>
    </div>
<?php
    // incluindo parte inferiror do html
    include_once 'includes/footer.php';
?>