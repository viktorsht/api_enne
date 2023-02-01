<?php

namespace App;

class Connection{

	public static function getDb()
	{

		$host = "localhost";
		$dbaname = "temcorte";
		$username = "root";
		$password = "";

		try {

			$conn = new \PDO(
				"mysql:host=$host;dbname=$dbaname;charset=utf8",
				"$username",
				"$password"
			);
			
			// echo "conexão com sucesso!";
			return $conn;
		} catch (\PDOException $e) {
			//.. tratar de alguma forma ..//
			echo "[!] Error to the connection with DB";
		}
	}
}