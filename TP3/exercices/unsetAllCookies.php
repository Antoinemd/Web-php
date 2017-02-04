<?php 

// if (isset($_COOKIE['cookie_bgColor']) || isset($_COOKIE['cookie_bgColor'])) {
	
// 	unset($_COOKIE['cookie_bgColor']);
// 	unset($_COOKIE['cookie_textColor']);

// 	if (empty($_COOKIE['cookie_bgColor']) && empty($_COOKIE['cookie_textColor'])) {
// 	}
// }


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

echo "All cookies has been deleted ! <br> ";
echo "<a href='exo5.couleurs.php'> Retour </a> ";

?>