<?php
    /*Conexion a Base de Datos mediante PDO
    Establece la conexion a la base de datos utilizando las contastes creadas en configurar.php
    **SE RECOMIENDA NO MODIFICAR ESTE ARCHIVO SI NO CUENTAS CON LOS CONOCIMIENTOS NECESARIOS**
    */
    class Base{
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $nombre_base = DB_NOMBRE;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
                $this->dbh->exec('set names utf8');
            } catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        public function bind($parametro, $valor, $tipo = null){
            if (is_null($tipo)) {
                switch (true) {
                    case is_int($valor):
                            $tipos = PDO::PARAM_INT;
                        break;
                        case is_bool($valor):
                            $tipo = PDO::PARAM_BOOL;
                        break;
                        case is_null($valor):
                            $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                            $tipo = PDO::PARAM_SRT;
                            break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }

        public function execute(){
            return $this->stmt->execute();
        }

        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }