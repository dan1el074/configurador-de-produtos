<?php 
    $text = "
        <tr>
            <th></th>
            <th><label>Nome</label></th>
            <th><label>Abreviação</label></th>
            <th></th>
        </tr>
    ";

    $count = 1;
    foreach($atributes['optionals'] as $optionals) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$optionals->getName()}</td>
                <td>{$optionals->getAbbreviation()}</td>
                <td></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
