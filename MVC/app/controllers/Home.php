<?php 


class Home extends Controller{
    public function index(){
        $data['stf'] = $this->model('Stuff_Model')->getAllStuff();
        $this->view('home', $data);
    }

    public function tambah()
    {
        var_dump($_POST);
        if( $this->model('Stuff_Model')->tambahDataSparepart($_POST) > 0 ) {
            header('Location:' . BASEURL . '/Home');
            
        } else {
            
            header('Location:' . BASEURL . '/Home');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Stuff_Model')->hapusDataSparepart($id) > 0 ) {
            header('Location: ' . BASEURL . '/Home');
            exit;
        } else {
            
            header('Location: ' . BASEURL . '/Home');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Stuff_Model')->getStuffById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('Stuff_Model')->ubahDataSparepart($_POST) > 0 ) { 
            header('Location: ' . BASEURL . '/Home');
            exit;
        } else {
            
            header('Location: ' . BASEURL . '/Home');
            exit;
        } 
    }
}


?>