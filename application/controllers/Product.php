<?php

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_categories_model');
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Image_upload_model');
        $this->load->helper(['form', 'url']);
    }
    /**
     * Index will return show the list of dahsboard
     *
     * @return void
     */
    public function index()
    {
        $products = $this->Product_model->all();
        
        $this->load->view('products/index', compact('products'));
    }

    /**
     * Create will return show the add of dahsboard
     *
     * @return void
     */
    public function create()
    {
        $data = $this->input->post();

        if (empty($data)) {
            $prod_cat = $this->Product_categories_model->all();
            $this->load->view('products/create', compact('prod_cat'));
        } else {
            $product_id = $this->Product_model->store($data);
            if($product_id) {
                //upload file in public folder
                $img_store_res = $this->uploadImage($_FILES['upload']);

                $form_array = array(
                    'product_id' => $product_id,
                    'image_url' => isset($img_store_res['upload_data']['file_name']) ? $img_store_res['upload_data']['file_name'] : ''
                );

                //upload file in database
                if (!isset($img_store_res['error'])) {
                    $img_store = $this->Image_upload_model->create($form_array);
                    if (!empty($img_store)) {
                        $this->session->set_flashdata('success', 'Product created successfully');
                        redirect(base_url() . '/product/index');
                    } else {
                        $this->session->set_flashdata('failure', 'Something went wrong!!!');
                        redirect(base_url() . '/product/create');
                    }
                } else {
                    $this->session->set_flashdata('failure', 'Please choose right image format!!!');
                    redirect(base_url() . '/product/create');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong!!!');
                redirect(base_url() . '/product/create');
            }
        }
    }

    public function uploadImage($image)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|jfif';
         $this->load->library('upload', $config);

        if ($this->upload->do_upload('upload')) {
            $data = $this->upload->data();
            return array('upload_data' => $data);
        } else {
            $error = $this->upload->display_errors();
            return array('error' => $error);
        }
    }

    public function edit($productId)
    {
        $prod_cat = $this->Product_categories_model->all();
        $product = $this->Product_model->getDataByID($productId);

        $this->load->view('products/edit', compact('product', 'prod_cat'));
    }

    public function update($productId)
    {
        $data = $this->input->post();
        $res = $this->Product_model->updateData($productId, $data);

        if ($res) {
            $this->session->set_flashdata('success', 'Roles updated successfully!!');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong!');
        }
        redirect(base_url() . 'product/index');
    }

    public function delete($productId)
    {
        $user_id = $this->session->userData('user_id');
        $isAdmin = $this->User_model->isSuperAdmin($user_id);
        $res = $this->Product_model->remove($productId, $isAdmin);

        if ($res == true) {
            $this->session->set_flashdata('success', 'Record Deleted successfully!!');
        } else {
            $this->session->set_flashdata('failure', 'You are not authorised to remove this product!');
        }
        redirect(base_url() . 'product/index');
    }
}

?>