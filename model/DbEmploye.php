<?php
require_once "MysqlDb.php";

class DbEmploye{

	public static function getAllEtudiant(){
		$sql = "select * from etudiant";
		$connect = MysqlDb::getPdoDb();//objet classe PDO
		$objResult = $connect->query($sql); //objet classe PDOStatement
		$tabResult = $objResult->fetchAll(); // tableau
		return $tabResult;
	}
	
	public static function getUnEtudiant($x){
		$sql = "select * from etudiant where id = $x";
		$connect = MysqlDb::getPdoDb();//objet classe PDO
		$objResult = $connect->query($sql); //objet classe PDOStatement
		$tabResult = $objResult->fetch(); // tableau
		return $tabResult;
		
		
	}
	
	public static function addEtudiant(){
		
	}
	public static function updateEtudiant(){
		
	}
	public static function deleteEtudiant($id){
		$sql = "delete from etudiant where id = $id";
		$connect = MysqlDb::getPdoDb();//objet classe PDO
		$objResult = $connect->exec($sql); //objet classe PDOStatement

	}
		
}

?>