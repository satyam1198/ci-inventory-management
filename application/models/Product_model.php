<?php
class Product_model extends CI_Model
{

    CONST ACTIVE_PRODUCT = 1;
    CONST INACTIVE_PRODUCT = 0;

    const PRODUCT_STATUS = [
        self::ACTIVE_PRODUCT => 'Active',
        self::INACTIVE_PRODUCT => 'In-Active',
    ];
    public function all()
    {
        $this->db->select('products.*, image_upload.image_url, prod_categories.category');
        $this->db->from('products');
        $this->db->join('prod_categories', 'products.category_id = prod_categories.id', 'left');
        $this->db->join('image_upload', 'products.product_id = image_upload.product_id', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateData($product_id, $formData,)
    {
        $this->db->where('product_id', $product_id);

        $formData = $this->prepareArray($formData);
        $res = $this->db->update('products', $formData);
        return $res;
    }

    public function store($formData) {
        $formData = $this->prepareArray($formData);
        $this->db->insert('products', $formData);
        return $this->db->insert_id();
    }

    public function getDataByID($productId)
    {
        $this->db->where('product_id', $productId);
        return $this->db->get('products')->row_array();
    }

    public function remove($productID, $isSuperAdmin = false)
    {
        if ($isSuperAdmin) {
            $this->db->where('product_id', $productID);
            return $this->db->delete('products');
        }

        return false;
    }

    public function prepareArray($formData) {
        $now = new DateTime();
        $formArray = [];

        $formArray ['title'] = $formData['title'];
        $formArray ['is_active'] = $formData['active'];
        $formArray ['category_id'] = $formData['category_id'];
        $formArray ['price'] = $formData['price'];
        $formArray ['description'] = $formData['description'];
        $formArray ['date_add'] = $now->format('Y-m-d H:i:s');
        return $formArray;
    }
}

?>