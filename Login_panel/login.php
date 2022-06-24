<?php
$login = new login;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $login->admin_login($_POST);
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
                    <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">
                    Login
                </button>
            </form>
            <br>
            <a href="?page=register">Create Account</a>
        </div>
    </div>
</div>