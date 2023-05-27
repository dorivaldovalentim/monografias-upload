<?php

	/**
	 * DataBase
	 */

	namespace Lib;

	class DataBase {
		private $pdo;
		
		public function __construct($dataConection)
		{
			$this->host = $dataConection['host'];
			$this->dbname = $dataConection['dbname'];
			$this->user = $dataConection['user'];
			$this->password = $dataConection['password'];
		}

		public function getConection()
		{
			try {
				$this->pdo = new \PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbname . '; charset=utf8', $this->user, $this->password);

				return $this->pdo;
			} catch (Exception $e) {
				echo "Erro ao conectar a base de dados";
			}
		}
	}

?>