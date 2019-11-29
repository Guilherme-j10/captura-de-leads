<!-- CHAMADA DO AUTOLOAD -->
<?php require_once'../vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Newsletter</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
        <main>
            <!-- TABELA ONDE OS EMAILS SÃO RETORNADOS COM A OPÇÃO DE DELETAR -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>EMAILS</th>
                    <th>ACTION</th>
                </tr>
                <!-- CLASSE ENCARREGADA DE RETORNAR O DADOS DO BANCO DE DADOS COM A FUNCIONALIDADE (DELETE) -->
                <?php app\event\emails\DAOemails::admin(); ?>
            </table>
        </main>
    </body>
</html>