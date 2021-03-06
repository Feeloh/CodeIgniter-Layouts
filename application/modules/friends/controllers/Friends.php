<?php
class Friends extends MX_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->model("site/site_model");
        $this->load->model("friends_model");
    }
    public function index()
    {
        $v_data["all_friends"] = $this->friends_model->get_friend();

        $data = array("title" =>$this->site_model->display_page_title(),
            "content" =>$this->load->view("friends/all_friends", $v_data, TRUE));
        $this->load->view("site/layouts/layout", $data);
    }

    public function welcome($friend_id)
    {
    
        $my_friend = $this-> friends_model->get_single_friend($friend_id);

        if($my_friend ->num_rows()>0){
            $row =$my_friend->row();
            $friend = $row->friend_name;
            $age = $row->friend_age;
            $gender = $row->friend_gender;
            $hobby = $row->friend_hobby;
            $data = array(
                "friend_name" => $friend,
                "friend_age" => $age,
                "friend_gender" => $gender,
                "friend_hobby" => $hobby,
            
            );
            $this->load->view("welcome_here", $data);
        }
        
        else{

            $this->session->set_flash_data("error_message","could not find you friend");
            redirect('friends');
        }
        
    }

    public function new_friend()
    {
        //form validation
        $this->form_validation->set_rules("first_name", "First Name", "required");
        $this->form_validation->set_rules("age", "Age", "required|numeric");
        $this->form_validation->set_rules("gender", "Gender", "required");
        $this->form_validation->set_rules("hobby", "Hobby", "required");

        if ($this->form_validation->run()) {
            $friend_id = $this->friends_model->add_friend();
            if ($friend_id > 0) {
                $this->session->set_flashdata("success_message", "new friend id" . $friend_id . "has been added");
                redirect("hello");
            } else {
                $this->session->set_flashdata("error_message", "unable to add friend");
            }
        } 
        $data["form_error"] = validation_errors();
        $this->load->view("add_friend", $data);
    }
}
?>