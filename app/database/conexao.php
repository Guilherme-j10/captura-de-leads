<?php 

    namespace app\database;

    class conexao{

        // CONSTANTES DO BANCO DE DADOS
        const host = 'localhost';
        const user = 'root';
        const senha = '';
        const dbname = 'leads';

        // FUNÇÃO DE CONEXAO
        public function conn(){
            try {
                return $pdo = new \PDO("mysql:host=".self::host."; dbname=".self::dbname."; charset=utf8", self::user, self::senha);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

    }