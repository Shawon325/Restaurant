<div class="container-fluid">
<?php
$products=new Products;
if (isset($_POST['update']))
{
    $products->update($_POST);
}
?>
<h3>Manage Products</h3>
<a href="?page=add_products"><button class="btn btn-success" type="button" name="add_products">Add Product</button></a>
<br> <br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data=$products->get();
          while ($product_list=$data->fetch_assoc())
          {
          ?>
          <tr>
            <td><?=$product_list['product_name']?></td>
            <td><?=$product_list['price']?></td>
            <td><?=$product_list['description']?></td>
            <td><?=$product_list['category']?></td>
            <td><?=$product_list['store']?></td>
            <td><?=$product_list['status']?></td>
            <td>
              <button class="btn btn-info edit" get_attr="<?=$product_list['id']?>" data-toggle="modal" data-target="#edit" type="button" name="edit">Edit</button>
              <button class="btn btn-danger delete" type="button" get_attr="<?=$product_list['id']?>" name="delete">Delete</button>
            </td>
          </tr>
          <?php
          }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<!-- EDIT MACHINE -->
<div class="modal fade" id="edit">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Products</h4>
      <button type="button" class="close" data-dismiss="modal" area-hidden="true">x</button>
    </div>
    <div class="modal-body">

      <form method="post">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" class="form-control product_name" name="e_product_name" >
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="number" class="form-control price" name="e_price">
        </div>

        <div class="form-group">
          <label>Description</label><br>
          <textarea class="description" name="e_description" rows="5" cols="40"></textarea>
        </div>

        <div class="form-group">
          <label>Category</label>
          <select class="form-control category" name="e_category">
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
          <select class="form-control store" name="e_store">
            <option value="Habib Store">Habib Store</option>
            <option value="Sadias Kitchen">Sadias Ktichen</option>
            <option value="The Gallery">The Gallery</option>
          </select>
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control status" name="e_status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <input type="hidden" class="edit_id" name="edit_id">

        <button type="submit" name="update" class="btn btn-success">Update</button>
        <button type="Reset" class="btn btn-info reset">Reset</button>
      </form>

    </div>
  </div>
</div>
</div>
<!-- EDIT MACHINE -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on("click",".delete",function(){
      var del_id=$(this).attr("get_attr");
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
              url:'ajax_products.php',
              type:'post',
              data:{'del_id':del_id},
              success:function(data)
              {
                if (data=='true')
                {
                    swal("Success!","Successfully product deleted","success");
                    setInterval(function(){reload,location},3000)
                }
                else
                {
                    swal("Oops!","Something Went Wrong","error");
                }
              }
              });
              } else {
                  swal("Your imaginary file is safe!");
                }
              });

    });

    $(document).on("click",".edit",function(){
      var edit_id=$(this).attr("get_attr");
      $(".edit_id").val(edit_id);
      $.ajax({
        url:'ajax_products.php',
        type:'post',
        dataType:'json',
        data:{'edit_id':edit_id},
        success:function(data)
        {
          $(".product_name").val(data.product_name);
          $(".price").val(data.price);
          $(".description").val(data.description);
          $(".category").val(data.category);
          $(".store").val(data.store);
          $(".status").val(data.status);
        }
      });
    });
  });
</script>
