<?php
    require_once '../conexao.class.php';
    require_once '../crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    @$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysql_query("SELECT * FROM form001_compra WHERE id = $getId");
        $campo = mysql_fetch_array($consulta);
    }
    
    if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $tel = $_POST['tel'];
        $cel = $_POST['cel'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $plataforma = $_POST['plataforma'];
        $maior_idade = $_POST['maior_idade'];
        $pagamento = $_POST['pagamento'];
        $conheceu = $_POST['conheceu'];
        $id = $_POST['id'];
        $campos = "nome, email, logradouro, numero, telefone, celular, cpf, senha, plataforma, 
        maior_idade, pagamento, conheceu, id";
        $valores = "'$nome','$email', '$logradouro', '$numero', '$tel', '$cel', '$cpf', '$senha',
        '$plataforma', '$maior_idade', '$pagamento', '$conheceu', '$id'";
        $crud = new crud('form001_compra');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir($campos, $valores); // utiliza a funçao INSERIR da classe crud
        header("Location: lista_compra.php"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $tel = $_POST['tel'];
        $cel = $_POST['cel'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];
        $plataforma = $_POST['plataforma'];
        $maior_idade = $_POST['maior_idade'];
        $pagamento = $_POST['pagamento'];
        $conheceu = $_POST['conheceu'];
        $id = $_POST['id'];
        $atualize = "nome='$nome', email='$email', logradouro='$logradouro', numero='$numero', telefone='$tel',
        celular='$cel', cpf='$cpf', senha='$senha', plataforma='$plataforma', maior_idade='$maior_idade', 
        pagamento='$pagamento', conheceu='$conheceu'";
        $crud = new crud('form001_compra'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar($atualize, "id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
        header("Location: lista_compra.php"); // redireciona para a listagem
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post"><!--   formulario carrega a si mesmo com o action vazio  -->
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo @$campo['nome']; ?>" />
            <br />
            <br />
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo @$campo['email'];?>" />
            <br />
            <br />
            <label>Logradouro:</label>
            <input type="text" name="logradouro" value="<?php echo @$campo['logradouro'];?>" />
            <br />
            <br />
            <label>Número:</label>
            <input type="text" name="numero" value="<?php echo @$campo['numero'];?>" />
            <br />
            <br />
            <label>Telefone:</label>
            <input type="text" name="tel" value="<?php echo @$campo['telefone'];?>" />
            <br />
            <br />
            <label>Celular:</label>
            <input type="text" name="cel" value="<?php echo @$campo['celular'];?>" />
            <br />
            <br />
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo @$campo['cpf'];?>" />
            <br />
            <br />
            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo @$campo['senha'];?>" />
            <br />
            <br />
            <label>Plataforma:</label>
            <input type="text" name="plataforma" value="<?php echo @$campo['plataforma'];?>" />
            <br />
            <br />
            <label>Maior de Idade(0 Para 'Não' e 1 Para 'Sim':</label>
            <input type="text" name="maior_idade" value="<?php echo @$campo['maior_idade'];?>" />
            <br />
            <br />
            <label>Pagamento:</label>
            <input type="text" name="pagamento" value="<?php echo @$campo['pagamento'];?>" />
            <br />
            <br />
            <label>Como Conheceu:</label>
            <input type="text" name="conheceu" value="<?php echo @$campo['conheceu'];?>" />
            <br />
            <br />
            <?php
                if(@!$campo['id']){ // se nao passar o id via GET nao está editando, mostra o botao de cadastro
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar" />
            <?php }else{ // se  passar o id via GET  está editando, mostra o botao de ediçao ?>
                <input type="submit" name="editar" value="Editar" />    
            <?php } ?>
        </form>
    </body>
</html>
<?php $con->disconnect(); // fecha conexao com o banco ?>