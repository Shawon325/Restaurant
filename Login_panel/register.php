<?php
$register = new Registration;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $register->store($_POST);
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
            </div>
            <form class="user" method="post">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="first_name" placeholder="Enter First Name...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="last_name" placeholder="Enter Last Name...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="phone" placeholder="Enter Phone...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="user_name" placeholder="Enter User Name...">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>