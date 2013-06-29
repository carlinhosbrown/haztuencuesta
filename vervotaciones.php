<?php
include("mostrarencuestas.php");
if(isset($_POST['enviar'])){
  if( $_POST['encuesta'] == ''){
      echo "no se ha seleccionado ninguna encuesta. <a class='link' href='vervotaciones.php'>Regresar</a>";
  }else {
   $id= $_POST['encuesta'];
   $enc = mysql_query("SELECT * FROM encuestas WHERE id_encuesta='$id'") or die(mysql_error()); 
        while($datos = mysql_fetch_array($enc)) { 
            $id_encuesta = $datos['id_encuesta']; 
            $pregunta = $datos['pregunta']; 
?> 
            <div style="text-align: center;"><strong><?=$pregunta?></strong></div> 
<?php 
            $rs = mysql_query("SELECT sum(num_votos) FROM respuestas_encuesta WHERE id_encuesta='".$id_encuesta."'"); 
            $tot = mysql_result($rs,0); 
            $opt = mysql_query("SELECT * FROM respuestas_encuesta WHERE id_encuesta='".$id_encuesta."'") or die(mysql_error()); 
            while($dat2 = mysql_fetch_array($opt)) { 
                $id_respuesta = $dat2['id_respuesta']; 
                $respuesta = $dat2['respuesta']; 
                $num_votos = $dat2['num_votos']; 
                $ptos = $num_votos * 100; 
                $porcentaje = @round($ptos/$tot,0); 
?> 
                        <strong><?=$respuesta?></strong> - <?=$num_votos?> votos - <?=$porcentaje?>% 
                        <div style="width: <?=$porcentaje?>%; height: 10px; background: #009900;"></div> 
<?php 
            } 
?> 
                    <div style="text-align: center; font-size: 11px;">Votos totales: <strong><?=$tot?></strong></div> 

<?php
     }}} else {
          
?>

<div style="font-size: 17px; color: #0066cc;">ver votaciones</div> 
            <form name="frm" id="frm" action="vervotaciones.php" method="post"> 
                <label>encuesta que deseas ver las votaciones:</label> 
                <input type="text" name="encuesta" id="encuesta" /><br /> 
                <input type="submit" value="ver" id="enviar" name="enviar" /> 
            </form> 

<?php
}
?>
