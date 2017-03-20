<?php
    require_once '../conexao.class.php';
    require_once '../crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    @$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysql_query("SELECT * FROM form003_cadastro WHERE id = $getId");
        $campo = mysql_fetch_array($consulta);
    }
    
    if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $nascimento = $_POST['nascimento'];
        $senha = $_POST['senha'];
        $id = $_POST['id'];
        $campos = "nome, email, nascimento, senha, id";
        $valores = "'$nome','$email', '$nascimento', '$senha', '$id'";
        $crud = new crud('form003_cadastro');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir($campos, $valores); // utiliza a funçao INSERIR da classe crud
        header("Location: lista_cadastro.php"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $nascimento = $_POST['nascimento'];
        $senha = $_POST['senha'];
        $id = $_POST['id'];
     //   $camposvalores = "nome='$nome', email='$email', nascimento='$nascimento', senha='$senha', id='$id'";
        $crud = new crud('form003_cadastro'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar("nome='$nome', email='$email', nascimento='$nascimento', senha='$senha'", "id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
        header("Location: lista_cadastro.php"); // redireciona para a listagem
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
            <label>Nascimento:</label>
            <input type="text" name="nascimento" value="<?php echo @$campo['nascimento'];?>" />
            <br />
            <br />
            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo @$campo['senha']; ?>" />
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