<?php 

class Stuff_Model{
    private $db;
    private $table = 'tb_barang';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStuff()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getStuffById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataSparepart($data)
    {
        $query = "INSERT INTO tb_barang
                    VALUES
                  ('', :nama, :nopart, :tipe, :jumlah, :harga)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nopart', $data['nopart']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSparepart($id)
    {
        $query = "DELETE FROM tb_barang WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataSparepart($data)
    {
        $query = "UPDATE tb_barang SET
                    nama = :nama,
                    nopart = :nopart,
                    tipe = :tipe,
                    jumlah = :jumlah,
                    harga = :harga
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nopart', $data['nopart']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    
}

?>