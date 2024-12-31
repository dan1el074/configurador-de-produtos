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
                <td>
                    <form method=\"post\" class=\"icon-container\">
                        <button class=\"icon\" type=\"submit\" name=\"edit\" value=\"drive,{$drive->getId()}\" title=\"Editar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/edit-icon.png\"></button>
                        <button class=\"icon\" type=\"submit\" name=\"delete\" value=\"drive,{$drive->getId()}\" title=\"Deletar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button>                 
                    </form>
                </td>
            </tr>
        ";
        $count++;
    }
    echo $text;
?>
