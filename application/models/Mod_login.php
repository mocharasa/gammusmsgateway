<?php
class Mod_login extends CI_Model{
    
    //function auth_user($username,$password){
    //    $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
    //    return $query;
    //}
     
    function auth_tu($username,$password){
        $query=$this->db->query("SELECT * FROM login WHERE username='$username' AND password='$password' AND level='1' LIMIT 1");
        return $query;
    }
	
	function auth_kepsek($username,$password){
        $query=$this->db->query("SELECT * FROM login WHERE username='$username' AND password='$password' AND level='2' LIMIT 1");
        return $query;
    }
 
}