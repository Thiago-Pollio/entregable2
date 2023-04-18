<?php 

class Viaje {

    private $codigo;
    private $destino;
    private $cantMax;
    private $coleccionPasajeros = array();
    private $objResponsable;

    public function __construct ($codigo, $destino, $cantMax, $coleccionPasajeros, $objResponsable) {
        
        
        $this -> codigo = $codigo;
        $this -> destino = $destino;
        $this -> cantMax = $cantMax;
        $this -> coleccionPasajeros = $coleccionPasajeros;
        $this -> objResponsable = $objResponsable;


    }

    public function getCodigo (){
        return $this -> codigo;
    }

    public function getDestino (){
        return $this -> destino;
    }

    public function getCantMax (){
        return $this -> cantMax;
    }

    public function getColeccionPasajeros (){
        return $this -> coleccionPasajeros;
    }

    public function getObjResponsable (){
        return $this -> objResponsable;
    }

    public function setCodigo ($codigo){
        $this -> codigo = $codigo;
    }

    public function setDestino ($destino){
        $this -> destino = $destino;
    }

    public function setCantMax ($cantMax){
        $this -> cantMax = $cantMax;
    }

    public function setColeccionPasajeros ($coleccionPasajeros){
        $this -> coleccionPasajeros = $coleccionPasajeros;
    }

    public function setObjResponsable ($objResponsable){
        $this -> $objResponsable = $objResponsable;
    }


    /**
     * agrega pasajeros y verifica que no esten repetidos
     * @param object $objPasajeros
     * @return boolean
     */
    public function losDatos ($objPasajeros){

        $llamarArrayNuevo = $this -> getColeccionPasajeros();
        $count = count ($llamarArrayNuevo);
        $existe = false;
        $boolean = true;
        $i = 0;
        $dni = $objPasajeros-> getDocumento();
        while ($i <= $count && $existe == false) {
            $pasaj = $llamarArrayNuevo[$i];
            $dniP = $pasaj->getDocumento();
            if($dniP == $dni){
                $existe = true;
            }
            $i++;
        }

        if($existe == false){
            $boolean = true;           
            $llamarArrayNuevo[] = $objPasajeros;
            $this->setColeccionPasajeros($llamarArrayNuevo);
        } else{
            $boolean = false;
        }
        
        

        }

    /**
     * @param string $nuevoDocumento
     * @param string $elNombre
     * @param string $elApellido
     * @param float $elDocumento
     * @return boolean
     */

    public function modificarElPasajero ($dni ){

        $llamarArrayNuevo = $this -> getColeccionPasajeros();
        $c = count ($llamarArrayNuevo);
        $encontrado = false;
        //$boolean = true;
        $i = 0;
        //$dni = $objPasajeros-> getDocumento();
        while ($i < $c && $encontrado == false) {
            $pasaj = $llamarArrayNuevo[$i];
            $dniM = $pasaj->getDocumento();
            if($dniM == $dni){
                $encontrado = true;
            }
            $i++;
        }

        return ($encontrado);



    }

    

    public function losDatosDelResponsable ($nuEmpleado, $nuLicencia, $unNombreRe, $unApellidoRe){

        $objResponsable = new ResponsableV ($nuEmpleado, $nuLicencia, $unNombreRe, $unApellidoRe);
        $this->setObjResponsable($objResponsable);
        

        }

        /**
     * crea el objeto responsable
     * @param int $numEmp
     * @param int $numLic
     * @param string $nom
     * @param string $apell
     */


        public function modificarElResponsable ($nuevoNumero){
    
           $llamarObj = $this->getObjResponsable();
           $a = $llamarObj ->getNumeroDeEmpleado();
    
           $encontrado = false;
           
              if ($a == $nuevoNumero) {
                $encontrado = true;
    
            }
                
            return ($encontrado);
    
    
    
        }


    public function __toString(){
    
        return "Codigo: ".$this->getCodigo()."\n".
        "Destino: ".$this->getDestino()."\n".
        "Cantidad maxima de pasajeros: ".$this->getCantMax()."\n".
        "Pasajeros: ".$this->getcoleccionPasajeros()."\n".
        "Responsable:".$this->getObjResponsable();
        }

}