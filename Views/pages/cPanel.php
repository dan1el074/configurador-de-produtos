<h1>Painel de Controle</h1>
<section class="base-cpainel">
    <aside class="cpainel__aside"> 
        <form type="get">
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "product" ? "active" : "" ) : "active" ?>" name="type" value="product">Produtos</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "finish" ? "active" : "" ) : "" ?>" name="type" value="finish">Acabamentos</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "weight" ? "active" : "" ) : "" ?>" name="type" value="weight">Carga</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "length" ? "active" : "" ) : "" ?>" name="type" value="length">Comprimento</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "width" ? "active" : "" ) : "" ?>" name="type" value="width">Largura</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "drive" ? "active" : "" ) : "" ?>" name="type" value="drive">Acionamentos</button>
            <button class="<?= isset($_GET['type']) ? ($_GET['type'] == "optionals" ? "active" : "" ) : "" ?>" name="type" value="optionals">Opcionais</button>
        </form>
    </aside>

    <div class="cpainel__conteudo">
        <h4>Gestão de conteúdo</h4>
        <span class="obs">Adicione, edite ou remova os seguintes itens:<br></span>
        
        <div class="cpainel__table">
            <span id="msg"></span>
            <table>
                <thead>
                    <?php
                        if(isset($_GET['type'])){
                            $type = $_GET['type'];
                
                            switch($type){
                                case 'product';
                                    include("tables/product.php");
                                    break;
                                case "finish";
                                    include("tables/finish.php");
                                    break;
                                case "weight";
                                    include("tables/weight.php");
                                    break;
                                case "length";
                                    include("tables/length.php");
                                    break;
                                case "width";
                                    include("tables/width.php");
                                    break;
                                case "drive";
                                    include("tables/drive.php");
                                    break;
                                case "optionals";
                                    include("tables/optionals.php");
                                    break;
                            }
                        }else{
                            include("tables/product.php");
                        }
                    ?>
                </thead>
                <tbody>

                </tbody>
            </table>
            <button title="Adicionar"><span>Adicionar</span></button>
        </div>
    </div>
</section>
