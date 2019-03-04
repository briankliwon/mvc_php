<?php
class Mahasiswa_model{
   // private $mhs=[
    //    [
      //      "nama"=>"ipul",
        //    "nip"=>"12345",
          //  "email"=>"www@.com"
            //"jurusan"=>"kecerdasan"
        //]
        //[
          //  "nama"=>"joni",
            //"nip"=>"3456",
            //"email"=>"www@figi.com"
            //"jurusan"=>"itkop"
        //]
        //];
        private $table ='mahasiswa';
        private $db;
        public function __construct()
        {
            $this->db= new Database;
        }
       public function getAllMahasiswa(){
            $this->db->query('SELECT * FROM' . $this->table);
            return $this->db->resulSet();
        }
        public function getMahahaiswaByid()
        {
          $this->db->query('SELECT * FROM'. $this->table . 'WEHRE id=:id');
          $this->db->bind('id',$id);
          return $this->db->singleSet;
        }
        public function tambahDataMahasiswa($data){
          $query="INSERT INTO mahasiswa Values('', :nama, :nip, :jurusan)";
          $this->db->query($query);
          $this->db->bind('nama', $data['nama']);
          $this->db->bind('nip', $data['nip']);
          $this->db->bind('email', $data['email']);
          $this->db->bind('jurusan', $data['jurusan']);
          $this->db->execute();
          return $this->db->rowCount();
        }
        public function hapusDataMahasiswa($id){
          $query="DELETE FROM mahasiswa WHERE id =:id";
          $this->db->query($query);
          $this->db->bind('$id',$id);
          $this->db->execute();
          return $this->db->rowCount();
        }
        public function ubahDataMahasiswa($data){
          $query="UPDATE mahasiswa SET 
          nama = :nama,
          nip = :nip,
          email= :email,
          jurusan=:jurusan
          Where id =:id";
          $this->db->query($query);
          $this->db->bind('nama', $data['nama']);
          $this->db->bind('nip', $data['nip']);
          $this->db->bind('email', $data['email']);
          $this->db->bind('jurusan', $data['jurusan']);
          $this->db->bind('id', $data['id']);
          $this->db->execute();
          return $this->db->rowCount();
        }
        public function cariDataMahasiswa(){
          $keyword =$_POST['keyword'];
          $query="SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
          $this->db->query($query);
          $this->db->bind('keyword',"%keyword%");
          return $this->db->resulSet();
        }
}