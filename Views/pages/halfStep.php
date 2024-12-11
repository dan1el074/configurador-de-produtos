<section class="productForm">
    <h1>Gerador de nomenclatura</h1>

    <div class="nav step1">
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
    </div>

    <form action="" method="post">
        <label for="order">Pedido:</label>
        <input type="text" name="order" id="order" value="<?= isset($_SESSION["order"]) ? $_SESSION["order"] : "" ?>" required>

        <label for="product">Produto:</label>
        <select name="product_id" id="product" required>
            <option value="" disabled selected>Selecione o produto</option>
            <?php foreach($atributes['produtos'] as $product) { ?>
                <option value="<?= $product->getId() ?>" <?= isset($_SESSION["product_id"]) ? $_SESSION["product_id"] == $product->getId() ? "selected" : "" : "" ?>><?= "{$product->getName()} - {$product->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>
        
        <label for="finish">Acabemento superficial:</label>
        <select name="finish_id" id="finish" required>
            <option value="" disabled selected>Selecione o acabamento</option>
            <?php foreach($atributes['acabamentos'] as $finish) { ?>
                <option value="<?= $finish->getId() ?>" <?= isset($_SESSION["finish_id"]) ? $_SESSION["finish_id"] == $finish->getId() ? "selected" : "" : "" ?>><?= $finish->getName() . ($finish->getAbbreviation() ? " - " . $finish->getAbbreviation() : "")?></option>
            <?php } ?>
        </select>

        <div class="button-content">
            <button name="action" type="submit"><span>Proximo</span></button>
        </div>
    </form>
</section>
