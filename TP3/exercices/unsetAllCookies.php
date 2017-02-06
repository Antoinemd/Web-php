<?php 

session_start();

// supppression de tous les cookies du site
 

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

// Détruit toutes les variables de session
$_SESSION = array();

if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
}
 
// Destruction de la session
session_destroy();

echo "All cookies and session(s) have been destroyed ! <br> ";
echo "<a href='exo5.couleurs.php'> Retour </a> ";

?>