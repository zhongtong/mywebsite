<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administrator_model extends CI_Model{
    public function get_administrator($username,$password){
        $query=$this->db->get_where("Administrator",array(
            "username"=>$username,
            "password"=>$password
        ));
        return $query->row();
    }
    public function get_by_name($name){
        $query=$this->db->get_where("Administrator",array(
            "username"=>$name
        ));
        return $query->row();
    }
    public function get_experience($user_id){
       $sql="select * from experience where user_id=$user_id";
        return $this->db->query($sql)->result();
    }
    public function get_experience_limit($n,$o,$user_id){
        if($o==''){$o=0;}
        $sql="select * from experience where user_id=$user_id limit $o,$n";
        return $this->db->query($sql)->result();

    }
    public function save_item($user_id,$title,$describe,$job){
        $this->db->insert("experience",array(
            "user_id"=>$user_id,
            "title"=>$title,
            "describe"=>$describe,
            "job"=>$job
        ));
        return $this->db->affected_rows();
    }
    public function delete_item($exp_id){
        $sql="delete from experience where exp_id=$exp_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function update_item($exp_id,$title){
       $this->db->set('title',$title);
        $this->db->where('exp_id',$exp_id);
        $this->db->update("experience");
        return $this->db->affected_rows();
    }
    public function update_item2($exp_id,$describe){
        $this->db->set('describe',$describe);
        $this->db->where('exp_id',$exp_id);
        $this->db->update("experience");
        return $this->db->affected_rows();
    }
    public function update_item3($exp_id,$job){
        $this->db->set('job',$job);
        $this->db->where('exp_id',$exp_id);
        $this->db->update("experience");
        return $this->db->affected_rows();
    }
    public function save_img($photo_url){
        $this->db->insert("file_img",array(
            "src"=>$photo_url
        ));
        return $this->db->affected_rows();
    }
    public function get_src(){
        $sql="select * from file_img";
        return $this->db->query($sql)->result();
    }
}
