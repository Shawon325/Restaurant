<?php
class Products
{
  private $db;
  private $fm;

  function __construct()
  {
    $this->db=new Database;
    $this->fm=new Format;
  }

  public function category_list()
  {
      $category=$this->db->select("category_list","status='Active'");
      if ($category)
      {
        return $category;
      }
      else {
        echo "wrong";
      }
  }

  public function store()
  {
    $store=$this->db->select("stores_list","status='Active'");
    if($store)
    {
      return $store;
    }
    else
    {
      return false;
    }
  }

  public function insert($value)
  {
    $product_name=$this->fm->validation($value['product_name']);
    $price=$this->fm->validation($value['price']);
    $description=$this->fm->validation($value['description']);
    $category=$value['category'];
    $store=$value['store'];
    $status=$value['status'];
    if (empty($product_name) || empty($price) || empty($description) || empty($category) || empty($status))
    {
      ?>
      <div class="alert alert-warning" role="alert">Empty Field Required</div>
      <?php
    }
    else
    {
      $insert=$this->db->insert("products_list","product_name='$product_name',price='$price',description='$description',category='$category',store='$store',status='$status'");
      if ($insert)
      {
        ?> 
        <div class="alert alert-success" role="alert">Successfully Product Added!</div>
        <?php
      }
    }
  }

   public function get()
  {
    $data=$this->db->select_all("products_list");
    return $data;
  }

  public function update($value)
  {
    $id=$_POST['edit_id'];
    $product_name=$_POST['e_product_name'];
    $price=$_POST['e_price'];
    $description=$_POST['e_description'];
    $category=$_POST['e_category'];
    $store=$_POST['e_store'];
    $status=$_POST['e_status'];
    $update=$this->db->update("products_list","product_name='$product_name',price='$price',description='$description',category='$category',store='$store',status='$status'","id=$id");
    if ($update)
    {
      ?>
      <div class="alert alert-success" role="alert">Successfully Product Updated!</div>
      <?php
    }
    else {
      ?>
      <div class="alert alert-danger" role="alert">Something WronG!</div>
      <?php
    }
  }
}

 ?>
