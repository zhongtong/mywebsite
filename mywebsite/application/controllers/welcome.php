<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function logout(){
        redirect("welcome/get_index");
    }
    public function get_index(){
        $user_id=1;
        $this->load->model("administrator_model");
        $experience=$this->administrator_model->get_experience($user_id);
        $this->load->view('index',array(
            "experience"=>$experience
        ));
    }
    public function get_administrator(){
        $user_id=1;
        $this->load->model("administrator_model");
        $this->load->model("comment_model");
        $experience=$this->administrator_model->get_experience($user_id);
        $this->load->library('pagination');
        $add="welcome/get_administrator";
        $count=count($experience);
        $config=$this->page_config($count,$add);
        $this->pagination->initialize($config);
        $data['page']=$this->pagination->create_links();
        $data["comment"]=$this->comment_model->get_comment();
        $data["img_src"]=$this->administrator_model->get_src();
        $data["list"]=$this->administrator_model->get_experience_limit($config['per_page'],$this->uri->segment(3),$user_id);
        $this->load->view('administrator',$data);


    }
    function page_config($count,$add){
        $config['base_url']=$add;//设置基地址
        //$config['uri_segment']=3;//设置url上第几段用于传递分页器的偏移量
        $config['total_rows']=$count;
        $config['per_page']=2;//每页显示的数据数量
        $config['first_link']='首页';
        $config['last_link']='末页';
        $config['next_link']='下一页>';
        $config['prev_link']='<上一页';
        return $config;
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function check_name(){
	    $name=$this->input->get("name");
        $this->load->model("administrator_model");
        $result=$this->administrator_model->get_by_name($name);
        if($result){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
	public function check_login(){
	    $username=$this->input->post("username");
        $password=$this->input->post("password");
        $this->load->model("administrator_model");
        $result=$this->administrator_model->get_administrator($username,$password);
        if($result){
            redirect("welcome/get_administrator");
        }else{
            redirect("welcome/get_index");
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */