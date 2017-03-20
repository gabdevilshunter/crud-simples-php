<?php


    require_once '../conexao.class.php';
    require_once '../crud.class.php';

    $con = new conexao(); 
    $con->connect(); 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //apenas testando a conexao
            if($con->connect() == true){
                echo 'Conectou';
            }else{
                echo 'Não conectou';
            }
        ?>
        <a href="formulario_contact.php">
            Novo
        </a>
        <table style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                       Email
                    </th>
                    <th>
                       Facebook
                    </th>
                    <th>
                       Twitter 
                    </th>
                    <th>
                       Endereço
                    </th>
                    <th>
                       CEP
                    </th>
                    <th>
                       Número 
                    </th>
                    <th>
                       Mensagem
                    </th>
                    <th>
                       Motivo
                    </th>
                    <th>
                       Ofertas
                    </th>
                    <th>
                       ID
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = mysql_query("SELECT * FROM form002_contato"); // query que busca todos os dados da tabela form001_compra
                    while($campo = mysql_fetch_array($consulta)){ // laço de repetiçao que vai trazer todos os resultados da consulta
                ?>
                    <tr>
                        <td>
                            <?php echo $campo['nome']; ?>
                        </td>
                        <td>
                            <?php echo $campo['email']; ?>
                        </td>
                        <td>
                            <?php echo $campo['face']; ?>
                        </td>
                        <td>
                            <?php echo $campo['twitter']; ?>
                        </td>
                        <td>
                            <?php echo $campo['endereco']; ?>
                        </td>
                        <td>
                            <?php echo $campo['cep']; ?>
                        </td>
                        <td>
                            <?php echo $campo['numero']; ?>
                        </td>
                        <td>
                            <?php echo $campo['mensagem']; ?>
                        </td>
                        <td>
                            <?php echo $campo['motivo']; ?>
                        </td>
                        <td>
                            <?php echo ($campo['ofertas'] == 1)? "Sim" : "Não"; ?>
                        </td>
                        <td>
                            <?php echo $campo['id']; ?>
                        </td>
                        <td>
                            <a href="formulario_contact.php?id=<?php echo $campo['id']; //pega o campo ID para a ediçao ?>">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="deleta_contact.php?id=<?php echo $campo['id'];  //pega o campo ID para a exclusao ?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <center><a href="https://trabalho-final-cpw-gabdevilshunter.c9users.io/index.php">Voltar</a></center>
    </body>
</html>

<?php $con->disconnect();?> 