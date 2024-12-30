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
    foreach($atributes['drive'] as $drive) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$drive->getName()}</td>
                <td>{$drive->getAbbreviation()}</td>
                <td></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
