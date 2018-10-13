<?php

class Home_model extends CI_Model{

    public function __destruct() {  
        $this->db->close();  
    }

    public function checkSchoolNumber($schoolNumber){
        $query = $this->db->get_where('petition',array('school_number' => $schoolNumber));
        if(empty($query->row_array())){ //判斷這一筆是否為空
            return true;
        }
        else{
            return false;
        }
    }

    public function addReason($name,$schoolNumber,$phone,$opinion,$token){
        $data = array(
            'name' => $name,
            'school_number' => $schoolNumber,
            'phone_number' => $phone,
            'opinion' => str_replace(array("\r\n", "\r", "\n"), "", $opinion),
            'token' => $token,
            'isReal' => 0
        );
        return $this->db->insert('petition',$data);
    }

    public function getEmailText($schoolNumber){
        $this->db->select(array('key','name','token'));
        $this->db->from('petition');
        $this->db->where('school_number',$schoolNumber);
        $query = $this->db->get()->row();
        $message = '<!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">  
        </head><body>';
        $message .= '<p>親愛的 ' . $query->name . ',<p>';
        $message .= '<p>感謝您於「樹德學生權益請願網站中」進行連署，現在是連署的最後一步了！請點選下列連接（若無法正確顯示則複製網址）</p>';
        $message .= '<p>若您未進行任何連署表單之填寫，請無視此封信件。</p>';
        $message .= '<p><a href="'.base_url('home/check').'?schoolNumber='.$schoolNumber.'&token='.$query->token.'">點我完成連署</a></p>';
        $message .= '<p>完成連署網址：'.base_url('home/check').'?schoolNumber='.$schoolNumber.'&token='.$query->token.'</p>';
        $message .= '</body></html>';
        return $message;
    }

    public function realReason($schoolNumber,$token){
        $this->db->select(array('key','name'));
        $this->db->from('petition');
        $this->db->where('school_number',$schoolNumber);
        $this->db->where('token',$token);
        $query = $this->db->get();
        if(!empty($query->row_array())){ //判斷這一筆是否為空
            $data = array(
               'isReal' => 1
            );
            $this->db->where('school_number', $schoolNumber);
            $this->db->update('petition', $data);

            $this->timeLine();
            return true;
        }else{
            return false;
        }
    }

    public function checkRealReason($schoolNumber){
        $this->db->select(array('key','isReal'));
        $this->db->from('petition');
        $this->db->where('school_number',$schoolNumber);
        $query = $this->db->get();
        if($query->row()->isReal==1){ //判斷這一筆是否被認證過
            return false;
        }else{
            return true;
        }
    }
    public function allCount(){
        $this->db->select(array('key'));
        $this->db->from('petition');
        $this->db->where('isReal',1);
        return $this->db->get()->num_rows();
    }

    public function timeLine(){
        $number = $this->allCount();
        if($number == 100){
            $data = array(
                'text' => '連署人次達'.$number.'人次',
                'time' => date('Y-m-d')
            );
            $this->db->insert('time_line',$data);
        }else if($number%500 == 0){
            $data = array(
                'text' => '連署人次達'.$number.'人次',
                'time' => date('Y-m-d')
            );
            $this->db->insert('time_line',$data);
        }
    }

    public function getTimeLine(){
        $this->db->select(array('text','time'));
        $this->db->from('time_line');
        $result = $this->db->get()->result();
        $returnJson = array();
        foreach($result as $row)  {
            $returnJson[] = array(
                "text" => $row->text,
                "time" => $row->time
            );
        }
        return json_encode($returnJson);
    }

    public function getAllPetition($start){
        $this->db->select(array('key','name','school_number','opinion'));
        $this->db->from('petition');
        $this->db->where('isReal',1);
        $this->db->order_by("key", "desc"); 
        $this->db->limit(11,$start);
        $result = $this->db->get()->result();
        //echo $this->db->last_query();
        $returnJson = array();
        foreach($result as $row)  {
            $name = $this->mb_str_split($row->name);
            $newName="";
            if(count($name)==2){
                $newName = $name[0]."*";
            }else{
                for($i=0;$i<count($name);$i++){
                    if( $i==0){
                        $newName.=$name[$i];
                    }else{
                        $newName.="*";
                    }
                }
            }

            $number = $this->mb_str_split($row->school_number);
            $newNumber="";
            for($i=0;$i<count($number);$i++){
                if( $i==0 || $i==1 || $i==6 || $i==7){
                    $newNumber.=$number[$i];
                }else{
                    $newNumber.="*";
                }
            }
            $returnJson[] = array(
                "name" => $newName."同學",
                "number" => $newNumber,
                "opinion"=>$row->opinion,
            );
        }
        return json_encode($returnJson);
    }

    public function mb_str_split($str){
        return preg_split('/(?<!^)(?!$)/u', $str );
    }

    public function delReason($school_number){
        $this->db->where('school_number', $school_number);
        $this->db->delete('petition');
    }
}
