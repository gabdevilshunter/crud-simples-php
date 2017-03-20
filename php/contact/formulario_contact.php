<?php
    require_once '../conexao.class.php';
    require_once '../crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    @$getId = $_GET['id'];  //pega id para ediçao caso exista
    if(@$getId){ //se existir recupera os dados e tras os campos preenchidos
        $consulta = mysql_query("SELECT * FROM form002_contato WHERE id = $getId");
        $campo = mysql_fetch_array($consulta);
    }
    
    if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $face = $_POST['face'];
        $twitter = $_POST['twitter'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $mensagem = $_POST['mensagem'];
        $motivo = $_POST['motivo'];
        $ofertas = $_POST['ofertas'];
        $id = $_POST['id'];
        $campos = "nome, email, face, twitter, endereco, cep, numero, mensagem, motivo, ofertas";
        $valores = "'$nome','$email', '$face', '$twitter', '$endereco', '$cep', '$numero', '$mensagem', '$motivo',
        '$ofertas'";
        $crud = new crud('form002_contato');  // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->inserir($campos, $valores); // utiliza a funçao INSERIR da classe crud
        header("Location: lista_contact.php"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita 
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME 
        $email = $_POST['email']; //pega o elemento com o pelo NAME 
        $face = $_POST['face'];
        $twitter = $_POST['twitter'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $mensagem = $_POST['mensagem'];
        $motivo = $_POST['motivo'];
        $ofertas = $_POST['ofertas'];
        $id = $_POST['id'];
        $atualize = "nome='$nome', email='$email', face='$face', twitter='$twitter', endereco='$endereco', cep='$cep', 
        numero='$numero', mensagem='$mensagem', motivo='$motivo', ofertas='$ofertas'";
        $crud = new crud('form002_contato'); // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
        $crud->atualizar($atualize, "id='$getId'"); // utiliza a funçao ATUALIZAR da classe crud
        header("Location: lista_contact.php"); // redireciona para a listagem
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
            <label>Facebook:</label>
            <input type="text" name="face" value="<?php echo @$campo['face'];?>" />
            <br />
            <br />
            <label>Twitter:</label>
            <input type="text" name="twitter" value="<?php echo @$campo['twitter'];?>" />
            <br />
            <br />
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo @$campo['endereco'];?>" />
            <br />
            <br />
            <label>CEP:</label>
            <input type="text" name="cep" value="<?php echo @$campo['cep'];?>" />
            <br />
            <br />
            <label>Número:</label>
            <input type="text" name="numero" value="<?php echo @$campo['numero'];?>" />
            <br />
            <br />
            <label>Mensagem:</label>
            <input type="text" name="mensagem" value="<?php echo @$campo['mensagem'];?>" />
            <br />
            <br />
            <label>Motivo:</label>
            <input type="text" name="motivo" value="<?php echo @$campo['motivo'];?>" />
            <br />
            <br />
            <label>Ofertas:</label>
            <input type="text" name="ofertas" value="<?php echo @$campo['ofertas'];?>" />
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