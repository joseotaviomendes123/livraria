<?php
// exibe todas a variaveis enviadas via POST ao PHP 
//    var_dump($_POST);

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
      $sql = 'SELECT * FROM tb_livros WHERE Ativo = 1';


        // prepara a execução da query sql acima
        $comando = $conexao->prepare($sql);

        // executa a query preparada ascima
        $comando->execute();

        // essa linha irá tratar os dados do retorno do SELECT executado no banco de dados, 
        // somente é usado nesse caso, em INSERT, UPDATE, DELETE, não tem necessidade

        $resposta = $comando->fetchAll(PDO::FETCH_ASSOC);


        //criar um array para resposta ao usúario
      } catch(PDOException $e) {
        // aqui é tratado o erro e retornado com sucesso
        $resposta = array("resposta"=>"Erro","mensagem"=>$e->getMessage());
      
      }

// converte o array resposta em JSON 
      // JSON_UNESCAPED_UNICODE = Manter o arquivo com mapa de caracter padrão 
      
      $json = json_encode($resposta,JSON_UNESCAPED_UNICODE);

      echo $json;

       // echo "Cadastro realizado com sucesso!";

// final da conexao
?>