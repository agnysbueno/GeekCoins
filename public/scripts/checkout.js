var checkoutIndex = 1;

showDivs(checkoutIndex);

function currentDiv(n) {
    showDivs(checkoutIndex = n);     
};

function showDivs(n) {
    let i;
    let x = document.getElementsByClassName("myCheckout");
    var dots = document.getElementsByClassName("options");

    if (n > x.length) {checkoutIndex = 1}
    if (n < 1) {checkoutIndex = x.length}
    for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
    }
    
    x[checkoutIndex-1].style.display = "flex";

    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" selected", "");
    }
    dots[checkoutIndex-1].className += " selected";
};

/**************************** Preço ******************************************/

function add(obj){
    let item = document.getElementById(""+obj.id+"");
    let quantity = item.children[1].children[1].children[1];
    let divPrice = item.children[1].children[2];
    let newPrice = 0;
    let initialPrice = (item.children[1].children[3]).innerText;

    initialPrice = parseFloat(initialPrice.replace(',' , '.'));
    
    let newValue = quantity.value - (-1); //evita concatenações
    
    quantity.value = newValue;
    
    newPrice = quantity.value * initialPrice;
    newPrice = parseFloat(newPrice).toFixed(2);
    divPrice.innerHTML = `R$ ${newPrice}`;

    updateTotal();
}

  
function reduce(obj){
    let item = document.getElementById(""+obj.id+"");
    let quantity = item.children[1].children[1].children[1];
    let divPrice = item.children[1].children[2];
    let newPrice = 0;
    let initialPrice = (item.children[1].children[3]).innerText;

    initialPrice = parseFloat(initialPrice.replace(',' , '.'));
    
    if(quantity.value > 0) { //evita números negativos
      let newValue = quantity.value - 1;
      quantity.value = newValue;
        
      if (quantity.value !== 0) {
          newPrice = quantity.value * initialPrice;
          newPrice = parseFloat(newPrice).toFixed(2);
          divPrice.innerHTML = `R$ ${newPrice}`;

      } if (quantity.value == 0){
          let name = confirm("Você deseja mesmo excluir esse item do carrinho?")
            if (name == true) {
              item.parentNode.removeChild(item);
              updateTotal();
            }
            else{
              quantity.value = 1;
              divPrice.innerHTML = `R$ ${initialPrice}`;
            }
      }
    }

    updateTotal();
}

function updateTotal() {
  let price1 = document.getElementById("price1");
  let price2 = document.getElementById("price2");
  let frete = document.getElementById("frete");
  let divSubtotal = document.getElementById("subtotal");
  let divTotal = document.getElementById("total"); 

  console.log("mousepad: "+ price1 + " caneca: "+ price2)


  if (price1 !== null && price2 !== null){
        price1 = price1.innerText.split(" ")[1];
        price2 = price2.innerText.split(" ")[1];
        frete = frete.innerText.split(" ")[1];

        price1 = parseFloat(price1.replace(',' , '.'));
        price2 = parseFloat(price2.replace(',' , '.'));
        frete = parseFloat(frete.replace(',' , '.'));

        console.log("os não são null")

  } else if (price1 !== null) {
        price1 = price1.innerText.split(" ")[1];
        frete = frete.innerText.split(" ")[1];

        price1 = parseFloat(price1.replace(',' , '.'));
        frete = parseFloat(frete.replace(',' , '.'));
        price2 = 0.00;

        console.log("2 é null")
  } else if (price2 !== null) {
        price2 = price2.innerText.split(" ")[1];
        frete = frete.innerText.split(" ")[1];

        price2 = parseFloat(price2.replace(',' , '.'));
        frete = parseFloat(frete.replace(',' , '.'));
        price1 = 0.00;

        console.log("1 é null")
  } else {
        let divPedido = document.getElementById("products");

        divPedido.innerHTML = "<p> Sem produtos no carrinho </p>";
  }

  let subtotal = parseFloat(price1 + price2).toFixed(2);

  let total = price1 + price2 + frete;

  total = parseFloat(total).toFixed(2);

  divSubtotal.innerHTML = `R$ ${subtotal}`;
  divTotal.innerHTML = `R$ ${total}`;
}


/**************************** CEP form ******************************************/

function clean_form_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
};

function my_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
    } else {
        //CEP não Encontrado.
        clean_form_cep();
        alert("CEP não encontrado.");
    }
};

function searchcep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=my_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } else {
            //cep é inválido.
            clean_form_cep();
            alert("Formato de CEP inválido.");
        }

    } else {
        //cep sem valor, limpa formulário.
        clean_form_cep();
    }
};

/**************************** Finzalizar ******************************************/

function finalizar(){
    alert("Compra Finalizada com sucesso!")
    window.location.href = "http://localhost/geekcoins/src/views/"
}