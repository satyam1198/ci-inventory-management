<?php
class Product_categories_model extends CI_Model
{
    public function all()
    {
        return $this->db->from('prod_categories')->get()->result_array();
    }
}

?>