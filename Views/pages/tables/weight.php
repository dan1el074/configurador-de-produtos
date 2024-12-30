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
    foreach($atributes['weight'] as $weight) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$weight->getName()}</td>
                <td>{$weight->getAbbreviation()}</td>
                <td><button class=\"icon\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
