<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model{
    public function save_comment_person($name,$email,$qq,$phone,$content){
        $this->db->insert('comment',array(
            'pname'=>$name,
            'pemail'=>$email,
            'pqq'=>$qq,
            'pphone'=>$phone,
            'pcontent'=>$content
        ));
        return $this->db->affected_rows();
    }
    public function get_comment(){
        $sql="select * from comment";
        return $this->db->query($sql)->result();
    }
    public function delete_comment($pid){
        $sql="delete from comment where pid=$pid";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}

