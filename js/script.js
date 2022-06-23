// Criar uma função em JavaScript 
//Formato ES6 baseado em Arrow Function

//Função que realiza o cadastro de livros
const cadastrar = () => {
  // declara a variavel valor e captura o valor preenhido

  // Capitura o valor digitado no campo titulo
  let titulo = document.getElementById('titulo').value

  // declara a variavel valor e captura o valor preenhido
  let autor = document.getElementById('autor').value

  // declara a variavel valor e captura o valor preenhido
  let valor = document.getElementById('valor').value

  // declara a variavel valor e captura o valor preenhido
  let categoria = document.getElementById('categoria').value

  if (titulo == '') {
    alert('Digite o título do livro')
    return
  }

  if (autor == '') {
    alert('Digite o autor do livro')
    return
  }

  if (valor == '') {
    alert('Digite o valor do livro')
    return
  }

  if (categoria == '') {
    alert('Digite a categoria do livro')
    return
  }

  // envio dos dados usando fetch ao backend
    fetch('backend/cadastrar-livro.php',{
      method:'POST',
      body:`titulo=${titulo}&autor=${autor}&categoria=${categoria}&valor=${valor}`,
      headers: {
        'Content-type': 'application/x-www-form-urlencoded'
      }
      
    })



}

   // Forma de função padrão
  // Function Cadastrar(){
 //  }