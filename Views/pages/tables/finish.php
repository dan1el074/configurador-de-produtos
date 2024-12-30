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
    foreach($atributes['finish'] as $finish) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$finish->getName()}</td>
                <td>{$finish->getAbbreviation()}</td>
                <td><button class=\"icon\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
