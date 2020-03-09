<?php
$db=new Database;
$user=new user;
?>


<div class="container">
  <h2>ADD USER</h2>

  <form method="post" enctype="multipart/form-data">

  	<div class="form-group">
      <label>Group</label>
      <select class="form-control group">
      	<option>Select Group</option>
      	<option value="staff">Staff</option>
      	<option value="members">Members</option>
      </select>
    </div>

    <div class="form-group">
      <label>Store</label>
      <select class="form-control store">
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
      <input type="text" class="form-control user_name" placeholder="User Name" name="user_name">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control email" placeholder="Enter email"  name="email">
    </div>

    <div class="form-group">
      <label>Password</label>
      <div class="controls">
        <input type="password" class="form-control pass" id="password" placeholder="Enter password" name="pass"><button type="button" id="show"><i class="fa fa-eye" aria-hidden="true"></i></button>
        <button type="button" id="hide" style="display: none"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
        <p id="pass"></p>
      </div>
    </div>
    <!-- <div class="form-group">
      <label>Password:</label>
      <input type="password" id="password" name="password" class="form-control" data-toggle="password" placeholder="Enter Your Password">
    </div>
    <p id="pass"></p> -->

    <div class="form-group">
      <label>Confirm Password</label>
      <div class="controls">
        <input type="password" class="form-control con_pass" id="con_password" placeholder="Enter confirm password" name="con_password">
        <p id="con_pass"></p>
      </div>
    </div>

    <div class="form-group">
      <label>First Name</label>
      <input type="text" class="form-control first_name" placeholder="First Name" name="first_name">
    </div>

    <div class="form-group">
      <label>Last Name</label>
      <input type="text" class="form-control last_name" placeholder="Last Name" name="last_name">
    </div>

    <div class="form-group">
      <label>Phone</label>
      <input type="text" class="form-control phone" placeholder="Phone Number" name="phone">
    </div>

    <div class="form-group">
      <label>Gender</label>
      <select name="gender" class="form-control gender">
      	<option value="male">Male</option>
      	<option value="female">Female</option>
      </select>
    </div>
<!-- 
    <div class="form-group">
      <label>Image</label>
      <input type="file" class="form-control file" placeholder="Choose Image" name="file">
      <input type="hidden" class="file_name" value="<?=$file_name?>">
    </div> -->
    <button type="submit" class="btn btn-primary submit">Submit</button>
    <button type="reset" class="btn btn-info">Reset Button</button>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script> -->
<script type="text/javascript">
	$(document).ready(function(){

    $("#password").unbind().keyup(function(){
      var password=$(this).val().length;
      if(password<8)
      {
        $("#pass").html("<font color='red'>Password Weak</font>");
      }
      else
      {
        $("#pass").html("<font color='green'>Password Strong</font>");
      }
    });

    $("#show").unbind().click(function(){

      $("#password").prop('type','text');
      $("#show").hide();
      $("#hide").show();

    });

    $("#hide").unbind().click(function(){

      $("#password").prop('type','password');
      $("#show").show();
      $("#hide").hide();

    });

    $("#con_password").unbind().keyup(function(){

      var password=$("#password").val();
      var con_password=$("#con_password").val();
      if(password==con_password)
      {
        $("#con_pass").html("<font color='green'>Password Matched</font>");
        $(".submit").removeAttr('disabled');
      }
      else
      {
        $("#con_pass").html("<font color='red'>Password Not Matched</font>");
        $(".submit").attr("disabled","disabled");
      }

    });

    // $("#password").password('toggle');


		$(document).on("click",".submit",function(){
			var group=$(".group").val();
			var store=$(".store").val();
			var user_name=$(".user_name").val();
			var email=$(".email").val();
			var pass=$(".pass").val();
			var first_name=$(".first_name").val();
			var last_name=$(".last_name").val();
			var phone=$(".phone").val();
			var gender=$(".gender").val();
       $.ajax({
				url:'ajax_users.php',
				type:'post',
				data:{'group':group,'store':store,'user_name':user_name,'email':email,'pass':pass,'first_name':first_name,'last_name':last_name,'phone':phone,'gender':gender},
				success:function(data){
					if (data=="empty")
        			{
          				swal("Empty Field Required!");
        			}
        			else if (data=="success")
        			{
          				swal("Success!","Successfully user Inserted","success");

        			}
        			else
        			{
          				swal("Oops!","Something Went Wrong","error");
        			}
				}
			});
		});

	});
</script>
