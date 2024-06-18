<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id ="main-title"> Criar Contato</h1>
        <form id="create-form" action="<?php echo $BASE_URL; ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome do Contato: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do Contato: </label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone" required>
            </div>
            <div class="form-group">
                <label for="observations">Insira as observações: </label>
                <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Informe as observações" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>