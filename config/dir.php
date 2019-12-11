<?php 
	/*
	 * define('PROYECTO', 'integrador-ago-dic-2019') para desarrollo local, 
	 * define('PROYECTO', 'proyecto') para servidor.
	 */
	//define('PROYECTO', 'integrador-ago-dic-2019');

	function getUrl(){
	    require 'db.php';
	    $sql = 'SELECT url
	            FROM email_conf
	            WHERE id = 2';

	    $res = $conexion->query($sql);

	    if($res) { 
	        $assoc = $res->fetch_assoc();
	        return $assoc['url'];
	    }
	}
	define('PROYECTO', getUrl());
?>