<?php
    // conexão
    require_once('../db/conexao.php');
    $conexao = conexaoMysql();

    //paginação
    $total_reg = 6; // produtos por página

    // cria a instrução SQL que vai selecionar os dados
    $query = "SELECT p.nome, 
    p.preco_unitario,
    i.url_imagem
    FROM produto AS p INNER JOIN imagem AS i ON p.idproduto = i.produto_fk
    WHERE categoria_fk = 2
    GROUP BY p.nome
    ORDER BY p.preco_unitario ASC";

    // executa a query
    $dados = mysqli_query($conexao, $query);

    // calcula quantos dados retornaram
    $total = mysqli_num_rows($dados);

    $total_paginas = $total / $total_reg; // verifica o número total de páginas

    $total_reg = 6; // produtos por página

    $pagina_atual = 0;

    $total_paginas = $total / $total_reg; // verifica o número total de páginas

    $proxima_pag = ($pagina_atual * $total_reg) - $total_reg 
?>

<!DOCTYPE html>
<html lang="pt-br">
    <link rel="shortcut icon" href="../../public/assets/icons/coin.ico">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canecas - Geek Coins</title>

    <link href="../../public/css/global.css" rel="stylesheet"/>
    <link href="../../public/css/search.css" rel="stylesheet"/>
    <link href="../../public/css/palette.css" rel="stylesheet"/>

</head>
<body>

    <aside class="container-filters center">
        <a href="index.php" class="logo">
            <img src="../../public/assets/icons/logo-horizontal.svg" alt="Logotipo Geek Coins">
        </a>

        <div class="filters">
        
            <div class="total-results">
                <span><?php echo($total) ?> Resultados</span>
            </div>

            <div class="division-line"></div>

            <div class="budget">
                <p class="filter-title">Preço</p>
                <form action="" method="GET" class="budget-form">
                    <label for="min-price"></label>
                    <input type="text" name="min-price" class="budget-price" placeholder="R$ mín">
                    <label for="max-price"></label>
                    <input type="text" name="max-price" class="budget-price" placeholder="R$ máx">
                </form>
            </div>

            <div class="division-line"></div>

            <div class="categories">
                <p class="filter-title">Produto</p>
                
                <div id="checkboxes-products">
                    <label class="checkbox-label" for="all-products">
                        <input type="checkbox" id="all-products" name="all-products" value="all">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Todos</span>
                        </span>
                    </label>
    
                    <label class="checkbox-label" for="caneca">
                        <input type="checkbox" id="caneca" name="caneca" value="caneca" checked="checked">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Caneca</span>
                        </span>
                    </label>

                    <label class="checkbox-label" for="quadro">
                        <input type="checkbox" id="quadro" name="quadro" value="quadro">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Quadro</span>
                        </span>
                    </label>

                    <label class="checkbox-label" for="camiseta">
                        <input type="checkbox" id="camiseta" name="camiseta" value="camiseta">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Camiseta</span>
                        </span>
                    </label>

                    <label class="checkbox-label" for="mousepad">
                        <input type="checkbox" id="mousepad" name="mousepad" value="mousepad">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Mousepad</span>
                        </span>
                    </label>

                    <label class="checkbox-label" for="capinha">
                        <input type="checkbox" id="capinha" name="capinha" value="capinha">
                        <span class="checkbox-product-custom">
                            <span class="name-option">Capinha</span>
                        </span>
                    </label>
                </div>
                
            </div>

            <div class="division-line"></div>

            <div class="collections">
                <p class="filter-title">Coleção</p> 
                <label class="checkbox-label" for="all-collections">
                    <p class="name">Todas</p>
                    <input type="checkbox" id="all-collections" name="all-collections" value="all">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>
                </label>
                
                <label class="checkbox-label" for="blood-label"> 
                    <p class="name">Blood Label</p>
                    <input type="checkbox" id="blood-label" name="blood-label" value="bloodlabel">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>
                </label>
                
                <label class="checkbox-label" for="tv2home"> 
                    <p class="name">TV 2 HOME</p>
                    <input type="checkbox" id="tv2home" name="tv2home" value="tv2home">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>                   
                </label>
                
                <label class="checkbox-label" for="bestenemies4ever"> 
                    <p class="name">BestEnemies4ever</p>
                    <input type="checkbox" id="bestenemies4ever" name="bestenemies4ever" value="bestenemies4ever">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>                   
                </label>
                
                <label class="checkbox-label" for="lol"> 
                    <p class="name">Work of Legends</p>
                    <input type="checkbox" id="lol" name="lol" value="lol">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>                   
                </label>
                
                <label class="checkbox-label" for="bleach"> 
                    <p class="name">Bleach Coffee</p>
                    <input type="checkbox" id="bleach" name="bleach" value="bleach">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>                   
                </label>
                
                <label class="checkbox-label" for="naruto"> 
                    <p class="name">Total Naruto</p>
                    <input type="checkbox" id="naruto" name="naruto" value="naruto">
                    <span class="checkbox-custom"></span>
                    <span class="checkbox-checked"></span>                   
                </label> 
            </div>

        </div>
    </aside>

    <main class="container-results center">
        <div class="container-intern center">

            <div id="container-search" class="center">
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

            <div class="delivery-ordination">
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
                <div class="ordination">
                    <span class="order-by">Ordenar por:</span>
                    <form action="" method="GET" class="form-ordination">
                        <label for="ordination"></label>
                        <select name="ordination" id="ordination" class="select-ordination">
                            <option value="price-asc">Menor preço</option>
                            <option value="price-desc">Maior preço</option>
                            <option value="rate-desc">Mais bem avaliados</option>
                            <option value="bestsellers-desc" selected="selected">Mais vendidos</option>
                            <option value="launch-desc">Lançamentos</option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="all-results">
                
            <?php
                // se o número de resultados for maior que zero, mostra os dados
                if($total > 0) {
                    for($i = 0; $i <= $total_paginas; $i++){

                        $pagina_atual = $i;

                        $filtro = $pagina_atual * $total_reg;

                        $sql = "SELECT p.nome, 
                                p.preco_unitario,
                                i.url_imagem
                                FROM produto AS p INNER JOIN imagem AS i ON p.idproduto = i.produto_fk
                                WHERE categoria_fk = 2
                                GROUP BY p.nome
                                ORDER BY p.preco_unitario ASC
                                LIMIT $filtro, $total_reg";

                        $dados = mysqli_query($conexao, $sql)

            ?>

                        <div class="results myPages">
            <?php

                        // inicia o loop que vai mostrar os dados
                        while($rsProduto = mysqli_fetch_array($dados)){
                            
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
            ?>
                        </div>
            <?php            
                    }
            ?>
                    <div class="results-navigation">

                        <img class="icon-arrow" src="../../public/assets/icons/voltar-slider.svg" alt="Voltar" onclick="plusDivs(-1)">

                        <div class="slide-buttons">
                            <?php 
                                for($i = 0; $i <= $total_paginas; $i++){

                                    ?>
                                    <span class="button-slide demo" onclick="currentDiv(<?php echo($i + 1) ?>)"></span>
                                <?php
                                }
                                ?>
                        </div>

                        <img class="icon-arrow" alt="Avançar" src="../../public/assets/icons/ir-slider.svg" onclick="plusDivs(+1)">
                    </div>
            <?php 
                }
            ?> 
            </div>
            
        </div>
    </main>
    
    <!--SCRIPTS JS-->
    <script src="../../public/scripts/search.js"></script>
</body>
</html>
    

