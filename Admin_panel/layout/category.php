<div class="container-fluid">
  <?php
  $db=new Database;
   ?>
<h4>Manage Category</h4>
<div >
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_category" name="button">Add Category</button>
</div>
<br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
  </div>
  <div class="card-body">
    <div class="text-center" id="load" style="display:none;">
      <img src="../assets/preloader.gif"/></div>
        <div class="data_show"></div>

    </div>
  </div>

</div>

<!-- Add Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_category">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Category</h4>
      <button type="button" class="close" area="hidden" aria-label="Close" data-dismiss="modal">x</button>
    </div>

      <div class="modal-body">
        <form method="post">

          <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category" class="form-control category" placeholder="Category Name">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control status">
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <button type="button" class="btn btn-success submit">Submit</button>
          <button type="Reset" class="btn btn-info reset">Reset</button>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- Add Model -->

<!-- EDIT MODAL -->
<div class="modal fade" id="edit" role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<h4 class="modal-title">Edit Category</h4>
<button type="button" class="close" area="hidden" area-label="close" data-dismiss="modal">x</button>
</div>

<div class="modal-body">
  <form method="post">
    <div class="form-group">
      <label>Category Name</label>
      <input type="text" class="form-control edit_category">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select class="form-control edit_status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
    <input type="hidden" class="eid">
    <button type="button" class="btn btn-success update">Update</button>
    <button type="Reset" class="btn btn-info reset">Reset</button>
  </form>
</div>

</div>
</div>
</div>
<!-- EDIT MODAL -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
// List
    $("#load").show(); //GIF
  setInterval(function(){

    $.ajax({
      url:"ajax_category.php",
      type:"post",
      data:{'list':1},
      success:function(data)
      {
        if(data)
        {
          $(".data_show").html(data); //List Data
        }
      }
    });
    $("#load").hide(); //GIF Hide
  },3000);

//Delete
$(document).on("click",".del_button",function(){
  var cat_delid=$(this).attr("get_attr");
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
      url:'ajax_category.php',
      type:'post',
      data:{'cat_delid':cat_delid},
      success:function(data)
      {
        if (data=="delete")
        {
          swal("Success!","Successfully Category Deleted","success");
        }
        else {
          swal("Oops!","Something Went Wrong","error");
        }
      }
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
});
// add
  $(document).on("click",".submit",function(){
    var category=$(".category").val();
    var status=$(".status").val();
    $.ajax({
      url:'ajax_category.php',
      type:'post',
      data:{'category':category,'status':status},
      success:function(data)
      {
        if (data=="empty")
        {
          swal("Empty Field Required!");
        }
        else if (data=="success")
        {

          swal("Success!","Successfully Category Inserted","success");
        }
        else
        {
          swal("Oops!","Something Went Wrong","error");
        }
      }
    });
  setInterval(function(){location.reload()},2000);
  });
// EDIT
  $(document).on("click",".edit",function(){
    var edit_id=$(this).attr("get_attr");
    $(".eid").val(edit_id);
    $.ajax({
      url:'ajax_category.php',
      type:'post',
      dataType:'json',
      data:{'edit_id':edit_id},
      success:function(data)
      {
        $(".edit_category").val(data.category);
        $(".edit_status").val(data.status);
      }
    });
  });
  $(document).on("click",".update",function(){
    var edit_category=$(".edit_category").val();
    var edit_status=$(".edit_status").val();
    var eid=$(".eid").val();
    $.ajax({
      url:'ajax_category.php',
      type:'post',
      data:{'eid':eid,'edit_category':edit_category,'edit_status':edit_status},
      success:function(data)
      {
        if (data=="true")
        {

          swal("Success!","Successfully Category Updated","success");
        }
        else
        {
          // console.log(data);
          swal("Oops!","Something Went Wrong","error");
        }
      }
    });
  });
});
</script>
