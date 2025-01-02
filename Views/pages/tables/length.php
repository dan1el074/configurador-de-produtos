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
                <td>
                    <form method=\"post\" class=\"icon-container\">
                        <button class=\"icon\" type=\"submit\" name=\"edit\" value=\"length,{$length->getId()}\" title=\"Editar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/edit-icon.png\"></button>
                        <button class=\"icon\" type=\"submit\" name=\"delete\" value=\"length,{$length->getId()}\" title=\"Deletar\"><img src=\"" . INCLUDE_PATH_FULL . "assets/images/delete-icon.png\"></button>                 
                    </form>
                </td>
            </tr>
        ";
        $count++;
    }

    $text .= "
        <script>
            setTimeout(() => {
                document.getElementById('new').value = 'length';
            }, 50);
        </script>
    ";
    echo $text;
?>
