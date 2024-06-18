<?php
    include_once("templates/header.php");
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id ="main-title"> Editar Contato</h1>
        <form id="create-form" action="<?php echo $BASE_URL; ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id']?>">
            <div class="form-group">
                <label for="name">Nome do Contato: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" value="<?= $contact['name']?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone do Contato: </label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone" value="<?= $contact['phone']?>"required>
            </div>
            <div class="form-group">
                <label for="observations">Insira as observações: </label>
                <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Informe as observações" rows="3"><?= $contact['observations']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php");
?>