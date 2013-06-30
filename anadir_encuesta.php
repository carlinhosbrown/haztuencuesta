
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"> 
<head> 
<title>Encuestas</title> 
<meta name="distribution" content="global" /> 
<meta name="robots" content="all" /> 
<style type="text/css"> 
body { 
    font-family: 'Trebuchet MS', Verdana, Arial, Helvetica, sans-serif; /* Tahoma,Verdana, sans-serif*/ 
    Font-size: 12pt; 
    background: #fff; 
    padding: 0; 
    margin: 20px; 
} 
a.link { 
    color: #0066cc; 
    text-decoration: none; 
} 
a.link:hover { 
    text-decoration: underline; 
} 
.file { 
    display: block; 
} 
label { 
    display: block; 
    font-weight: bold; 
} 
span a { 
    margin-left: 1em; 
} 
</style> 
<script type="text/javascript" src="veropciones.js"> </script> 
</head> 
<body> 
<?php 
        include('conectar_bd.php'); // Este archivo contendrá nuestros datos de conexión a MySQL 
        if(isset($_POST['enviar'])) { 
        if($_POST['pregunta'] == '') { 
            echo "No has ingresado la pregunta de la encuesta. <a class='link' href='javascript:history.back()'>Regresar</a>"; 
        }else { 
            $cont = 0; 
            $cant = count($_POST['respuesta']);
            if(cant==0){
               echo "No has ingresado ninguna respuesta. <a class='link' href='javascript:history.back()'>Regresar</a>"; 
            }else {
            $pregunta = strip_tags($_POST['pregunta']); 
            mysql_query("INSERT INTO encuestas (pregunta) VALUES('".$pregunta."')"); 
            $id_encuesta = mysql_insert_id(); 
            while($cont < $cant) { 
                $respuesta = $_POST['respuesta']["$cont"];  
                $sql = mysql_query("INSERT INTO respuestas_encuesta (respuesta, id_encuesta) VALUES ('".$respuesta."', '".$id_encuesta."')"); 
                $cont++; 
            } 
?>
            <div> 
                <strong>Encuesta creada correctamente</strong> 
            </div> 
<?php   
       mysql_query("DELETE FROM encuestas_ip");
       } } }else
             {
?>
            <div style="font-size: 17px; color: #0066cc;">Crear encuesta</div> 
            <form name="frm" id="frm" action="anadir_encuesta.php" method="post"> 
                <label>Título de la encuesta:</label> 
                <input type="text" name="pregunta" id="pregunta" size="30" /><br /> 
                <label>respuestas:</label> 
                <a class="link" href="#" onclick="addField()" accesskey="5">Añadir respuesta</a> 
                <div id="files"></div> 
                <input type="submit" value="Guardar datos" id="enviar" name="enviar" /> 
            </form> 
<?php 
        }  
?>
</body> 
</html>
