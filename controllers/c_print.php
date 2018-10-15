<?php 

include_once('./models/m_print.php');
class c_print {
	private $config;
	
  function __construct($config){
    $this->config = $config;
    $route = new route();
  }

  function indexPengeprint(){
    include_once('./views/adminPengeprint/index.php');
  }

  function status(){
    include_once('./views/adminPengeprint/status.php');
  }

  function indexTempat(){
    include_once('./views/adminTempat/index.php');
  }

  function statusPrint(){
    include_once('./views/adminTempat/sudahdiprint.php');
  }

  function hapusPengeprint(){
   $id = $_GET['id'];
   $model = new m_print();
   $model->delete($id);
   $this->config['route']->redirect('c_print','indexPengeprint');
 }

 function hapusTempat(){
   $id = $_GET['id'];
   $model = new m_print();
   $model->delete($id);
   $this->config['route']->redirect('c_print','indexTempat');
 }

 function tambah(){
  $nama_customer = $_SESSION['username'];
  $penerima = $_SESSION['username'];
  $alamat = $_POST['alamat'];
  $tempat = $_POST['tempat_print'];
  //function file
  $file = $_FILES['file']['name'];
  $tmp = $_FILES['file']['tmp_name'];
  $filebaru = date('dmYHis').$file;
  $path = "./file/".$filebaru;
  if (move_uploaded_file($tmp, $path)) {
    $model = new m_print();
    $model->tambahPrint($filebaru, $tempat, $alamat, $nama_customer, $penerima);
    $this->config['route']->redirect('c_print','indexPengeprint');
  }
}

 function updatePrint(){
   $id = $_GET['id'];
   $model = new m_print();
   $model->updatePrint($id);
   $this->config['route']->redirect('c_print','statusPrint');
 }


}
?>