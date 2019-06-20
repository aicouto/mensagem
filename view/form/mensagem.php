<?php
$action=$_ENV['SITE_URL'].'mensagem/create';
?>
<form class="form-vertical" action="<?php print $action; ?>" method="post" id="mensagem">
    <fieldset>
        <legend>Criar mensagem</legend>
        <?php
        if(isset($_GET['erro'])){
            ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Erro</h4>
                Digite uma mensagem válida
            </div>
            <?php
        }
        ?>
        <label for="mensagem-body">Mensagem</label>
        <input class="input-block-level" type="text" name="body" value="" id="mensagem-body" maxlength="60" required>
        <div class="text-center">
            <button type="submit" class="btn" name="button">Enviar mensagem</button>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
document.getElementById('mensagem-body').onkeydown = function(e){
    if(e.keyCode == 13){
        document.getElementById('mensagem').submit();
    }
};
</script>
