<?php
    
    session_start();
    
    include('Conexion.php');
    
    if(isset($_POST['Usuario']) && isset ($_POST['Clave']) && isset($_POST['Nombre_Completo'])){
       
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }


        $usuario = validate($_POST['Usuario']);
        $nombre_completo = validate($_POST['Nombre_Completo']);
        $clave = validate($_POST['Clave']);


        $datosUsuario = 'Usuario=' . urlencode($usuario) . '&Nombre_Completo=' . urlencode($nombre_completo);

        if(empty($usuario)){
            header("location: Registrarse.php?error=El usuario es requerido&$datosUsuario");
            exit();
        }elseif(empty($nombre_completo)){
            header("location: Registrarse.php?error=El nombre completo es requerido&$datosUsuario");
            exit();
        }elseif(empty($clave)){
            header("location: Registrarse.php?error=La clave es requerida&$datosUsuario");
            exit();
        }else{
            
            //$clave = md5($clave);

            $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $usuario); // "s" indica que $usuario es una cadena (string)
            $stmt->execute();
            $result = $stmt->get_result();
            

            if($result->num_rows > 0){
                header("location: Registrarse.php?error=El usuario ya existe");
                exit();
            }else{
                $sql2 = "INSERT INTO usuarios(usuario, clave, nombre_completo) VALUES (?, ?, ?)";
                $stmt2 = $conexion->prepare($sql2);
                $stmt2->bind_param("sss", $usuario, $clave, $nombre_completo);
                $stmt2->execute();
                
                if ($stmt2->affected_rows > 0) {
                    echo "Usuario registrado con éxito.";
                } else {
                    echo "Error al registrar el usuario.";
                }
                $stmt2->close();
                

            }

        }
    }else{
        header("location: Registrarse.php");
        exit();
    }



?>
