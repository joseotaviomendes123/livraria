<?php
// exibe todas a variaveis enviadas via POST ao PHP 
//    var_dump($_POST);

// criar uma variavel em PHP 
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$categoria = $_POST['categoria'];
$valor = $_POST['valor'];

// conexao com o banco de dados 
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $bancodados = 'db_livraria';



    try {
       // Definindo as configurações das configurações de conexão com o banco de dados
        $conexao= new PDO("mysql:host=$servidor;dbname=$bancodados;charset=utf8", $usuario, $senha);
        
        // seta o modo de erro do PDO para exception
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // query de inserção de dados no BD mySQL
      $sql = "INSERT into 
        tb_livros
          (titulo,autor,valor,categoria)
        VALUES 
              ('$titulo','$autor','$valor','$categoria')"; 

        // prepara a execução da query sql acima
        $comando = $conexao->prepare($sql);

        // executa a query preparada ascima
        $comando->execute();

        //criar um array para resposta ao usúario
        $resposta = array("Resposta"=>"ok","mensagem"=>"Cadastro realizado com sucesso");

      // converte o array resposta em JSON 
      // JSON_UNESCAPED_UNICODE = Manter o arquivo com mapa de caracter padrão 
      $json = json_encode($resposta,JSON_UNESCAPED_UNICODE);

      echo $json;

       // echo "Cadastro realizado com sucesso!";
      } catch(PDOException $e) {
        echo "Ti fude rapa: " . $e->getMessage();
      }

// final da conexao
?>