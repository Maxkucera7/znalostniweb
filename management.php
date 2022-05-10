<?php
require('db.php');
Class Manager{
	private $db;
	public function __construct(){
		$this->db=new Database();
		$this->db->Execute("SET NAMES UTF8");
	}
	public function Login($email,$heslo){ //prihlaseni
		session_start();
		$sql = "SELECT id_u,username,jmeno,prijmeni,poznamka FROM users WHERE email='".$email."' AND password='".hash("sha256",$heslo)."'";
		$result = $this->db->Select($sql);
		if($result->num_rows==1){
			$fet=$result->fetch_assoc();
			//ukladani dat do sessiony
			$_SESSION['id_u']=$fet['id_u'];
			$_SESSION['username']=$fet['username'];
			$_SESSION['jmeno']=$fet['jmeno'];
			$_SESSION['prijmeni']=$fet['prijmeni'];
			$_SESSION['poznamka']=$fet['poznamka'];
			header("Location: index.php");
		}else{
			header("Location: login.php");
		}
	}
	public function Select($sql){
		return $this->db->Select($sql);
	}
	public function Execute($sql){
		return $this->db->Execute($sql);
	}
	public function Register($email,$heslo,$hesloA,$username,$jmeno,$prijmeni,$poznamka){//registrace
		if($heslo==$hesloA){//kontrola hesel
			$sqle="SELECT email,jmeno FROM users WHERE email='".$email."' OR username='".$username."'";
			$ress = $this->db->Select($sqle);
			if($ress->num_rows==0){
				$sql="INSERT INTO users (email,password,username,jmeno,prijmeni,poznamka) VALUES ('".$email."','".hash("SHA256",$heslo)."','".$username."','".$jmeno."','".$prijmeni."','".$poznamka."');";
				$result = $this->db->Execute($sql);
				if($result){
					$this->Login($email,$heslo);
				}else{
					header("Location: register.php");
				}
			}
		}
	}

	public function Testy(){ //vypis testu
		$sql = "SELECT nazev,id_t,popis FROM testy";
		$result = $this->db->Select($sql);
		$stri='';
		while($bre=$result->fetch_assoc()){
			$stri.="<a href='test.php?id_t=".$bre['id_t']."'><div class='testik'><div class='nazevT'><span>".$bre['nazev']."</span></div><div class='nazevT'>Popis:".$bre['popis']."</div></div></a>";
		}
		echo $stri;
	}
	public function NactiTest($id_t){ //nacteni otazek a odpovedi k testu
		$stringos='';
		$sql_testy="SELECT o.text,o.id_o FROM otazka AS o WHERE test=".$id_t;
		$result = $this->db->Select($sql_testy);
		$kolik = 0;
		while($otazka=$result->fetch_assoc()){
			$stringos.="<div class='otazecka'>";
			$stringos.="<H1>".$otazka['text']."</H1><div class='radiosky'><form id='o".$kolik."'>";
			$sql_odpovedi = "SELECT od.id_od,od.text,od.spravne FROM odpovedi AS od WHERE od.otazka=".$otazka['id_o'];
			$resultt=$this->db->Select($sql_odpovedi);
			while($odpoved=$resultt->fetch_assoc()){
				$stringos.="<input type='radio'value='".$odpoved['spravne']."' id='".$odpoved['text']."'  name='tlac' class='radiobut '><span class='radiobutt'>".$odpoved['text']."</span>";
			}
			$stringos.="</form>
			</div>
			</div>";
			$kolik++;
		}
		echo $stringos;
	}
	public function Vysledky(){ //vypis vysledku na profilu
		$strik='';
		$sql_cas="SELECT cas FROM vysledky WHERE id_u=".$_SESSION['id_u']." ORDER BY cas DESC LIMIT 1";
		$result_c=$this->db->Select($sql_cas);
		if($result_c){
		$r=$result_c->fetch_assoc();
		$cas=$r['cas'];
		$strik.='<div class="vyss">Posledni cas:'.$cas."</div>";
		$sql = "SELECT cas, procenta FROM vysledky WHERE id_u=".$_SESSION['id_u'];
		$result=$this->db->Select($sql);
		if($result->num_rows>0){
			while($bre=$result->fetch_assoc()){
				if($bre['procenta']>79){
					$strik.="<div class='vyss zelena'>".$bre['procenta']."%</div>";
				}else{
					$strik.="<div class='vyss cervena'>".$bre['procenta']."%</div>";
				}
			}
		}
		echo $strik;
		}
	}
	public function Zebrik(){
		
	}

}



?>