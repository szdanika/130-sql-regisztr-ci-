<?php
session_start();
@$megadottnev = $_POST['nev'];
@$megadottjelszo = $_POST['jelszo'];
@$adb = mysqli_connect( "localhost", "root", NULL, "felh" );
if($megadottnev == NULL || $megadottnev == ' ' || $megadottjelszo == NULL || $megadottjelszo==' ')
{
	?>
	<script>
		alert("csókolom adjon meg egy nevet és egy jelszót!");
	</script>
	<?php
}
else
{
	@$tabla = mysqli_num_rows(mysqli_query( $adb , " SELECT count(unev) AS megszamolt FROM user WHERE unev = $megadottnev"));
	if($tabla == 0)
	{
		$_SESSION['nev'] = $megadottnev;
		$_SESSION['jelszo'] = $megadottjelszo;
		$feltoltes = mysqli_query($adb, " INSERT INTO user  (unev, ujelszo) 
										VALUES('$megadottnev', '$megadottjelszo')");
		?>
		<script>parent.location.href = parent.location.href</script> 
		<?php
		echo " Sikeres regisztráció<br>";
	}
	else
	{
		?>
		<script>
		alert("csókolom ez a név már foglalt");
		</script> 
	<?php
	}
	echo $megadottnev;
	
}	





mysqli_close($adb);
?>