<div class="container-fluid">
<?php
$group=new Group;

?>
	<h3>Manage Group</h3>
		<a href="?page=add_group"><button class="btn btn-success" type="button" name="add_group">Add Group</button></a>
		<br> <br>
		<div class="card shadow mb-4">
		  <div class="card-header py-3">
		    <h6 class="m-0 font-weight-bold text-primary">Group List</h6>
		  </div>
		  <div class="card-body">
		    <div class="table-responsive">
		      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		          <tr>
		            <th>Group Name</th>
		            <th>Status</th>
		            <th>Action</th>
		          </tr>
		        </thead>
		        <tbody>
		        	<?php

		        	$data=$group->group_list();
		        	while ($group_list=$data->fetch_assoc())
		        	{
		        		?>
		        <tr>
		            <td><?=$group_list['group_name']?></td>
		            <td><?=$group_list['status']?></td>
		            <td>
		              <button class="btn btn-info edit" get_attr="<?=$group_list['id']?>" data-toggle="modal" data-target="#edit" type="button" name="edit">Edit</button>
		              <button class="btn btn-danger delete" type="button" get_attr="<?=$group_list['id']?>" name="delete">Delete</button>
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
          <label>Group Name</label>
          <input type="text" class="form-control group_name" name="group_name" >
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control status" name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <input type="hidden" class="edit_id" name="edit_id">

        <button type="submit" name="update" class="btn btn-success update">Update</button>
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
				title: "Are You Sure?",
				text: "Once deleted, you will not be able to recover this imaginary file!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if(willDelete)
				{
					$.ajax({
						url: 'ajax_group.php',
						type: 'post',
						data: {'del_id':del_id},
						success:function(data)
						{
							if(data=='true')
							{
								swal("Successful!" ,"Successfull Group Delete" ,"success");
								setInterval(function(){location.reload()},3000);
							}
							else
							{
								swal("Error" ,"Something Went Wrong" ,"error");
							}
						}
					});
				}
				else
				{
					swal("Your imaginary file is safe!");
				}
			});
		});

		// Edit__
		// Show_Data
		$(document).on("click",".edit",function(){
			var edit_id=$(this).attr("get_attr");
			$(".edit_id").val(edit_id);
			$.ajax({
				url: 'ajax_group.php',
				type: 'post',
				dataType: 'json',
				data: {'edit_id':edit_id},
				success:function(data)
				{
					$(".group_name").val(data.group_name);
					$(".status").val(data.status);
				}
			});
		});

		$(document).on("click",".update",function(){
			var e_group_name=$(".group_name").val();
			var e_status=$(".status").val();
			var g_e_id=$(".edit_id").val();

			$.ajax({
				url: 'ajax_group.php',
				type: 'post',
				data: {'g_e_id':g_e_id,'e_group_name':e_group_name,'e_status':e_status},
				success:function(data)
				{
					if (data=="empty")
					{
						swal('Field Is Required!');
					}
					else if (data=="true")
					{
						swal("Successfull!","Data Update","success");
					}
					else
					{
						swal("Error!","Something Went Wrong","error");
					}
				}
			});
		});

	});

</script>