<?php
$table=new table;
?>

<div class="container-fluid">
  <h4>Manage Tables</h4>
  <div>
    <button type="button" name="button" class="btn btn-info" data-toggle='modal' data-target='#table'>Add Table</button>
  </div>
<br>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Table List</h6>
    </div>
    <div class="card-body">
<div class="text-center" style="display:none;" id="load">
  <img src="../assets/loading.gif">
</div>
      <div class="t_data_show"></div>

    </div>
  </div>
</div>

<!-- ADD TABLE -->
<div class="fade modal" id="table">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Add Table</h4>
        <button type="button" class="close" data-dismiss="modal" area-hidden="true">x</button>
    </div>
    <div class="modal-body">

      <form method="post">
        <div class="form-group">
          <label>Table Name</label>
          <input type="text" name="table" class="form-control table_name" placeholder="Table Name">
        </div>

        <div class="form-group">
          <label>Capacity</label>
          <input type="number" name="capacity" class="form-control capacity">
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label>Store Name</label>
          <select class="form-control store">
            <option>Select Store</option>
            <?php
            $data=$table->store_list();
            while($fetch_table=$data->fetch_assoc())
            {
              ?>
              <option value="<?=$fetch_table['store_name']?>"><?=$fetch_table['store_name']?></option>
              <?php
            }


            ?>
          </select>
        </div>

        <button type="button" class="btn btn-success submit">Submit</button>
        <button type="Reset" class="btn btn-info reset">Reset</button>
      </form>

    </div>
  </div>
</div>
</div>
<!-- ADD TABLE -->

<!-- Edit TABLE -->
<div class="fade modal" id="table_edit">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Edit Table</h4>
        <button type="button" class="close" data-dismiss="modal" area-hidden="true">x</button>
    </div>
    <div class="modal-body">

      <form method="post">
        <div class="form-group">
          <label>Table Name</label>
          <input type="text" class="form-control e_table_name">
        </div>

        <div class="form-group">
          <label>Capacity</label>
          <input type="number" class="form-control e_capacity">
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control e_status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label>Table Name</label>
          <input type="text" class="form-control e_store" placeholder="Store Name">
        </div>
        <input type="hidden" class="edit_id" value="">
        <button type="button" class="btn btn-success update">Update</button>
        <button type="Reset" class="btn btn-info reset">Reset</button>
      </form>

    </div>
  </div>
</div>
</div>
<!-- EDIT TABLE -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
// SHOW
    $("#load").show();//gif show
    setInterval(function(){
      $.ajax({
      url:'ajax_table.php',
      type:'post',
      data:{'t_list':1},
      success:function(data)
      {
        if (data)
        {
            $(".t_data_show").html(data); //table Data
        }
      }
    });
    $("#load").hide(); //gif hide
  },3000);
// ADD
  $(document).on("click",".submit",function(){
    var table_name=$(".table_name").val();
    var status=$(".status").val();
    var store=$(".store").val();
    var capacity=$(".capacity").val();
    $.ajax({
      url:'ajax_table.php',
      type:'post',
      data:{'table_name':table_name,'status':status,'store':store,'capacity':capacity},
      success:function(data)
      {
        if (data=="true")
        {
          swal("Successful!", "Table Added!", "success");
        }
        else {
          swal("OOPS!", "Something Wrong!", "error");
        }
      }
    });
  });
// DELETE
  $(document).on("click",".delete",function(){
    var del_id=$(this).attr("get_attr");

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Table Data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        $.ajax({
          url:'ajax_table.php',
          type:'post',
          data:{'del_id':del_id},
          success:function(data)
          {
            if (data=="True")
            {
              swal("Successful!", "Table Removed!", "success");
            }
            else {
              swal("Ohh No!", "Something Wrong!", "error");
            }
          }
        });

      } else {
        swal("Table Not Deleted!");
      }
    });
  });
// EDIT
$(document).on("click",".table_edit",function(){
var eid=$(this).attr("get_attr");
  $(".edit_id").val(eid);
// EDIT // SHOW
  $.ajax({
    url:'ajax_table.php',
    type:'post',
    dataType:'json',
    data:{'eid':eid},
    success:function(data)
    {
      if (data!="Worng")
      {
        $(".e_table_name").val(data.table_name);
        $(".e_capacity").val(data.capacity);
        $(".e_status").val(data.status);
        $(".e_store").val(data.store);
      }
    }
  });
// EDIT //SHOW
  });
  // UPDATE
  $(".update").click(function(){
    var e_table_name=$(".e_table_name").val();
    var e_capacity=$(".e_capacity").val();
    var e_status=$(".e_status").val();
    var e_store=$(".e_store").val();
    var edit_id=$(".edit_id").val();
    $.ajax({
      url:'ajax_table.php',
      type:'post',
      data:{'e_table_name':e_table_name,'e_capacity':e_capacity,'e_status':e_status,'e_store':e_store,'edit_id':edit_id},
      success:function(data)
      {
        if (data=="success")
        {
          swal("Successful!", "Table Updated!", "success");
        }
        else
        {
          swal("Ooh No!", "Something Wrong!", "Error");
        }
      }
    });

  });
  });
</script>
