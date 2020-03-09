<div class="container-fluid">
<?php
$products=new Products;
if (isset($_POST['submit'])) {
  $products->insert($_POST);
}
 ?>

  <div class="card shadow mb-4">
    <div class="card-header"><h3>Add Products</h3></div>
    <div class="card-body">

      <form method="post">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" class="form-control" name="product_name" placeholder="Product Name">
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="number" class="form-control" name="price">
        </div>

        <div class="form-group">
          <label>Description</label><br>
          <textarea name="description" rows="5" cols="80"></textarea>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select class="form-control category" name="category">
            <?php
              $category=$products->category_list();
              while($category_data=$category->fetch_assoc())
              {
            ?>
            <option value="<?=$category_data['category']?>"><?=$category_data['category']?></option>
            <?php
            }
             ?>
          </select>
        </div>

        <div class="form-group">
          <label>Store</label>
          <select class="form-control store" name="store">
            <option>Select Store</option>
            <?php
            $data=$products->store();
            while($store_fetch=$data->fetch_assoc())
            {
              ?>
              <option value="<?=$store_fetch['store_name']?>"><?=$store_fetch['store_name']?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control status" name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>
        <button type="Reset" class="btn btn-info reset">Reset</button>
      </form>

    </div>
  </div>
</div>
<script type="text/javascript">

</script>
