<?php
	include_once 'sql.php';

	function asset($path) {
		$file = 'assets/' . $path;

		if (file_exists($file)) {
			return $file;
		} else {
			return 'Não encontrado: ' . $file;
		}
	}

	function auth()
	{
		return isset($_SESSION['user']) ? $_SESSION['user'] : 0;
	}