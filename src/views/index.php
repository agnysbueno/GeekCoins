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
        <title>Geek Coins - Home</title>

        <link href="../../public/css/global.css" rel="stylesheet"/>
        <link href="../../public/css/index.css" rel="stylesheet"/>
        <link href="../../public/css/palette.css" rel="stylesheet"/>

    </head>
    
    <body>

        <div class="container center">
            
            <header id="menu-index" class="center">
                <div id="logo">

                </div>
                <nav id="menu-items" class="center">  
                    <ul>
                        <a href="#"><li class="preto">Temas</li></a>
                        <a href="#"><li class="preto">Canecas</li></a>
                        <a href="#"><li class="preto">Quadros</li></a> 
                        <a href="#"><li class="preto">Camisetas</li></a> 
                        <a href="#"><li class="preto">Mousepads</li></a> 
                        <a href="#"><li class="preto">Capinhas</li></a> 
                        <a href="#"><li class="preto">Coleções</li></a>  
                    </ul>
                </nav>
            </header>

            <main>
                
                <div id="container-search" class="center">
                    <form id="form-search" action="/src/repositories/products/searchProducts.php" method="GET">
                        <button type="submit" id="button-search"><img src="../../public/assets/icons/search-solid.svg" alt="" id="icon-search"></button>
                        <input type="search" name="search" id="bar-search" placeholder="Pesquisar...">                        
                    </form>
                
                    <a href="#" id="anchor-login" class="cinza-escuro">Entre ou cadastre-se</a>
                    
                    <div id="container-icons">
                        <a href="#" class="button-icons">
                            <img src="../../public/assets/icons/favoritos.svg" alt="" id="icon-wishlist">
                        </a>
                        <a href="#" class="button-icons">
                            <img src="../../public/assets/icons/sacola.svg" alt="" id="icon-shopping">
                        </a>
                    </div>                        
                </div>

                
                <section id="section-releases">
                   
                    <div class="slider-container">
                        <div id="slider-images">
                            <a href="#">
                                <img class="mySlides" src="../../public/assets/images/banner-camiseta-akira.png" width="100%">
                            </a>
                            <a href="#">
                                <img class="mySlides" src="../../public/assets/images/banner-caneca-akira.png" width="100%">
                            </a>
                            <a href="#">
                                <img class="mySlides" src="../../public/assets/images/banner-mousepad-akira.png" width="100%">
                            </a>
                        </div>

                        <div class="slide-buttons" style="width:100%">
                          <span class="button-slide demo" onclick="currentDiv(1)"></span>
                          <span class="button-slide demo" onclick="currentDiv(2)"></span>
                          <span class="button-slide demo" onclick="currentDiv(3)"></span>
                        </div>

                      </div>
                </section>

                <section id="section-bestsellers">

                    <h1 id="title-bestsellers" class="cinza-escuro">MAIS VENDIDOS</h1>
                    
                    <div id="slider-bestsellers">

                        <img class="icon-arrow" src="../../public/assets/icons/voltar-slider.svg" alt="Voltar" onclick="plusCards(-1)">


                        <div class="cards-page myCards">
                        <?php
                        //SELECT para trazer os producos
                            $sql = "SELECT p.nome, 
                                    p.preco_unitario,
                                    i.url_imagem
                                    FROM produto AS p INNER JOIN imagem AS i ON p.idproduto = i.produto_fk
                                    INNER JOIN produto_pedido AS pp ON p.idproduto = pp.produto_fk 
                                    ORDER BY pp.quantidade DESC
                                    LIMIT 3"; /* 3 mais vendidos */

                            if($select = mysqli_query($conexao, $sql)){


                                while($rsProduto = mysqli_fetch_array($select)){
                        ?>
                                        <div class="hover-position">
                                            <div class="card">
                                                <a href="#">
                                                    <img src="<?php echo($rsProduto['url_imagem']) ?>">
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

                        <div class="cards-page myCards">
                        <?php
                        //SELECT para trazer os producos
                            $sql = "SELECT p.nome, 
                                    p.preco_unitario,
                                    i.url_imagem
                                    FROM produto AS p INNER JOIN imagem AS i ON p.idproduto = i.produto_fk
                                    INNER JOIN produto_pedido AS pp ON p.idproduto = pp.produto_fk 
                                    ORDER BY pp.quantidade DESC
                                    LIMIT 3, 3"; /* 3 mais vendidos após os primeiros 3 */

                            if($select = mysqli_query($conexao, $sql)){


                                while($rsProduto = mysqli_fetch_array($select)){
                        ?>
                                        <div class="hover-position">
                                            <div class="card">
                                                <a href="#">
                                                    <img src="<?php echo($rsProduto['url_imagem']) ?>">
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

                        <img class="icon-arrow" src="../../public/assets/icons/ir-slider.svg" alt="avancar" onclick="plusCards(+1)">

                    </div>
                         
                </section>

                <section id="section-collections">
                    <h1 id="title-collections" class="cinza-escuro">COLEÇÕES</h1>
                    
                    <div id="slider-collections">
                        <img class="icon-arrow" src="../../public/assets/icons/voltar-slider.svg" alt="voltar" onclick=" return plusCollection(-1)">

                        <div class="collections myCollection">
                            <div class="collection-column-1">
                                <div class="image-collection">
                                    <img src="../../public/assets/images/caneca-berseker.png" alt="Ilustração do anime Berserk">
                                </div>
                                <div class="caption-collection">
                                    <img class="icon-collection" src="../../public/assets/icons/caneca.svg" alt="Ícone de caneca" title="Ver coleção">
                                    <div  class="productname-collection">
                                        <p>Caneca Berserk</p>
                                    </div>                                    
                                    <img class="icon-collection" src="../../public/assets/icons/carteira.svg" alt="Ícone de carteira" title="Ir para o produto">
                                </div>
                            </div>
                            <div class="collection-column-2">
                                <div class="name-collection">
                                    <h1 class="firstname-collection">Blood</h1>
                                    <h1 class="secondname-collection">Label</h1>
                                </div>   
                                <div class="description-collection">
                                    <p>Coleção inspirada no que tem de mais sangrento...</p>
                                </div>
                            </div>
                        </div>

                        <div class="collections myCollection">
                            <div class="collection-column-1">
                                <div class="image-collection">
                                    <img src="../../public/assets/images/cobra-kai_dark.png" alt="Quadro da série Cobra Kai">
                                    <img src="../../public/assets/images/cobra-kai_light.png" alt="Quadro da série Cobra Kai">
                                </div>
                                <div class="caption-collection">
                                    <img class="icon-collection" src="../../public/assets/icons/quadro.svg" alt="Ícone de caneca" title="Ver coleção">
                                    <div  class="productname-collection">
                                        <p>Quadro Cobra Kai</p>
                                    </div>                                    
                                    <img class="icon-collection" src="../../public/assets/icons/carteira.svg" alt="Ícone de carteira" title="Ir para o produto">
                                </div>
                            </div>
                            <div class="collection-column-2">
                                <div class="name-collection tv">
                                    <h1 class="firstname-collection">TV2Home</h1>
                                </div>   
                                <div class="description-collection">
                                    <p>Frases que nos marcaram na televisão, direto para a parede de casa.</p>
                                </div>
                            </div>
                        </div>

                        <img class="icon-arrow" src="../../public/assets/icons/ir-slider.svg" alt="avancar" onclick="return plusCollection(+1)">
                    </div>
                </section>
                
                <footer> Todos os direitos reservados - <a href="#">Geek Coins</a> 2020</footer>
            </main>
            
        </div> 

        <!--SCRIPTS JS-->
        <script src="../../public/scripts/index.js"></script>
        
    </body>

</html>