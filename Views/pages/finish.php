<section class="finish">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@shoelace-style/shoelace@2.19.1/cdn/shoelace.js"></script>

    <h1>Nomenclatura:</h1>

    <div class="copy-container">
        <div class="box">
            <sl-copy-button value="Shoelace rocks!"></sl-copy-button>
            <?php 
                $optionalsAbbreviation = "";

                if(isset($atributes['optionals'])) {
                    foreach($atributes['optionals'] as $key => $optional) {
                        if($optional->getShowInResult()) {
                            $optionalsAbbreviation .= " {$optional->getAbbreviation()}";
                        }
                    }
                }

                echo "<b>
                    {$atributes['product']->getAbbreviation()}
                    - MT
                    {$atributes['weight']->getAbbreviation()}{$atributes['length']->getAbbreviation()}{$atributes['width']->getAbbreviation()}
                    {$atributes['drive']->getAbbreviation()}
                    {$optionalsAbbreviation}
                    P{$_SESSION['order']}
                </b>"; 
            ?>
        </div>
        
        <div class="box">
            <sl-copy-button value="Shoelace rocks!"></sl-copy-button>
            <span>
                * Com Pedestal (PED) <br>
                * Com Luminaria de doca <br>
                * Com Escada para Doca (dimensao) <br>
                * Com Proteção Para Unidade Hidraulica (PROT UH) <br>
            </span>
        </div>
    </div>

    <div class="remume-container">
        <ul class="resume">
            <li><b>Pedido:</b> <?= $_SESSION['order'] ?></li>
            <li><b>Produto:</b> <?= $atributes['product']->getName() ?> - <?= $atributes['product']->getAbbreviation() ?></li>
            <?php 
                if(isset($_SESSION['productRules'])) {
                    $text = "<ul class=\"rules\">";

                    forEach($_SESSION['productRules'] as $key => $value) {
                        $text .= "<li><b>{$value[1]}:</b> {$value[2]} - {$value[3]}</li>";
                    }

                    $text .= "</ul>";
                    echo $text;
                }
            ?>
            <li><b>Acabamento:</b> <?= $atributes['finish']->getName() ?> - <?= $atributes['finish']->getAbbreviation() ?></li>
            <li><b>Carga:</b> <?= $atributes['weight']->getName() ?> - <?= $atributes['weight']->getAbbreviation() ?></li>
            <li><b>Comprimento:</b> <?= $atributes['length']->getName() ?> - <?= $atributes['length']->getAbbreviation() ?></li>
            <li><b>Largura:</b> <?= $atributes['width']->getName() ?> - <?= $atributes['width']->getAbbreviation() ?></li>
            <li><b>Acionamento:</b> <?= $atributes['drive']->getName() ?> - <?= $atributes['drive']->getAbbreviation() ?></li>
            <?php 
                if(isset($_SESSION['driveRules'])) {
                    $text = "<ul class=\"rules\">";

                    forEach($_SESSION['driveRules'] as $key => $value) {
                        if($value[2] && $value[3]) {
                            $text .= "<li><b>{$value[1]}:</b> {$value[2]} - {$value[3]}</li>";
                        }

                        if(!$value[2] && $value[3]) {
                            $text .= "<li><b>{$value[1]}:</b> {$value[3]}</li>";
                        }
                    }

                    $text .= "</ul>";
                    echo $text;
                }
            ?>
            <?php 
                if($atributes['optionals']) {
                    $text = "<li><b>Opcionais:</b></li><ul class=\"rules\">";

                    foreach($atributes['optionals'] as $key => $optional) {
                        $text .= "<li>{$optional->getName()}</li>";

                        if(isset($_SESSION['optionalRules'])) {
                            foreach($_SESSION['optionalRules'] as $key => $rules) {
                                foreach($rules as $key => $currentRules) {
                                    if($currentRules[0] == $optional->getId()) {
                                        if($currentRules[2] && $currentRules[3]) {
                                            $text .= "<ul><li class=\"rules\"><b>{$currentRules[1]}:</b> {$currentRules[2]} - {$currentRules[3]}</li></ul>";
                                        }
                                        
                                        if(!$currentRules[2] && $currentRules[3]) {
                                            $text .= "<ul><li class=\"rules\"><b>{$currentRules[1]}:</b> {$currentRules[3]}</li></ul>";
                                        }

                                    }
                                }
                            }
                        }
                    }

                    $text .= "</ul>";
                    echo $text;
                }
            ?>
        </ul>
    </div>
</section>
  