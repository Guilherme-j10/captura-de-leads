<?php

    namespace app\event\emails;

    // CLASSE DE CONEXAO
    use app\database\conexao;

    // CRUD DOS EMAILS
    class DAOemails{

        // FUNÇÃO QUE RETORNA A URL ATUAL DA PAGINA 
        public function url(){
            $dominio = $_SERVER['HTTP_HOST'];
            $url = "http://".$dominio.$_SERVER['REQUEST_URI'];

            return $url;
        }

        //FUNÇÃO QUE INSETE OS DADOS NO BANCO DE DADOS
        public function insert(){
            $pdo = conexao::conn();
            $url = DAOemails::url();

            if(isset($_POST["sand"])){
                
                $stmt = $pdo->prepare("INSERT INTO emails (email) VALUES (:email)");
                $stmt->execute([":email" => addslashes($_POST["email"])]);

                if($stmt->rowCount() > 0){
                    echo "<script> alert('Enviado'); location.href = '{$url}'; </script>";
                }else{
                    echo "<script> alert('Erro'); location.href = '{$url}'; </script>";
                }

            }
        }

        //FUNÇÃO QUE RETORNA OS DADOS DO BANCO DE DADOS PARA A PAGINA USER.PHP
        public function select(){
            $pdo = conexao::conn();

            $stmt = $pdo->prepare("SELECT * FROM emails");
            $stmt->execute();

            while($dados = $stmt->fetch(\PDO::FETCH_ASSOC)){
                echo "
                    <tr>
                        <td>{$dados["id_emails"]}</td>
                        <td>{$dados["email"]}</td>
                    </tr>
                ";
            }
        }

        /*
            OBS: 
                EU PODERIA TER UTILIZADO A FUNÇÃO 'SELECT' DANDO A ELA A MESMA FUNCIONALIDADE 
                QUE A FUNÇÃO ADMIN, PASSANDO APENAS UM PARÂMETRO PARA A MESMA, DESTA FORMA 
                TERIA UTILIZADO MENOS LINHAS DE CÓDIGO, PORÉM OPTEI POR DEIXAR ALGO MAIS SEPARADO
                PARA UM FÁCIL ENTENDIMENTO.
        */

        // FUNÇÃO QUE RETORNA OS DADOS DO BANCO DE DADOS PARA A PAGINA ADMIN.PHP COM A FUNCIONALIDADE DE (DELETAR)
        public function admin(){
            $pdo = conexao::conn();

            $stmt = $pdo->prepare("SELECT * FROM emails");
            $stmt->execute();

            while($dados = $stmt->fetch(\PDO::FETCH_ASSOC)){
                echo "
                    <tr>
                        <td>{$dados["id_emails"]}</td>
                        <td>{$dados["email"]}</td>
                        <td>
                            <form method='post' class='tableform'>
                                <input type='hidden' name='id' value='{$dados["id_emails"]}'>
                                <input type='submit' name='deletar' value='DELETAR'>
                            </form>
                        </td>
                    </tr>
                ";
            }
            // CHAMA A FUNÇÃO 'DELETA' CASO O USUÁRIO CLIUE NO INPUT DELETAR DO FORM
            DAOemails::deleta();
        }

        // FUNÇÃO QUE DELETA OS DADOS
        public function deleta(){
            $pdo = conexao::conn();
            $url = DAOemails::url();

            if(isset($_POST["deletar"])){
                $stmt = $pdo->prepare("DELETE FROM emails WHERE id_emails = :id");
                $stmt->execute(array(':id' => $_POST["id"]));

                if($stmt->rowCount() > 0){
                    echo "<script> location.href = '{$url}'; </script>";
                }else{
                    echo "<script> alert('ERRO'); location.href = '{$url}'; </script>";
                }
            }
        }

    }