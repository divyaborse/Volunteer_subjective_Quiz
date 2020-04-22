<?php defined('BASEPATH') or exit('No direct script access allowed');
class Model_volunteer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function check_login($data)
    {
        if ($this->db->select('*')->from('quiz_adder')->where($data)->get()->num_rows()) {
            $this->load->helper('date');
            date_default_timezone_set('Asia/Kolkata');
            if ($this->db->set('modified_at', date('Y-m-d H:i:s'))->update('quiz_adder')) {
                return $this->db->select('*')->from('quiz_adder')->where($data)->get()->result_array();
            } else {
                return false;
            }
        }
    }
    function set_quiz($data)
    {
        $query = $this->db->select('*')->from('temp_new_quiz')->where('class', $data['class'])->where('subject', $data['subject'])->where('chapter', $data['chapter'])->get();
        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            $data['q_id'] = rand(1111, 9999);
            $this->db->insert('temp_new_quiz', $data);
            return $this->db->select('q_id')->from('temp_new_quiz')->where('class', $data['class'])->where('subject', $data['subject'])->where('chapter', $data['chapter'])->get()->result_array();
        }
    }

    function apply_quizes($q_id)
    {
        return $this->db->select('*')->from('temp_add_ques')->where('q_id', $q_id)->get()->result_array();
    }

    function add_question($data,$type)
    {
        if ($this->db->insert('temp_add_ques', $data)) {
            return true;

        }
    }
    function approve_question($id)
    {
        $this->db->set('type', 'Submitted')->where('id', $id)->update('temp_add_ques');
    }

    function delete_question($id)
    {
        $this->db->where('id', $id)->delete('temp_add_ques');
    }
    function edit_question_volunteer($id, $update_data, $table_name)
    {
        $this->db->where('id', $id);
        if ($this->db->update($table_name, $update_data)) {
            return true;
        }
    }
    function delete_intern($id)
    {
        $this->db->where('id', $id)->delete('quiz_adder');
    }
    function prof_view_question($type)
    {
        return $this->db->select('*')->from('temp_add_ques')->join('temp_new_quiz', 'temp_new_quiz.q_id = temp_add_ques.q_id')->limit(50,0)->where('temp_add_ques.type', $type)->get()->result_array();
    }

    function prof_approve_question($id)
    {
        $this->db->set('type', 'Approved')->where('id', $id)->update('temp_add_ques');
        $approved_question = $this->db->select('*')->from('temp_add_ques')->where('type', 'Approved')->where('id', $id)->get()->result_array()['0'];
        $approved_quiz = $this->db->select('class , subject , chapter')->from('temp_new_quiz')->where('q_id', $approved_question['q_id'])->get()->result_array()['0'];

        $query_quiz = $this->db->select('q_id')->from('new_quiz')->where($approved_quiz)->get()->result_array();
        if (count($query_quiz) <= 1) {
            print_r($query_quiz);
            $approved_question['user_id'] = $this->session->userdata('quiz_volunteer')['user_id'];
            $approved_question['id'] = null;
            if (count($query_quiz) == 1) {
                $approved_question['q_id'] = $query_quiz['0']['q_id'];
            } elseif (count($query_quiz) == 0) {
                $new_quiz_id = rand(1111, 9999);
                $approved_quiz['user_id'] = $this->session->userdata('quiz_volunteer')['user_id'];
                $approved_quiz['q_id'] = $new_quiz_id;
                $this->db->insert('new_quiz', $approved_quiz);
            }
            // $this->db->where('id', $id)->delete('temp_add_ques');    // uncomment to delete temp data
            return $this->db->insert('add_quiz', $approved_question);
        } else {
            $this->db->set('type', 'Error Adding')->where('id', $id)->update('temp_add_ques');
            return false;
        }
        // print_r($approved_question);
    }

    function prof_delete_question($id)
    {
        $this->db->where('id', $id)->delete('temp_add_ques');
    }
    function return_intern_name($user_id)
    {
        return $this->db->select('name')->from('quiz_adder')->where('user_id', $user_id)->get()->result_array()['0']['name'];
    }
    function fetch_a_question($q_id)
    {
        return $this->db->select('*')->from('temp_add_ques')->where('id', $q_id)->get()->result_array();
    }
    function fetch_report_question()
    {
        return $this->db->select('*')->from('report_quiz')->join('add_quiz','add_quiz.id = report_quiz.ques_id')->get()->result_array();
    }
    function fetch_a_report_question($q_id)
    {
        return $this->db->select('*')->from('add_quiz')->where('id', $q_id)->get()->result_array();
    }
    /*public function temp_quiz(){
        //$this->load->database('Intellify');
$query = $this->db->query('SHOW CREATE TABLE temp_add_ques');
$queryResultArray = $query->result_array();
print_r( $queryResultArray[0]['Create Table'] );
    //$fields = $this->db->field_data('temp_new_quiz');
    //return $fields;
        
    }*/

    public function display(){
        //$query =  $this->db->query('SELECT * FROM temp_add_ques' WHERE type='Sub question');
        //return $query->result();
       return $this->db->select('*')->from('temp_add_ques')->where_in('type', 'Sub Question')->get()->result_array();;

//return $query->result();
    }
}
