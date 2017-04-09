<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment extends CI_Controller{

    public function save_comment_person(){
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $qq=$this->input->post('qq');
        $phone=$this->input->post('phone');
        $content=$this->input->post('content');
        $this->load->model('comment_model');
        $rows=$this->comment_model->save_comment_person($name,$email,$qq,$phone,$content);
        if($rows>0){
           redirect('welcome/get_index');
        }else{
            $this->load->view('welcome_message');
        }
    }
    public function del_comment(){
        $pid=$this->input->get("pid");
        $this->load->model("comment_model");
        $result=$this->comment_model->delete_comment($pid);
        if($result>0){
            redirect("welcome/get_administrator");
        }
    }

}