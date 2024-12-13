<?php
    $arrayRules = get_object_vars($object->getRules()->rules);
    $counter = 0;
    $ruleInput = "<h4>{$object->getName()}</h4>";
    
    foreach ($arrayRules as $title => $rule) {
        $title = ucfirst($title);
        $ruleInput .= "
            <label>{$title}</label>
            <select name=\"ruleSelected{$counter}\" required>
            <option value=\"\" disabled selected>Selecione</option>
        ";

        foreach ($rule as $key => $optionArray) {
            $item = ucfirst($optionArray[0]);

            if($optionArray[0] && $optionArray[1]) {
                $ruleInput .= "<option value=\"{$object->getId()},{$title},{$optionArray[0]},{$optionArray[1]}\">{$item} - {$optionArray[1]}</option>";
            }
            if($optionArray[0] && !$optionArray[1]) {
                $ruleInput .= "<option value=\"{$object->getId()},{$title},{$optionArray[0]},\">{$item}</option>";
            }
            if(!$optionArray[0] && $optionArray[1]) {
                $ruleInput .= "<option value=\"{$object->getId()},{$title},,{$optionArray[1]}\">{$optionArray[1]}</option>";
            }
        }

        $ruleInput .= "</select>";
        $counter++;
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
