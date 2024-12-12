<section class="optionsForm">
    <h1>Gerador de nomenclatura</h1>

    <div class="nav step3">
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
        <div class="row"></div>
        <div class="ball"></div>
    </div>

    <form action="" method="post">
        <h3>Selecione os opcionais:</h3>
        <label class="container mestre">
            <div class="fix">Todes</div>
            <input type="checkbox" id="selectAll">
            <span class="checkmark"></span>
        </label for="selectAll">
        <?php 
            $contador = 0;
            foreach ($atributes['opcionais'] as $key => $atribute) {
                echo "
                    <label class=\"container\">
                        <div class=\"fix\"><div>{$atribute->getName()}</div> <div>{$atribute->getAbbreviation()}</div></div>
                        <input type=\"checkbox\" id=\"{$atribute->getId()}\" name=\"optionalRuleValue{$contador}\" value=\"{$atribute->getId()}\">
                        <span class=\"checkmark\"></span>
                    </label for=\"{$atribute->getId()}\">
                ";
                $contador++;
            }
        ?>
        <div class="button-content">
            <button name="action" type="submit"><span>Proximo</span></button>
        </div>
    </form>
</section>

<script>
    const selectAllCheckbox = document.getElementById('selectAll');
    const childCheckboxes = document.querySelectorAll('input');

    selectAllCheckbox.addEventListener('change', () => {
        childCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
</script>
