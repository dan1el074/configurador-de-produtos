<?php
    $arrayRules = get_object_vars($rules);
    $ruleInput = "";
    
    foreach ($arrayRules as $key => $value) {
        $title = ucfirst($key);
        $ruleInput .= "<input type=\"hidden\" name=\"ruleName\" value=\"{$key}\">
                <label>{$title}</label>
                <select name=\"ruleSelect\">
                <option value=\"\" disabled selected>Selecione</option>";

        foreach ($value as $key2 => $value2) {
            $item = ucfirst($value2[0]);

            if($value2[1]) {
                $ruleInput .= "<option value=\"{$value2[1]}\">{$item} - {$value2[1]}</option>";
            } else {
                $ruleInput .= "<option value=\"{$value2[0]}\">{$item}</option>";
            }
        }

        $ruleInput .= "</select>";
    }

    $text = "
            <script>
                let body = document.querySelector('body')

                body.innerHTML += `
                    <div class=\"black-background\"></div>
                    <div class=\"pop-up\">
                        <form class=\"pop-up_form\" action=\"\" method=\"post\">
                            <h2>Parâmetros adicionais:</h2>
                            {$ruleInput}
                            <div class=\"button-content\">
                                <button name=\"halfStepAction\" type=\"submit\"><span>Proximo</span></button>
                            </div>
                        <form> 
                    </div>
                `

                let background = document.querySelector('.black-background')
                let popUp = document.querySelector('.pop-up')

                background.addEventListener(\"click\", () => {
                    background.remove();
                    popUp.remove()
                })
            </script>
        ";

    echo $text;
?>
