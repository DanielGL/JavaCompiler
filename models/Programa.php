<?php

/* Class: Programa
** Authors: 
** Daniel Garza Lee
** Benjamin González
** Mónica Lozano
** Date: April/2014
*/

class Programa{
	private $codigo;
	private $input;
	private $resultado;
    private $nombre;

	/*Constructor, getters y setters*/
	public function __construct($codigo, $input) {
		$this->codigo = $codigo;
		$this->input = $input;
    }

    public function set_codigo($codigo){
    	$this->codigo = $codigo;
    }

    public function set_input($input){
    	$this->input = $input;
    }

    public function set_resultado($resultado){
    	$this->resultado = $resultado;
    }

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function get_codigo(){
    	return $this->codigo;
    }

    public function get_input(){
    	return $this->input;
    }

	public function get_resultado(){
    	return $this->resultado;
    }

    public function get_nombre(){
        return $this->nombre;
    }

    //Tomar el nombre de la clase para la generación del nombre del archivo java
    public function crear_java(){
        $name_tmp = explode("{",$this->codigo);
        $final_name = explode(" ", $name_tmp[0]);
        $this->nombre = $final_name[2];
        $my_file = $this->nombre.'.java';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $data = $this->codigo;
        fwrite($handle, $data);
    }

        //Hacer la compilación y ejecución del programa a traves de execs
    public function compilar(){
        session_start();
        $params = explode(" ", $this->input);
        $filename = "$this->nombre";
        $command = "javac $filename.java 2>&1";
        $error = shell_exec($command);
        $output ="";
        if(!strlen($error) > 0){
            $command2 = "java ".$filename ;
            foreach($params as &$value){
                $command2 .=" " . $value ;
            }
            $resultado = exec($command2, $output);
            
        }
        $_SESSION['error']= $error;
        $_SESSION['output']= $output;
    }
    
}
?>