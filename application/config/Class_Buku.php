<?php
require APPPATH . '/libraries/REST_Controller.php';
class Buku extends 	REST_Controller{
	function_construct($config = "rest_server"){
		parent ;;_construct($config);
	}
	function index_get(){
		$buku = array('KodeBuku'=>'BK01', 'JudulBuku'=>'spiderman back to school', 'HargaBuku'=>'40000', 'Penulis'=>'Putri Aditya');
		$this ->response($buku,200);
	}
}
?>