<?php
    $ruleInput = "";
    $counter = 0;

    foreach($arrayOptionals as $key=>$object) {
        $arrayRules = get_object_vars($object->getRules());
        $counter2 = 0;
        $ruleInput .= "<h4>{$object->getName()}</h4>";
        
        foreach ($arrayRules as $title => $rule) {
            $title = ucfirst($title);
            $ruleInput .= "
                <label>{$title}</label>
                <div>
                <select name=\"ruleSelected-{$counter}-{$counter2}\" class=\"rule-select\" required>
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

            $ruleInput .= "</select></div>";
            $counter2++;
        }

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

                const selects = document.querySelectorAll('.rule-select');
                selects.forEach(select => {
                    let especialInput = false;
                    let selectName = \"\";

                    select.addEventListener('change', function() {
                        if(especialInput) {
                            select.parentNode.querySelector('.especialInput').remove();
                            select.name = selectName;

                            especialInput = false;
                            return;
                        }

                        if(select.value.split(\",\")[select.value.split(\",\").length - 2] == \"especial\") {
                            selectName = select.name;
                            select.name = \"\";

                            let input = document.createElement('input');
                            input.classList.add('especialInput');
                            input.placeholder = 'Valor';
                            input.required = true;
                            input.setAttribute('autocomplete', 'off');
                            input.name = selectName;
                            select.parentNode.append(input);
                            especialInput = true;
                        }
                    });
                });

                const formButton = document.querySelector('button[name=\"halfStepAction\"]');
                formButton.addEventListener(\"click\", event => {
                    let container = formButton.parentNode;
                    container = container.parentNode;
                    const result = container.querySelectorAll('.especialInput');
                    
                    if(!result.length) {
                        return;
                    }

                    result.forEach(currentResult => {
                        if(!currentResult.value) {
                            return;
                        }

                        const currentContainer = currentResult.parentNode;
                        const options = currentContainer.querySelectorAll('option');
                        const referenceValue = options[options.length - 1].value;
                        const final = referenceValue + currentResult.value;
                        currentResult.style.color = \"transparent\";
                        currentResult.value = final;
                    })
                })
            </script>
        ";

    echo $text;
?>
