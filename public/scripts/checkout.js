var checkoutIndex = 1;

showDivs(checkoutIndex);

function currentDiv(n) {
    showDivs(checkoutIndex = n);     
}

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
}

function add(){
    var current = document.getElementById("total").value;
    var newValue = current - (-1); //evita concatenações
    document.getElementById("total").value = newValue;
}
  
function reduce(){
    var current = document.getElementById("total").value;
    if(current > 0) { //evita números negativos
      var newValue = current - 1;
      document.getElementById("total").value = newValue;
    }
}

/**************************** CEP form ******************************************/

function clean_form_cep() {
  //Limpa valores do formulário de cep.
  document.getElementById('rua').value=("");
  document.getElementById('bairro').value=("");
  document.getElementById('cidade').value=("");
  document.getElementById('uf').value=("");
}

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
}

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

  } //end if.
  else {
      //cep é inválido.
      clean_form_cep();
      alert("Formato de CEP inválido.");
  }
} //end if.
else {
  //cep sem valor, limpa formulário.
  clean_form_cep();
}
};