<?php
/**
* 
*/
class Home extends Controller
{
	public function index($nama='ipul' ,$pekerjaan='dosen',$umur=12)
	{
		$data['mhs']=$this->model('Mahasiswa_Model')->getAllMahasiswa();
		$data['judul']='Home';
		$this->view('templates/header',$data);
		$this->view('home/index' ,$data);
		$this->view('templates/footer');
	}
	public function detail($id)
	{
		$data['judul']='Daftar Mahasiswa ';
		$data['mhs']=$this->model('Mahasiswa_Model')->getMahasiswaById();
		$this->view('templates/header',$data);
		$this->view('home/detail' ,$data);
		$this->view('templates/footer');
	}
	public function tambah()
	{
		//var_dump($_POST);
		if($this->model('Mahasiswa_Model')->tambahDataMahasiswa($_POST) >0){
			Flasher::setFlash('berhasil','ditambah','success');
			header('location:' . BASEURL . '/home');
			exit;
		} else {
			if($this->model('Mahasiswa_Model')->tambahDataMahasiswa($_POST) >0){
				Flasher::setFlash('gagal','ditambah','danger');
				header('location:' . BASEURL . '/home');
				exit;
		}
	}
}
public function hapus($id)
	{
		//var_dump($_POST);
		if($this->model('Mahasiswa_Model')->hapusDataMahasiswa($id) >0){
			Flasher::setFlash('berhasil','dihapus','success');
			header('location:' . BASEURL . '/home');
			exit;
		} else {
			if($this->model('Mahasiswa_Model')->hapusDataMahasiswa($id) >0){
				Flasher::setFlash('gagal','dihapus','danger');
				header('location:' . BASEURL . '/home');
				exit;
		}
	}
}
public function getubah()
{
	echo json_encode($this->model('Mahasiswa_Model')->getMahasiswaById($_POST['id']));
}
public function ubah()
	{
			//var_dump($_POST);
			if($this->model('Mahasiswa_Model')->ubahDataMahasiswa($_POST) >0){
				Flasher::setFlash('berhasil','diubah','success');
				header('location:' . BASEURL . '/home');
				exit;
			} else {
				if($this->model('Mahasiswa_Model')->ubahDataMahasiswa($_POST) >0){
					Flasher::setFlash('gagal','ubah','danger');
					header('location:' . BASEURL . '/home');
					exit;
			}
	}
public function cari()
{
	$data['mhs']=$this->model('Mahasiswa_Model')->cariDataMahasiswa();
	$data['judul']='Home';
	$this->view('templates/header',$data);
	$this->view('home/index' ,$data);
	$this->view('templates/footer');
}
	}