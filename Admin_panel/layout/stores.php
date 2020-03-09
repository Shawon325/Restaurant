<div class="container-fluid">
  <h4>Manage Stores</h4>
  <div>
	<button style="margin-top:5px;" class="btn btn-md btn-primary" type="button" name="button" data-toggle="modal" data-target="#stores">Add Stores</button>
</div>
<br>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Store List</h6>
	</div>
	<div class="card-body">
		<div class="text-center" id="s_load" style="display: none;">
			<img src="../assets/loding02.gif">
		</div>

		<div class="s_data_show"></div>

	</div>
 </div>
</div>



<form method="post">
	<div class="modal fade" id="stores">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-edit"></i>Add Store</h4>
					<button type="button" class="close" data-dismiss="modal" name="button">x</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
      					<label>Store Name</label>
      					<input type="text" class="form-control store_name" name="store_name">
    				</div>
    				<div class="form-group">
      					<label>Status</label>
      					<select name="status" class="form-control status">
      						<option value="active">Active</option>
      						<option value="inactive">Inactive</option>
      					</select>
    				</div>

    				<button type="button" class="btn btn-primary submit" name="submit">Submit</button>

				</div>

			</div>
		</div>
	</div>
</form>


<form method="post">
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-edit"></i>Add Store</h4>
					<button type="button" class="close" data-dismiss="modal" name="button">x</button>
				</div>

				<div class="modal-body">
					<div class="form-group">
      					<label>Store Name</label>
      					<input type="text" class="form-control e_store_name" name="store_name">
    				</div>
    				<div class="form-group">
      					<label>Status</label>
      					<select name="status" class="form-control e_status">
      						<option value="active">Active</option>
      						<option value="inactive">Inactive</option>
      					</select>
    				</div>
    				<div class="form-group">
      					<input type="hidden" class="form-control s_id">
    				</div>

    				<button type="button" class="btn btn-primary update" name="update">Update</button>

				</div>

			</div>
		</div>
	</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
	//List_Show
	$(document).ready(function(){
		$("#s_load").show();
		setInterval(function(){
			$.ajax({
			url:'ajax_stores.php',
			type:'post',
			data:{'s_list':1},
			success:function(data)
			{
				if(data)
				{
					$(".s_data_show").html(data);
				}
			}
			});
			$("#s_load").hide();
		},3000);

		//Data_Submit
		$(document).on("click",".submit",function(){
			var store_name=$(".store_name").val();
			var status=$(".status").val();

			$.ajax({
				url:'ajax_stores.php',
				type:'post',
				data:{'store_name':store_name,'status':status},
				success:function(data){
					if(data=="empty")
					{
						swal('Field Is Required!');
					}
					else if(data=="success")
					{
						swal('Successfull!','Store Data Inserted','success');

					}
					else
					{
						swal('Opps!','Something Went Wrong','error');
					}
				}
			});
		});
		//Delete
		$(document).on("click",".s_delete",function(){
			var s_delete=$(this).attr("get_attr");
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
				url:'ajax_stores.php',
				type:'post',
				data:{'s_delete':s_delete},
				success:function(data)
				{
					if(data=="delete")
					{
						swal('Successfull!','Store Data Deleted','success');
					}
					else
					{
						swal('Opps!','Something Went Wdrong','error');
					}
					setInterval(function(){location.reload()},3000);
				}
			});
		}
		else
		{
			swal("Your imaginary file is safe!");
		}
		});
		});
		//Edit
		$(document).on("click",".s_edit",function(){
			var s_id=$(this).attr("get_attr");
			$(".s_id").val(s_id);

			$.ajax({
				url:'ajax_stores.php',
				type:'post',
				dataType:'json',
				data:{'s_id':s_id},
				success:function(data)
				{
					$(".e_store_name").val(data.store_name);
					$(".e_status").val(data.status);
				}
			});
		});

		$(document).on("click",".update",function(){
			var s_id=$(".s_id").val();
			var e_store_name=$(".e_store_name").val();
			var e_status=$(".e_status").val();

			$.ajax({
				url:'ajax_stores.php',
				type:'post',
				data:{'e_s_id':s_id,'e_store_name':e_store_name,'e_status':e_status},
				success:function(r)
				{
					if(r==503)
					{
						swal('Empty Field Required!')
					}
					else if (r==200)
					{
						swal('Successfull!','Store Data Update','success');
					}
					else
					{
						swal('Opps!','Something Went Wrong','error');
					}
					setInterval(function(){location.reload()},3000);
				}
			});
		});

	});
</script>
