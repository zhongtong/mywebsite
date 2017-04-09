<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function save_items(){
        $title=$this->input->post("title");
        $describe=$this->input->post("describe");
        $job=$this->input->post("job");
        $user_id=1;
        $this->load->model("administrator_model");
        $rows=$this->administrator_model->save_item($user_id,$title,$describe,$job);
        if($rows>0){
            redirect('welcome/get_administrator');
        }else{
            redirect('welcome/get_administrator');
        }
    }
    public function delete_items(){
        $exp_id=$this->input->get("exp_id");
        $this->load->model("administrator_model");
        $result=$this->administrator_model->delete_item($exp_id);
        if($result>0){
            redirect("welcome/get_administrator");
        }
    }
    public function update_items(){
        $exp_id=$this->input->get("exp_id");
        $title=$this->input->post("title");
        $describe=$this->input->post("describe");
        $job=$this->input->post("job");
        $this->load->model("administrator_model");
        $rows1=$this->administrator_model->update_item($exp_id,$title);
        $rows2=$this->administrator_model->update_item2($exp_id,$describe);
        $rows3=$this->administrator_model->update_item3($exp_id,$job);
        if($rows1 || $rows2 || $rows3){
            redirect("welcome/get_administrator");
        }else{
            redirect("welcome/get_administrator");
        }
    }

    public function file_upload(){
        //上传图片
        $config['upload_path']='./upload/';//设置上传路径
        $config['allowed_types']='gif|jpg|png|jpeg';//设置上传文件的格式
        $config['max-size']='3072';//设置文件的大小
        $config['file_name']=date("YmdHis").'_'.rand(10000,99999);//设置文件的文件名
        $this->load->library('upload',$config);
        $this->upload->do_upload('some_img');//表单里的name属性值
        $upload_data=$this->upload->data();

        if($upload_data['file_size']>0){
            $photo_url="./upload/".$upload_data['file_name'];
            $this->load->model("administrator_model");
            $row=$this->administrator_model->save_img($photo_url);
            if($row>0){
                redirect("welcome/get_administrator");
            }
        }
    }
    public function photo_wall(){
        $this->load->view("photowall");
    }
    public function back_administrator(){
        redirect("welcome/get_administrator");
    }
}