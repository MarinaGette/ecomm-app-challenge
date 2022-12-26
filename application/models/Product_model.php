<?php
class Product_model extends CI_Model
{

    var $jsonFile = "products.json";
    public function __construct()
    {

        parent::__construct();
    }


    public function  listado()
    {

        $product = json_decode(file_get_contents($this->jsonFile), true);

        return $product;
    }
    public function  eliminarProducto($id_producto)
    {

        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);

        $newData = array_filter($data, function ($var) use ($id_producto) {
            return ($var['id'] != $id_producto);
        });
        $delete = file_put_contents($this->jsonFile, json_encode($newData));
       return $delete ? true : false;
    }

    public function actualizarProducto($upData, $id)
    {
        $p_title = "title";
        $p_price = "price";
        $p_created_at = "created_at";
        if (!empty($upData) && is_array($upData) && !empty($id)) {
            $jsonData = file_get_contents($this->jsonFile);
            $data = json_decode($jsonData, true);

            foreach ($data as $key => $value) {
                if ($value['id'] == $id) {
                    if (isset($upData[$p_title])) {
                        $data[$key][$p_title] = $upData[$p_title];
                    }
                    if (isset($upData[$p_price])) {
                        $data[$key][$p_price] = $upData[$p_price];
                    }
                    if (isset($upData[$p_created_at])) {
                        $data[$key][$p_created_at] = $upData[$p_created_at];
                    }
                    
                }
            }
            $update = file_put_contents($this->jsonFile, json_encode($data));

            return $update ? true : false;
        } else {;
        }
    }



    public function nuevoProducto($newData)
    {
        if (!empty($newData)) {
            $id = time();
            $newData['id'] = $id;

            $jsonData = file_get_contents($this->jsonFile);
            $data = json_decode($jsonData, true);

            $data = !empty($data) ? array_filter($data) : $data;
            if (!empty($data)) {
                array_push($data, $newData);
            } else {
                $data[] = $newData;
            }
            return $insert = file_put_contents($this->jsonFile, json_encode($data));

            return  $insert ? $id : false;
        } else {;
        }
    }


    public function RecuperarProducto($id)
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);
        $singleData = array_filter($data, function ($var) use ($id) {
            return (!empty($var['id']) && $var['id'] == $id);
        });
        $singleData = array_values($singleData)[0];
        return !empty($singleData) ? $singleData : false;
    }
}
