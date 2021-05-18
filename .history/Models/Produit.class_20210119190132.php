<?php
	/**
	 * Personne
	 * constructeur , Mutateur , Accesseur
	 */
	class Produit
	{
		private $nom;
		private $prix;
		private $conn;

		public function __construct(){
			$this->conn= new PDO("mysql:host=localhost;dbname=db_test","root","");
		}

		public function setNom($nom){
			$this->nom = htmlspecialchars(trim($nom));
		}
		public function setPrix($prix){
			$this->prix = htmlspecialchars(trim($prix));
		}

		public function getNom(){
			return $this->nom;
		}
		public function getPrix(){
			return $this->prix;
		}
		public function insertProd(){
			$sql="INSERT INTO produits (nom,prix) VALUES (?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([$this->getNom(),$this->getPrix()]);
		}
		public function selectProd(){
			$sql="SELECT * FROM produits ORDER BY id DESC" ;
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$table=[];
			$i=0;
			while($x = $stmt->fetch(PDO::FETCH_ASSOC)){
				$table[$i]=$x;
				$i++;
			}
			return $table;
		}
		public function deleteProd(){
			$sql="DELETE FROM produits  WHERE nom=?";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([$this->getNom()]);
		}
		public function updateProd(){
			$sql="UPDATE produits SET nom='ordi' WHERE nom=?";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([$this->getNom()]);
		}
		
	}
	
