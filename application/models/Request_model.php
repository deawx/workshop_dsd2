<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_model extends MY_Model {

  public $table_name = 'standards';

  public function __construct()
  {
    parent::__construct();
  }

  function get_standard_id($id='')
  {
    return $this->db
      ->select('sd.id,sd.date_create,sd.date_update,sd.category,sd.assets_id,us.*')
      ->like('us.email',$q)
      ->where('sd.user_id',$id)
      ->order_by('sd.id','ASC')
      ->join('users AS us','sd.user_id=us.id')
      ->get('standards AS sd')
      ->result_array();
  }

  function get_skill_id($id='')
  {
    return $this->db
      ->select('sk.id,sk.date_create,sk.date_update,sk.assets_id,us.email')
      ->like('us.email',$q)
      ->where('sk.user_id',$id)
      ->order_by('sk.id','ASC')
      ->join('users AS us','sk.user_id=us.id')
      ->get('skills AS sk')
      ->result_array();
  }

  function get_standard_all($q=array(),$status=NULL)
  {
    $this->db
      ->select('sd.id AS standard_id,sd.*,us.*')
      ->order_by('sd.id','ASC')
      ->join('users AS us','sd.user_id=us.id');

    if (is_array($q) && ! empty($q)) :
      foreach ($q as $key => $value) :
        $this->db->like($key,$value);
      endforeach;
    endif;

    if ($status)
      $this->db->where('sd.approve_status',$status);

    return $this->db->get('standards AS sd')->result_array();
  }

  function get_skill_all($q=array(),$status=NULL)
  {
    $this->db
      ->select('sk.id AS skill_id,sk.*,us.*')
      ->order_by('sk.id','ASC')
      ->join('users AS us','sk.user_id=us.id');

    if (is_array($q) && ! empty($q)) :
      foreach ($q as $key => $value) :
        $this->db->like($key,$value);
      endforeach;
    endif;

    if ($status)
      $this->db->where('sk.approve_status',$status);

    return $this->db->get('skills AS sk')->result_array();
  }

  function get_all($q=array(),$status=NULL)
  {
    $standards = $this->get_standard_all($q,$status);
    $skills = $this->get_skill_all($q,$status);

    $array = array_merge($standards,$skills);
    usort($array, function($a, $b) {
      return ($a['admin_id'] != NULL) ? $a['admin_id'] : $a['date_create'] < $b['date_create'];
    });

    return $array;
  }

  function get_all_id($id='',$status=NULL)
  {
    $this->db
      ->select('*,id AS standard_id')
      ->where('user_id',$id)
      ->order_by('id','ASC');

    if ($status != NULL)
      $this->db->where('approve_status',$status);

    $standards = $this->db->get('standards')->result_array();

    $this->db
      ->select('*,id AS skill_id')
      ->where('user_id',$id)
      ->order_by('id','ASC');

    if ($status != NULL)
      $this->db->where('approve_status',$status);

    $skills = $this->db->get('skills')->result_array();

    $array = array_merge($standards,$skills);
    usort($array, function($a, $b) {
      return ($a['admin_id'] != NULL) ? $a['admin_id'] : $a['date_create'] < $b['date_create'];
    });

    return $array;
  }

  function get_code($code='')
  {
    $code = (int) $code;

    $standard = $this->db
      ->where('date_create',$code)
      ->get('standards');

    if ($standard->num_rows() < 1) :
      $skill = $this->db
        ->where('date_create',$code)
        ->get('skills');
      if ($skill->num_rows() > 0) :
        return $skill->row_array();
      endif;
    endif;

    return $standard->row_array();
  }

  function get_date($date)
  {
    $standards = $this->get_standard_all();
    $skills = $this->get_skill_all();

    $events = array_merge($standards,$skills);

    $array = array();
    foreach ($events as $key => $value) :
      if ($value['approve_status'] === 'accept') :
        if (strlen($value['approve_schedule']) > 0) :
          $approve_schedule = date('d-m-Y',$value['approve_schedule']);
          if ($approve_schedule === $date) :
            $array[] = $value;
          endif;
        endif;
      endif;
    endforeach;

    return $array;
  }

  function get_future($q=array(),$status='')
  {
    $standards = $this->get_standard_all($q,$status);
    $skills = $this->get_skill_all($q,$status);

    $events = array_merge($standards,$skills);

    foreach ($events as $key => $value) :
      if ($value['approve_schedule'] == NULL) :
        unset($events[$key]);
      endif;
    endforeach;

    return $events;
  }

}
