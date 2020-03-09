<?php
$db=new Database;
$user=new user;
?>


<div class="container-fluid">
  <h4>Manage User</h4>
<br>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User List</h6>
    </div>
    <div class="card-body">
    	<div class="text-center" id="load" style="display: none;">
    	<img src="../assets/loding02.gif">
    	</div>
    	<div class="u_data_show"></div>

    </div>
  </div>
</div>

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
      	<h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>

      <div class="modal-body">
        <form method="post">

	  	<div class="form-group">
	      <label>Group</label>
	      <select class="form-control e_group">
	      	<option>Select Group</option>
	      	<option value="staff">Staff</option>
	      	<option value="members">Members</option>
	      </select>
	    </div>

	    <div class="form-group">
	      <label>Store</label>
		      <select class="form-control e_store">
		        <option>Select Store</option>
		      <?php
		      $data=$user->store_list();
		      while($fetch_store=$data->fetch_assoc())
		      {
		        ?>

		        <option value="<?=$fetch_store['store_name']?>"><?=$fetch_store['store_name']?></option>

		        <?php
		      }
		      ?>
		      </select>
	    </div>


	    <div class="form-group">
	      <label>User Name</label>
	      <input type="text" class="form-control e_user_name" placeholder="User Name" name="e_user_name">
	    </div>

	    <div class="form-group">
	      <label for="email">Email</label>
	      <input type="email" class="form-control e_email" placeholder="Enter email" name="e_email">
	    </div>

	    <div class="form-group">
	      <label>First Name</label>
	      <input type="text" class="form-control e_first_name" placeholder="First Name" name="e_first_name">
	    </div>

	    <div class="form-group">
	      <label>Last Name</label>
	      <input type="text" class="form-control e_last_name" placeholder="Last Name" name="e_last_name">
	    </div>

	    <div class="form-group">
	      <label>Phone</label>
	      <input type="text" class="form-control e_phone" placeholder="Phone Number" name="e_phone">
	    </div>

	    <div class="form-group">
	      <label>Gender</label>
	      <select name="gender" class="form-control e_gender">
	      	<option value="male">Male</option>
	      	<option value="female">Female</option>
	      </select>
	    </div>
	    <div class="form-group">
	    	<input type="hidden" class="u_id">
	    </div>
	    <button type="button" class="btn btn-primary update">Update</button>
	    <button type="reset" class="btn btn-info">Reset Button</button>
       </form>
      </div>

    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//List
		$("#load").show();//Gif_Show
		setInterval(function(){
			$.ajax({
			url:'ajax_users.php',
			type:'post',
			data:{'u_list':1},
			success:function(data)
			{
				if(data)
				{
					$(".u_data_show").html(data);//Data_Show
				}
			}
		    });
		    $("#load").hide();//Gif_Hide
		},3000);
		//Delete
		$(document).on("click",".u_delete",function(){
			var u_delete=$(this).attr("get_attr");
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
				url:'ajax_users.php',
				type:'post',
				data:{'u_delete':u_delete},
				success:function(data)
				{
					if(data=="delete")
					{
						swal('Successfull!','Data Deleted','success');
					}
					else
					{
						swal('Opps!','Something Went Wrong','error');
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
		//Edit
		$(document).on("click",".u_edit",function(){
			var u_id=$(this).attr("get_attr");
			$(".u_id").val(u_id);

			$.ajax({
				url:'ajax_users.php',
				type:'post',
				dataType:'json',
				data:{'u_id':u_id},
				success:function(data)
				{
					$(".e_group").val(data.group_name);
					$(".e_store").val(data.store);
					$(".e_user_name").val(data.user_name);
					$(".e_email").val(data.email);
					$(".e_first_name").val(data.first_name);
					$(".e_last_name").val(data.last_name);
					$(".e_phone").val(data.phone);
					$(".e_gender").val(data.gender);
				}
			});
		});

		$(document).on("click",".update",function(){
			var e_group=$(".e_group").val();
			var e_store=$(".e_store").val();
			var e_user_name=$(".e_user_name").val();
			var e_email=$(".e_email").val();
			var e_first_name=$(".e_first_name").val();
			var e_last_name=$(".e_last_name").val();
			var e_phone=$(".e_phone").val();
			var e_gender=$(".e_gender").val();
			var e_u_id=$(".u_id").val();

			$.ajax({
				url:'ajax_users.php',
				type:'post',
				data:{'e_u_id':e_u_id,'e_group':e_group,'e_store':e_store,'e_user_name':e_user_name,'e_email':e_email,'e_first_name':e_first_name,'e_last_name':e_last_name,'e_phone':e_phone,'e_gender':e_gender},
				success:function(data)
				{
					if(data=="e_empty")
					{
						swal('Empty Field Required!');
					}
					else if (data=="true")
					{
						swal('Successfull!','User Data Update','success');
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
