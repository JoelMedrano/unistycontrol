<?php


if(isset($_COOKIE["usuario"])){
	//setcookie("usuario","",time()-1);
  	//setcookie("password","",time()-1);
	$_SESSION["iniciarSesion"]="false";
}
session_destroy();

echo '<script>

window.location = "ingreso";

</script>';

if($_SESSION["empresa"] == "1"){
	echo '<script>

	window.location = "ingreso";

</script>';

}else{
	echo '<script>

	window.location = "ingreso";

</script>';
}

/* session_destroy();


$_SESSION["iniciarSesion"] = "false";

echo '<script>

	window.location = "ingreso";

</script>';

var_dump($_SESSION["iniciarSesion"]); */