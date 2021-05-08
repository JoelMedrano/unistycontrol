<?php


if(isset($_COOKIE["usuario"])){
	setcookie("usuario","",time()-1);
  	setcookie("password","",time()-1);
	$_SESSION["iniciarSesion"]="false";
}
session_destroy();
if($_SESSION["empresa"] == "1"){
	echo '<script>

	window.location = "ingreso";

</script>';

}else{
	echo '<script>

	window.location = "ingreso";

</script>';
}
