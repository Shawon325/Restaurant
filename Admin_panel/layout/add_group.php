<div class="container-fluid">
<?php
$group=new Group;
if (isset($_POST['submit']))
{
	$group->insert($_POST);
}

?>
 <div class="card shadow mb-4">
    <div class="card-header"><h3>Add Group</h3></div>
    	<div class="card-body">
    		<form method="post">
        		<div class="form-group">
          			<label>Group Name</label>
          			<input type="text" class="form-control" name="group_name" placeholder="Group Name">
        		</div>

        		<div class="form-group">
          			<label>Status</label>
          				<select class="form-control" name="status">
            				<option value="Active">Active</option>
            				<option value="Inactive">Inactive</option>
          				</select>
       			 </div>

       			 <button type="submit" name="submit" class="btn btn-success submit">Submit</button>
        		 <button type="Reset" class="btn btn-info reset">Reset</button>
       		</form>

    	</div>
    </div>
</div>

