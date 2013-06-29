<?php
    include ("mostrarencuestas.php");
    if(isset($_POST['enviar'])) { 
        if($_POST['borrar'] == '') { 
            echo "No ha ingresado encuesta a borrar. <a class='link' href='borrarencuesta.php'>Regresar</a>"; 
        }else {  
            $borrar = $_POST['borrar'];
            mysql_query("DELETE FROM respuestas_encuesta WHERE id_encuesta='$borrar'");
            mysql_query("DELETE FROM encuestas WHERE id_encuesta='$borrar'");
            echo "encuesta borrada. <a class='link' href='mostrarencuestas.php'>ver encuestas</a>";     
       } }else{
?>
          <div style="font-size: 17px; color: #0066cc;">borrar encuesta</div> 
            <form name="frm" id="frm" action="borrarencuesta.php" method="post"> 
                <label>encuesta que deseas borrar:</label> 
                <input type="text" name="borrar" id="borrar" /><br /> 
                <input type="submit" value="borrar" id="enviar" name="enviar" /> 
            </form> 
<?php
  }
?>
