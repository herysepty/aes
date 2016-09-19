<?php
/*
Author Hery Septyadi
Date 06/04/2015 
*/
class mySql {
    private $DBhost;
    private $DBusername; 				
    private $DBpassword; 				
    private $DBname;
    private $link_id;
    private $sql;
    private $result;
    private $num_rows;
    private $row;
	public	$newExtEnc;

    function mySql(){
        $this->DBhost = "localhost";
        $this->DBusername = "root";
        $this->DBpassword = "";
        $this->DBname = "dbpercetakan";
		$this->NOL="0";
    }
    // mendapatkan pengguna database
    public function getDBuid(){
        return $this->DBusername;
    }
    public function getDBhost(){
        return $this->DBhost;
    }
    public function getDBpass(){
        return $this->DBpassword;
    }
    public function getDBname(){
        return $this->DBname;
    }
    public function openKoneksi(){
        $this->link_id=mysql_connect($this->DBhost,$this->DBusername,$this->DBpassword);
        return mysql_select_db($this->DBname,$this->link_id)or die("UNABLE TO SELECT DATABASE");
    }
    function execute($query){
        $this->sql=$query;
        $this->result=mysql_query($this->sql);
    }
    function deleteRows($isTable,$isCriteria){
        return $this->execute("DELETE FROM $isTable WHERE $isCriteria");
    }
    function insertRows($isTable,$isValues){
        $tmp="INSERT INTO $isTable VALUES(".$isValues.")";
       return $this->execute($tmp);
    }
    function getArray(){
        $this->row=mysql_fetch_array($this->result,MYSQL_NUM);
        return $this->row;
    }
	function record_count(){
        $this->num_rows=mysql_num_rows($this->result);
        return $this->num_rows;
    }
	//auto number
	function autonumber($tabel, $kolom, $lebar, $awalan){
		$query="select $kolom from $tabel order by $kolom desc limit 1";
		$hasil=mysql_query($query);
		$jumlahrecord = mysql_num_rows($hasil);
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			$row=mysql_fetch_array($hasil);
			$nomor=intval(substr($row[0],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		return $angka;
	}
	
	//Halaman Log
	function getTableData($tableName, $page = 1, $limit = 20)
	{
		$dataTable = array();
		$startRow = ($page - 1) * $limit;
		$this->execute("SELECT * FROM tb_log ORDER BY date DESC LIMIT $startRow, $limit");
		while ($data = $this->getArray()){
			array_push($dataTable, $data);
		}
		return $dataTable;
	}
	function showPagination($tableName, $limit = 20)
	{
		$countTotalRow = mysql_query('SELECT COUNT(*) AS total FROM '.$tableName.'');
		$queryResult = mysql_fetch_assoc($countTotalRow);
		$totalRow = $queryResult['total'];

		$totalPage = ceil($totalRow / $limit);
		$page_select=isset($_GET['next-page']) ? $_GET['next-page'] : null;
		$page = 1;
		while ($page <= $totalPage) 
		{
			if($page_select==$page){
			echo '<a href="index.php?page=log&next-page='.$page.'"><font color="red">'.$page.'</font></a>';
			}else{
			echo '<a href="index.php?page=log&next-page='.$page.'">'.$page.'</a>';
			}
			if ($page < $totalPage)
				echo "  |  ";

			$page++;
		}
	}
}
?>