<?php
    // $linkStep2 = "";
    // $linkStep3 = "";

    // if(isset($_SESSION['order']) && isset($_SESSION['product_id']) && isset($_SESSION['finish_id'])) {
    //     $linkStep2 = "href=\"step2\"";
    // }
    
    // if(isset($_SESSION['weight_id']) && isset($_SESSION['length_id']) && isset($_SESSION['drive_id'])) {
    //     $linkStep2 = "href=\"step2\"";
    // }
?>

<section class="productForm">
    <h1>Gerador de nomenclatura</h1>

    <div class="nav step1">
        <a class="ball"></a>
        <div class="row"></div>
        <a class="ball"></a>
        <div class="row"></div>
        <a class="ball"></a>
    </div>

    <form action="" method="post">
        <label for="order">Pedido:</label>
        <input type="text" name="order" id="order" value="<?= isset($_SESSION["order"]) ? $_SESSION["order"] : "" ?>" required>

        <label for="product">Produto:</label>
        <select name="product_id" id="product" required>
            <option value="" disabled selected>Selecione o produto</option>
            <?php foreach($atributes['produtos'] as $product) { ?>
                <option value="<?= $product->getId() ?>" <?= isset($_SESSION["product_id"]) ? ($_SESSION["product_id"] == $product->getId() ? "selected" : "") : "" ?>><?= "{$product->getName()} - {$product->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>
        
        <label for="finish">Acabemento superficial:</label>
        <select name="finish_id" id="finish" required>
            <option value="" disabled selected>Selecione o acabamento</option>
            <?php foreach($atributes['acabamentos'] as $finish) { ?>
                <option value="<?= $finish->getId() ?>" <?= isset($_SESSION["finish_id"]) ? ($_SESSION["finish_id"] == $finish->getId() ? "selected" : "") : "" ?>><?= $finish->getName() . ($finish->getAbbreviation() ? " - " . $finish->getAbbreviation() : "")?></option>
            <?php } ?>
        </select>

        <div class="button-content">
            <button name="action" type="submit"><span>Proximo</span></button>
        </div>
    </form>
</section>
