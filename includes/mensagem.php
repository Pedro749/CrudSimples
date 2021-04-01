<script>
        window.onload = function(){
            M.toast({html: '<?php echo $_SESSION['mensagem']?>' });
        }
</script>
<!-- script para mostrar na tela a mensagem passada pela sessão -->