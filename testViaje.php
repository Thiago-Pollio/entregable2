<?php

include_once ('viaje.php');
include_once ('pasajero.php');
include_once ('responsableV.php');

$objViaje = new Viaje (0,0,0, array(), "");

$salir = false;

while ($salir == false) {
    $menu= "Menú de opciones: \n" .
        "1) Ingresar datos  del viaje  \n".
        "2) Modificar datos  del viaje  \n" .
        "3) Ingresar datos  del responsable \n".
        "4) Modificar datos  del responsable \n".
        "5) Ingresar datos  de pasajeros \n".
        "6) Modificar datos  de pasajeros \n" . 
        "7) Mostrar datos  del viaje y de los pasajeros \n" .  
        "8) Salir \n"; 
        echo $menu;
        echo "Ingrese una opcion: ";
        $opcion = trim(fgets(STDIN));
        

        switch ($opcion) {
            /*Dependiendo de la opción del menú que escoga el usuario, el programa ejecutará diferentes
            tareas. Se utiliza switch, que corresponde a la estructura de control alternativa (if)*/
            case 1: 
                
                echo "Ingrese el código del viaje: ";
                $codigo = trim(fgets(STDIN));
                echo "Ingrese el destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la cantidad máxima de pasajeros: ";
                $cantMax = trim(fgets(STDIN));

                $objViaje -> setCodigo ($codigo);
                $objViaje -> setDestino ($destino);
                $objViaje -> setCantMax ($cantMax);
                
                break;
                
            case 2:
                echo "Ingrese el nuevo código del viaje: ";
                $codigo = trim(fgets(STDIN));
                echo "Ingrese el nuevo destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la nueva cantidad máxima de pasajeros: ";
                $cantMax = trim(fgets(STDIN));

                $objViaje -> setCodigo ($codigo);
                $objViaje -> setDestino ($destino);
                $objViaje -> setCantMax ($cantMax);
    
                break;
            case 3: 

                    echo "Número de empleado: ";
                    $numE = trim(fgets(STDIN));
                    echo "Número de licencia: ";
                    $numL = trim(fgets(STDIN));
                    echo "Nombre: ";
                    $nomb = trim(fgets(STDIN));
                    echo "Apellido: ";
                    $apell = trim(fgets(STDIN));
                    $objViaje-> losDatosDelResponsable($numE, $numL, $nomb, $apell);
                    echo "Se agregó correctamente. \n";
            
                break;
            case 4:
    
                echo "Ingrese el numero de empleado: ";
                $nDE = trim(fgets(STDIN));
                echo "Ingrese el numero de empleado del responsable: ";
                $numE = trim(fgets(STDIN));
                echo "Ingrese el numero de licencia del responsable: ";
                $numL = trim(fgets(STDIN));
                echo "Ingrese el nombre del responsable: ";
                $nomb = trim(fgets(STDIN));
                echo "Ingrese el apellido del responsable: ";
                $apell = trim(fgets(STDIN));

    
                $funcionModificar = $objViaje -> modificarElResponsable($nDE);
    
            
                if ($funcionModificar == true) {
                    echo "Los datos fueron modificados.";
                    $objViaje -> losDatosDelResponsable ($numE, $numL, $nomb, $apell);
                } else {
                    echo "No existe el responsable: " . $nDE;
                }
                    
                break;
            case 5: 

                $contador = 0;

                for ($contador=0; $contador < $cantMax ; $contador++) { 
                    echo "Ingrese el nombre del pasajero: ";
                    $unNombre = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero: ";
                    $unApellido = trim(fgets(STDIN));
                    echo "Ingrese el numero de documento del pasajero: ";
                    $unDocumento = trim(fgets(STDIN));
                    echo "Ingrese el numero de telefono del pasajero: ";
                    $unTelefono = trim(fgets(STDIN));

                    $objPasajero = new Pasajero($unNombre, $unApellido, $unDocumento, $unTelefono);    
                    $verificarPasajero = $objViaje-> losDatos($objPasajero);                
                }
            
                if($verificarPasajero == true){
                  echo "Se agregó correctamente. \n";
                } else {
                  echo "El pasajero con DNI ". $unDocumento. " ya existe.\n";
                }
                
                break;
            case 6:

                echo "Ingrese el numero de documento: ";
                $nDni = trim(fgets(STDIN));
                echo "Ingrese el nombre del pasajero: ";
                $unNombre = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: ";
                $unApellido = trim(fgets(STDIN));
                echo "Ingrese el numero de documento del pasajero: ";
                $unDocumento = trim(fgets(STDIN));
                echo "Ingrese el numero de telefono del pasajero: ";
                $unTelefono = trim(fgets(STDIN));

                $funcionModificar = $objViaje -> modificarElPasajero($nDni);

        
                if ($funcionModificar == true) {
                    $objPasajero->setNombre($unNombre);
                    $objPasajero->setApellido($unApellido);
                    $objPasajero->setDocumento ($unDocumento);
                    $objPasajero->setTelefono($unTelefono);
                    echo "Los datos fueron modificados.";
                } else {
                    echo "No existe el documento: " . $nDni;
                }
                
                break;
            case 7:
                echo "Codigo de viaje: ".$codigo. "\n";
                echo "Destino: ".$destino. "\n";
                echo "Cantidad máxima: ".$cantMax. "\n";
                echo "Responsable: "."\n";
                $respon = $objViaje->getObjResponsable();
                echo "". $respon. "\n";

                $arrayP = $prueba->getColeccionPasajeros();
                print_r($arrayP);

                break;
            case 8:
                $salir = true;
                
                break;
    }
    }







