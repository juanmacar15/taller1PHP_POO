<?php
    header('Acces-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');
    $_DATA = json_decode(file_get_contents("php://input"),true);


    class productos{
        public $codigo;
        public $unidades;

        public function __construct(int $codigo,int $unidades){
            $this->codigo = $codigo;
            $this->unidades = $unidades;
        }   

        public function codigos(){
            $codigo = match($this->codigo){
                10 => $codigo = 2000,
                20 => $codigo = 1000,
                30 => $codigo = 600,

                default => $codigo = "codigo no valido"
            };
            return $codigo;
        }
        public function pagar():string{
            $codigo = $this->codigos();
            $pagar = $codigo*$this->unidades;
            return $pagar;
        }
    }
    $lista = new productos(codigo:$_DATA['codigo'],unidades:$_DATA['unidades']);
    echo($lista->pagar());
?>