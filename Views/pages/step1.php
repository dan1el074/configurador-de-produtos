<section class="productForm">
    <h1>Gerador de nomenclatura</h1>

    <div class="nav step1">
        <a href="step1" class="ball"></a>
        <div class="row"></div>
        <a href="step2" class="ball"></a>
        <div class="row"></div>
        <a href="step3" class="ball"></a>
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
        
        <div class="finish-container">
            <label for="finish">Acabemento superficial:</label>
            <select name="finish_id" id="finish" required>
                <option value="" disabled selected>Selecione o acabamento</option>
                <?php foreach($atributes['acabamentos'] as $finish) { ?>
                    <option value="<?= $finish->getId() ?>" <?= isset($_SESSION["finish_id"]) ? ($_SESSION["finish_id"] == $finish->getId() ? "selected" : "") : "" ?>><?= $finish->getName() . ($finish->getAbbreviation() ? " - " . $finish->getAbbreviation() : "")?></option>
                <?php } ?>
                <option value="especial">Especial</option>
            </select>

            <?php
                echo "<script>let especialFinishInput = false</script>";

                if(isset($_SESSION['finish_especial'])) {
                    echo "<script>
                            setTimeout(() => {
                                especialFinishInput = true;
                                document.getElementById('finish').value = \"especial\";
                            }, 10)
                        </script>";
                    echo "<input id=\"finish_especial\" name=\"finish_especial\" placeholder=\"Valor\" value=\"{$_SESSION['finish_especial']}\" autocomplete=\"off\" required>";
                }
            ?>
        </div>

        <div class="button-content">
            <button name="action" type="submit"><span>Proximo</span></button>
        </div>
    </form>
</section>

<script>
    const finishInput = document.getElementById('finish');
    const finishContainer = finishInput.parentNode;

    finishInput.addEventListener("change", () => {
        if(finishInput.value === "especial") {
            if(especialFinishInput) {
                return;
            }
            
            let input = document.createElement('input');
            input.id = "finish_especial";
            input.name = "finish_especial";
            input.placeholder = 'Valor';
            input.setAttribute('autocomplete', 'off');
            input.required = true;
            
            finishContainer.append(input);
            document.getElementById('finish_especial').focus();
            especialFinishInput = true;
            return;
        }

        if(especialFinishInput) {
            document.getElementById('finish_especial').remove();
            especialFinishInput = false;
        }
    })
</script>