<section class="productForm">
    <h1>Gerador de nomenclatura</h1>

    <div class="nav step2">
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
    </div>

    <form action="" method="post">
    <label for="weight">Carga:</label>
        <select name="weight_id" id="weight" required>
            <option value="" disabled selected>Selecione a carga</option>
            <?php foreach($atributes['carga'] as $weight) { ?>
                <option value="<?= $weight->getId() ?>" <?= isset($_SESSION["weight_id"]) ? ($_SESSION["weight_id"] == $weight->getId() ? "selected" : "") : "" ?>><?= "{$weight->getName()} - {$weight->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>

        <label for="length">Comprimento:</label>
        <select name="length_id" id="length" required>
            <option value="" disabled selected>Selecione o comprimento</option>
            <?php foreach($atributes['comprimento'] as $length) { ?>
                <option value="<?= $length->getId() ?>" <?= isset($_SESSION["length_id"]) ? ($_SESSION["length_id"] == $length->getId() ? "selected" : "") : "" ?>><?= "{$length->getName()} - {$length->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>
        
        <label for="width">Largura:</label>
        <select name="width_id" id="width" required>
            <option value="" disabled selected>Selecione a largura</option>
            <?php foreach($atributes['largura'] as $width) { ?>
                <option value="<?= $width->getId() ?>" <?= isset($_SESSION["width_id"]) ? ($_SESSION["width_id"] == $width->getId() ? "selected" : "") : "" ?>><?= "{$width->getName()} - {$width->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>

        <label for="drive">Acionamento:</label>
        <select name="drive_id" id="drive" required>
            <option value="" disabled selected>Selecione o Acionamento</option>
            <?php foreach($atributes['acionamento'] as $drive) { ?>
                <option value="<?= $drive->getId() ?>" <?= isset($_SESSION["drive_id"]) ? ($_SESSION["drive_id"] == $drive->getId() ? "selected" : "") : "" ?>><?= "{$drive->getName()} - {$drive->getAbbreviation()}" ?></option>
            <?php } ?>
        </select>

        <div class="button-content">
            <button name="action" type="submit"><span>Proximo</span></button>
        </div>
    </form>
</section>
