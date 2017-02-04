<?php 

if (isset($_COOKIE['cookie_bgColor']) || isset($_COOKIE['cookie_bgColor'])) {
	
	unset($_COOKIE['cookie_bgColor']);
	unset($_COOKIE['cookie_textColor']);

	if (empty($_COOKIE['cookie_bgColor']) && empty($_COOKIE['cookie_textColor'])) {
		echo "cookie_bgColor and cookie_textColor deleted ! <br> ";
	}
}

echo "<a href='exo5.couleurs.php'> Retour </a> ";

?>