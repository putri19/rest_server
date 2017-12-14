<?php
require APPPATH . '/libraries/REST_Controller.php';
class Class_Buku extends Rest_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
	}
	function index_get(){
		//$buku = array('KodeBuku'=>'BK01', 'JudulBuku'=>'spiderman back to school', 'HargaBuku'=>'40000', 'Penulis'=>'Putri Aditya');
		$buku = $this->db->get('buku')->result();
		$this ->response($buku,200);
	}
	function index_post(){
		$data =array(
			'KodeBuku' => $this->post('KodeBuku'),
			'JudulBuku' =>$this->post('JudulBuku'),
			'HargaBuku' =>$this->post('HargaBuku'),
			'Penulis' =>$this->post('Penulis'));
		$insert =$this->db->insert('buku',$data);
		if($insert){
			$this->response($data,200);
		}else{
			$data =array('status'=>'Gagal Insert');
			$this ->response($buku,200);
		}

	}
	function index_put(){
		$KodeBuku = $this ->put ('KodeBuku');
		$data = array('KodeBuku' => $this->put('KodeBuku'), 'JudulBuku' => $this ->put('JudulBuku'), 'HargaBuku'=> $this ->put('HargaBuku'), 'Penulis' => $this ->put('HargaBuku'));
		$this->db->where('KodeBuku', $KodeBuku);
		$update = $this->db->update('buku', $data);
		if ($update){
			$this->response($data, 200);
		} else {
			$this->response(array('status' => 'Gagal Update', 200));
		}
	}
	function index_delete(){
		$KodeBuku = $this->delete('KodeBuku');
		$this->db->where('KodeBuku', $KodeBuku);
		$delete = $this->db->delete('buku');
		if (delete){
			$this->response(array('status' => 'Berhasil di Hapus'), 200);
		} else {
			$this->response(array('status' => 'Gagal di Hapus'), 200);
		}
	}

}
?>