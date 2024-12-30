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
    foreach($atributes['length'] as $length) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$length->getName()}</td>
                <td>{$length->getAbbreviation()}</td>
                <td></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
