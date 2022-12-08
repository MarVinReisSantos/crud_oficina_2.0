trocaFiltro();

function trocaFiltro(){
  const botao = "<button type='submit' class='btn btn-primary'>Pesquisar</button>";
  let labelTipoFiltroEl = document.querySelector("#tipos_Filtro");
  let lebelPesquisaEl = document.querySelector("#pesquisa-label");
  let input = "";
  
  if(labelTipoFiltroEl.value=="Data"){
    input = "<input type='date' name='DataInicial' id='DataInicial'>";
    input += " até "
    input += "<input type='date' name='DataFinal' id='DataFinal'>";

  }else if(labelTipoFiltroEl.value=="Vendedor"){
    input = "<input size='35' maxlength='50' name='Vendedor' id='Vendedor' type='text'>";
  }else if(labelTipoFiltroEl.value=="Cliente"){
    input = "<input size='35' maxlength='50' name='Cliente' id='Cliente' type='text'>";
  }

  if(labelTipoFiltroEl.value!=="Nenhum"){
    lebelPesquisaEl.innerHTML = labelTipoFiltroEl.value + ": " + input + " " + botao;
  }

  if(labelTipoFiltroEl.value==="Nenhum")
    lebelPesquisaEl.innerHTML = "";
}