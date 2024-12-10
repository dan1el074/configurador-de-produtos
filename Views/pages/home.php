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
        <input type="text" name="order" id="order">

        <label for="product">Produto:</label>
        <select name="product" id="product">
            <?php foreach($atributes['produtos'] as $product) { ?>
                <option value="<?= $product->getId() ?>"><?= "{$product->getName()} - {$product->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>
        
        <label for="finish">Acabemento superficial:</label>
        <select name="finish" id="finish">
            <?php foreach($atributes['acabamentos'] as $finish) { ?>
                <option value="<?= $finish->getId() ?>"><?= $finish->getName() . ($finish->getAbbreviation() ? " - " . $finish->getAbbreviation() : "")?></option>
            <?php } ?>
        </select>

        <div class="button-content">
            <button type="submit"><span>Proximo</span></button>
        </div>
    </form>

</section>
