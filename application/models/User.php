<?php
Class User extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    private $user_table = "users";

    public function create($data = "")
    {
        if(!is_array($data)){
            echo "Create user: input data isnt array!";
            return false;
        }

        if( $this->user_exist($data["username"], $data["email"]) == true ){
            echo "Create user: username or email are already exist!";
            return false;
        }

        //generate additional fields
        $data["created"] = time();
        $data["active"]  = false;

        //insert into database
        if( $user = $this->db->insert('users', $data))
        {
            return $this->db->insert_id();
        }else{
            echo "Nije ubaceno!";
            return false;
        }


        var_dump($data);
    }

    public function user_exist($username = "",$email = ""){
        $this->db->select("id,username,email");
        $this->db->where("username", $username);
        $this->db->or_where("email", $email);

        $query = $this->db->get($this->user_table);

        return $query->num_rows() == 0 ? false : true;
    }

    public function autenticate($username="",$password=""){
        $md5_password = $this->isMD5($password) == true ? $password : md5($password);

        $this->db->where("username", $username);
        $this->db->where("password", $md5_password);

        $query = $this->db->get($this->user_table);

        if($query->num_rows() == 1){
            //get user data
            $user = $query->row();

            //check is user activated
            $user->active == 0 ? exit("User isnt active, please check your mail and activate your account!") : null;

            //update last login date
            $this->update_last_login($user->id);

            return $user;
        }else{
            return false;
        }
    }


    //custom functions -------------------------------------------------------------

    private function update_last_login($id){
        $this->db->set('last_login', time());
        $this->db->where('id', $id);
        $this->db->update($this->user_table);
    }

    private function isMD5($md5 ='')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

}