<?php


class Registration
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function store($request)
    {
        $user_name = $request['user_name'];
        $email = $request['email'];
        $pass = md5($request['pass']);
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $phone = $request['phone'];

        if (empty($user_name) || empty($email) || empty($pass) || empty($first_name)) {
            echo "All Field Required";
        } else {

            $add_user = $this->db->insert("user_list", "user_name='$user_name',email='$email',pass='$pass',first_name='$first_name',last_name='$last_name',phone='$phone'");
            if ($add_user) {
				header('Location:../Login_panel');
            } else {
                echo "error";
            }
        }

    }
}
