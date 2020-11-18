<?php
require_once('../db/conexao.php');
$conexao = conexaoMysql();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <link rel="shortcut icon" href="../../public/assets/icons/coin.ico">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek Coins - Produto</title>

    <link href="../../public/css/global.css" rel="stylesheet"/>
    <link href="../../public/css/product.css" rel="stylesheet"/>
    <link href="../../public/css/palette.css" rel="stylesheet"/>

</head>
<body>
    
    <div class="container center">

        <header class="center">
            <a href="index.html" class="logo">
                <img src="../../public/assets/icons/logo-horizontal.svg" alt="Logotipo Geek Coins">
            </a>

            <div id="container-search">
                <form role="search" id="form-search" action="search.php" method="GET">
                    <button type="submit" id="button-search"><img src="../../public/assets/icons/search-solid.svg" alt="ícone de lupa" id="icon-search"></button>
                    <input type="search" incremental="incremental" name="search" id="bar-search" placeholder="Pesquisar...">                        
                </form>
            
                <a href="#" id="anchor-login" class="cinza-escuro">Entre ou cadastre-se</a>
                
                <div id="container-icons">
                    <a href="#" class="button-icons">
                        <img src="../../public/assets/icons/favoritos.svg" alt="ícone de coração" id="icon-wishlist">
                    </a>
                    <a href="#" class="button-icons">
                        <img src="../../public/assets/icons/sacola.svg" alt="ícone de sacola de compras" id="icon-shopping">
                    </a>
                </div>                        
            </div>
        </header>

        <main class="center">
            
            <div id="product-image-more">
                <div id="min-images">
                    <div class="image img1" onclick="image(1)">
                        <img src="../../public/assets/images/caneca-ichigo-hollow.png" alt="Arte padrão da caneca">
                    </div>

                    <div class="image img2" onclick="image(2)">
                        <img src="../../public/assets/images/caneca-ichigo-hollow-lados.png" alt="Opções de cores da caneca">
                    </div>

                    <div class="image img3" onclick="image(3)">
                        <img src="../../public/assets/images/caneca-tokyo-ghoul.png" alt="Caneca">
                    </div>
                </div>
                <div id="max-images">

                </div>
                <div id="more-infos">
                    <h3>Detalhes do produto</h3>
                    <img src="../../public/assets/icons/angle-down-solid.svg" height="30px" 
                        onclick="myFunction()" class="dropbtn" alt="mais detalhes">
                    <div id="myDropdown" class="dropdown-content">
                        <p>
                            A coleção Bleach está cada vez melhor! 
                            A famosa caneca Ichigo agora tem duas versões de cores: 
                            detalhes em preto ou em vermelho. Para agradar todos os gostos, 
                            um verdadeiro item de colecionador!
                        </p>
                        <h3>Resumo do Produto</h3>
                        <p><strong>Profundidade:</strong> 30 centímetros </p>
                        <p><strong>Material:</strong> Porcelana </p>
                        <p><strong>Cor:</strong> Branca </p>
                        <p><strong>Impressão:</strong> Estampa por sublimação.</p>            
                    </div>
                </div>
            </div>

            <div id="product-infos">
                <h1>Caneca Ichigo - Coleção Bleach</h1>
                <div id="rating">
                    <div id="coins">
                        <img src="../../public/assets/icons/coin-colored.svg">
                        <img src="../../public/assets/icons/coin-colored.svg">
                        <img src="../../public/assets/icons/coin-colored.svg">
                        <img src="../../public/assets/icons/coin.svg">
                        <img src="../../public/assets/icons/coin.svg">
                    </div>
                    <div id="modal">
                        <p>Avaliações</p>
                        <img src="../../public/assets/icons/ir-slider.svg" height="10px" alt="ver avaliações">
                    </div>    
                </div>
                <div id="infos">
                    <h2 id="price"> R$ 36,99 </h2>
                    <div class="delivery">
                        <div class="text-delivery">
                            <span>Consultar frete:</span>
                            <a class="find-cep" href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Não sei meu CEP</a>                    
                        </div>
        
                        <form action="" method="GET" class="form-cep">
                            <label for="cep"></label>
                            <input class="type-cep" type="text" name="cep" placeholder="00000-000">
                        </form>
                    </div>
                    <button type="button">Comprar</button>
                </div>
            </div>

            <div id="more-products">
                <h2 id="title-more-products" class="cinza-escuro"> Outros itens que você pode gostar</h2>
                    
                        <div class="cards-page">

                        <?php
                        //SELECT para trazer os producos
                            $sql = "SELECT p.nome, 
                                        p.preco_unitario,
                                        i.url_imagem
                                        FROM produto AS p INNER JOIN imagem AS i ON p.idproduto = i.produto_fk
                                        INNER JOIN produto_pedido AS pp ON p.idproduto = pp.produto_fk
                                        WHERE p.categoria_fk = 2 
                                        ORDER BY pp.quantidade DESC
                                        LIMIT 3"; /* 3 mais vendidos na mesma categoria */

                            if($select = mysqli_query($conexao, $sql)){


                                while($rsProduto = mysqli_fetch_array($select)){
                        ?>
                                        <div class="hover-position">
                                            <div class="card">
                                                <a href="#">
                                                    <img src="<?php echo($rsProduto['url_imagem'])?>">
                                                </a>
                                                <div class="card-info">
                                                    <p class="title cinza-escuro"><?php echo($rsProduto['nome']) ?></p>
                                                    <p class="price laranja-escuro"><?php echo('R$ '.$rsProduto['preco_unitario']) ?></p>
                                                </div>

                                                <div class="card-hover">
                                                    <div id="text-hover">
                                                        <p>frete de R$ 13,42</p>
                                                        <p>entrega em 03 dias úteis</p>
                                                    </div>  
                                                    <div id="container-icons">
                                                        <a href="#" class="button-icons">
                                                            <img src="../../public/assets/icons/favoritos.svg" alt="" id="icon-wishlist">
                                                            <p>Salvar</p>
                                                        </a>
                                                        <a href="#" class="button-icons">
                                                            <img src="../../public/assets/icons/sacola.svg" alt="" id="icon-shopping">
                                                            <p>Adicionar</p>
                                                        </a>
                                                    </div> 
                                                </div>
                                                
                                            </div>
                                        </div>
                            <?php            
                                } 
                            }
                            ?>
                        
                        </div>

            </div>
                        
        </main>

    </div>

    <!--SCRIPTS JS-->
    <script src="../../public/scripts/product.js"></script>
</body>
</html>