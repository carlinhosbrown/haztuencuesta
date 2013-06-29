<?php 
    include('conectar_bd.php'); // Este archivo contendrá nuestros datos de conexión a MySQL 
    if(isset($_POST['votar'])) { 
        if($_POST['respuesta'] == '') { 
            echo "No se ha seleccionado ninguna opción. <a href='javascript:history.back()'>Regresar</a>"; 
        }else { 
            $respuesta = $_POST['respuesta']; 
            $sql = mysql_query("SELECT * FROM respuestas_encuesta WHERE id_respuesta='".$respuesta."'"); 
            $row = mysql_fetch_array($sql); 
            $suma = $row['num_votos']+1; 
            $ip_votar = $_SERVER['REMOTE_ADDR']; 
            mysql_query("UPDATE respuestas_encuesta SET num_votos='".$suma."' WHERE id_respuesta='".$respuesta."'"); 
            mysql_query("INSERT INTO encuestas_ip (ip_voto) VALUES('".$ip_votar."')"); 
            $redir = $_SERVER['HTTP_REFERER']; 
            header("Location: $redir"); 
        } 
    }else { 
        echo "Operación incorrecta. <a href='javascript:history.back()'>Regresar</a>"; 
    } 
?>
