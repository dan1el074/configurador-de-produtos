<h1>Produtos:</h1>

<ul>
    <?php foreach($atributes['produtos'] as $product) {?>
        <li>
            <p>
                Produto: <?php echo $product->getName() ?><br>
                Nomenclatura: <?php echo $product->getAbbreviation() ?>
            </p>
        </li>
    <?php } ?>
</ul>