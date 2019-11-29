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
            <!-- TABELA ONDE OS EMAILS SÃO RETORNADOS -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>EMAILS</th>
                </tr>
                <!-- CLASSE ENCARREGADA DE RETORNAR O DADOS DO BANCO DE DADOS -->
                <?php app\event\emails\DAOemails::select(); ?>
            </table>
        </main>
    </body>
</html>