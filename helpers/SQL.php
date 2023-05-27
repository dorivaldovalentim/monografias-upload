<?php

	/**
	 * A classe model
	 */
    include "DataBase.php";

	class SQL
	{
		protected $pdo;
		protected $results;
		
		public function __construct()
		{
			$this->pdo = new DataBase(array(
				'host' => 'localhost',
				'dbname' => 'monografia',
				'user' => '',
				'password' => ''
			));

			$this->pdo = $this->pdo->getConection();
		}
		
		/*
		 * APLICANDO OS MÉTODOS DA INTERFACE
		 */
		
		/**
		 * Este método realiza uma busca por toda a tabela a
		 * fim de retornar todos os dados desta
		 *
		 * @return array
		 *
		 * @access public
		 */
		public function selectAll() {
			try {
				return $this->pdo->query("SELECT * FROM $this->table")->fetchAll();
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}
			
		/**
		 * Este método recebe um id, realiza uma busca
		 * em uma tabela e retorna um array com os dados
		 * correspondente a linha do id
		 * 
		 * @param $id
		 * 
		 * @return array
		 *
		 * @access public
		 */
		public function selectById($id) {
			try{
				$results = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
				$results->bindParam(':id', $id);
				$results->execute();
				return $results->fetch();
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}
		
		/**
		 * Este método recebe uma query qualquer, e
		 * retorna (com base na query) todas as linhas
		 * da tabela que correspondem a query
		 *
		 * @param $query
		 *
		 * @return array
		 *
		 * @access public
		 */		
		public function selectByQuery($query) {
			try{
				return $this->pdo->query($query)->fetchAll();
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}

		/**
		 * Este método recebe dois parametros, o primeiro é o
		 * nome do campo e o segundo é o valor. Com esses dados
		 * ele retorna todas a linhas em que o campo tem um certo
		 * valor
		 * 
		 * @param $field
		 * @param $value
		 * 
		 * @return array
		 * 
		 * @access public
		 */
		public function selectByField($field, $value) {
			try {
				$data = $this->pdo->prepare("SELECT * FROM $this->table WHERE {$field} = :value");
				$data->bindParam(':value', $value);
				$data->execute();

				return $data->fetchAll();
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}

		/**
		 * Este método recebe dois parametros, o primeiro é o
		 * nome do campo e o segundo é o valor. Com esses dados
		 * ele retorna somente a linha em que o campo tem um certo
		 * valor
		 * 
		 * @param $field
		 * @param $value
		 * 
		 * @return array
		 * 
		 * @access public
		 */
		public function selectOneByField($field, $value) {
			try {
				$data = $this->pdo->prepare("SELECT * FROM $this->table WHERE {$field} = :value");
				$data->bindParam(':value', $value);
				$data->execute();

				return $data->fetch();
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}

		/**
		 * Este método recebe um id e deleta uma linha
		 * da tabela em que o id é igual ao que se passa
		 * como argumento
		 *
		 * @param $id
		 *
		 * @return any
		 *
		 * @access public
		 */
		public function deleteById($id) {
			try {
				return $this->pdo->query("DELETE FROM $this->table WHERE id = $id");
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}

		/**
		 * Este método recebe dois parâmetros, com eles
		 * verifica se certo valor já existe na tabela
		 * 
		 * @param $key
		 * @param $value
		 * 
		 * @return boolean
		 * 
		 * @access public
		 */
		public function verifyExistency($key, $value) {
			try {
				$data = $this->pdo->prepare("SELECT * FROM $this->table WHERE {$key} = :value");
				$data->bindParam(':value', $value);
				$data->execute();

				if($data->rowCount() > 0) return true;
				else return false;
			} catch(PDOException $e) {
				var_dump($e->getMessage());
			}
		}

		/**
		 * Retorna o último Id inserido numa tabela
		 * 
		 * @return int
		 * 
		 * @access public
		 */

		public function returnLastId() {
			try {
				return $this->pdo->lastInsertId();
			} catch(PDOEsception $e) {
				var_dump($e->getMessage());
			}
		}
		
		/**
		 * Este método recebe uma string e a
		 * retorna de forma encriptada usando password_hash
		 *
		 * @param $string
		 *
		 * @return string
		 *
		 * @access public
		 */
		public function encrypt_string($string) {
			return password_hash($string, PASSWORD_BCRYPT);
		}

		/**
		 * Estes dois últimos métodos não recebem nenhum
		 * parâmetro, mas um retorna os resultados de uma
		 * dada requisição enquanto que o outro faz print
		 * dos resultados, os dois são usados em áreas di-
		 * ferentes da aplicação
		 */
		public function printResults() {
			print json_encode($this->results);
		}

		public function returnResults() {
			return $this->results;
		}

		public function returnTable()
		{
			return $this->table;
		}

	}

?>