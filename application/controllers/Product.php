<?php

class Product extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));

    $this->load->library("session");

    $this->load->model('Product_model');
    // Debug
    //$this->output->enable_profiler(TRUE);
  }

  public function index()
  {
   $this->load->view("Products/list");
  }

  function load_data()
  {   

    $data = $this->Product_model->listado();
    echo json_encode($data);
  }

  /*
Controlador para eliminar 
*/
  public function eliminar($id_usuario)
  {
    if (is_numeric($id_usuario)) {
      // modelo 
      $eliminar = $this->Product_model->eliminarProducto($id_usuario);
      if ($eliminar == true) {
        $this->session->set_flashdata('listado', 'Producto Eliminado  correctamente');
      } else {
        $this->session->set_flashdata('listado', 'Error al eliminar el producto');
      }
      redirect(base_url());
    } else {
      redirect(base_url());
    }
  }

  public function actualizar($id_usuario)
  {
    if (is_numeric($id_usuario)) {
      // modelo 
      $datos["mod"] = $this->Product_model->RecuperarProducto($id_usuario);
      $this->load->view("Products/edit", $datos);
      if ($this->input->post("submit")) {
        $newData['title']  =  $this->input->post('title');
        $newData['price']  = $this->input->post('price');
        $newData['created_at']  = $this->input->post('created_at');
        $eliminar = $this->Product_model->actualizarProducto($newData,$id_usuario);
        if ($eliminar == null) {
          # code...
          $this->session->set_flashdata('actualizarerror', 'Error al actualizar el producto con ID ='.$id_usuario);
            $uri = "Product/actualizar/$id_usuario";
          redirect(base_url($uri) );
        } else {
          redirect(base_url());
        }
     
      }
    }
  }

  public function nuevo()
  {
  
    $this->load->view("Products/add");
    if ($this->input->post("submit")) {
      // modelo 
      $newData['title']  =  $this->input->post('title');
      $newData['price']  = $this->input->post('price');
      $newData['created_at']  = $this->input->post('created_at');
      
      $eliminar = $this->Product_model->nuevoProducto($newData);
      if ($eliminar == null) {
        # code...
        $this->session->set_flashdata('nuevoerror', 'Error al ingresar el nuevo producto');
        redirect(base_url('Product/nuevo'));
      } else {
        redirect(base_url());
      }
      
    }
  }
}
