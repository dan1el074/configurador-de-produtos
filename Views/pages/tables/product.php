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
    foreach($atributes['product'] as $product) {
        $text .= "
            <tr>
                <td>#{$count}</td>
                <td>{$product->getName()}</td>
                <td>{$product->getAbbreviation()}</td>
                <td>
                    <form method=\"post\" class=\"icon-container\">
                        <button class=\"icon\" type=\"submit\" name=\"edit\" value=\"product,{$product->getId()}\" title=\"Editar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/edit-icon.png\"></button>
                        <button class=\"icon\" type=\"submit\" name=\"delete\" value=\"product,{$product->getId()}\" title=\"Deletar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button>                 
                    </form>
                </td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
