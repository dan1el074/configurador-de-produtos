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
                <td>
                    <form method=\"post\" class=\"icon-container\">
                        <button class=\"icon\" type=\"submit\" name=\"edit\" value=\"finish,{$finish->getId()}\" title=\"Editar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/edit-icon.png\"></button>
                        <button class=\"icon\" type=\"submit\" name=\"delete\" value=\"finish,{$finish->getId()}\" title=\"Deletar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button>                 
                    </form>
                </td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
