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
    foreach($atributes['products'] as $product) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$product->getName()}</td>
                <td>{$product->getAbbreviation()}</td>
                <td></td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
