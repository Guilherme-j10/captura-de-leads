<!-- CHAMADA DO AUTOLOAD -->
<?php require_once'../vendor/autoload.php'; ?>
<!-- CHAMADA DAS FUNCIONALIDADES -->
<?php include("../app/functions/sendEmail.php"); ?>
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
            <!-- FORMULÁRIO -->
            <form method="POST">
                <header>
                    <h1>Assine nossa newsletter</h1>
                </header>
                <!-- INPUTS DO USUÁRIO -->
                <div class="line">
                    <input type="email" name="email" placeholder="Digite seu nome" required>
                    <button type="submit" name="sand">SAND</button>
                </div>
            </form>
            <!-- FUNÇÃO QUE ENVIA O EMAIL -->
            <?php email(); ?>

            <!-- CLASSE ENCARREGADA DE INSERIR AS INFORMAÇÕES NO BANCO DE DADOS -->
            <?php app\event\emails\DAOemails::insert(); ?>

            <!-- LINKS QUE ENVIAM PARA AS PAGINAS DE VISUALIZAÇÃO E CONTROLE (USER, ADMIN) -->
            <div class="links">
                <a href="user.php" target="_blank">user</a>
                <a href="admin.php" target="_blank">admin</a>
            </div>
        </main>
    </body>
</html>