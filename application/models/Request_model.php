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
      ->select('sd.id,sd.date_create,sd.date_update,sd.category')
      ->where('sd.user_id',$id)
      ->order_by('sd.id','ASC')
      ->join('users AS us','sd.user_id=us.id')
      ->get('standards AS sd')
      ->row_array();
  }

  function get_skill_id($id='')
  {
    return $this->db
      ->select('sk.id,sk.date_create,sk.date_update')
      ->where('sk.user_id',$id)
      ->order_by('sk.id','ASC')
      ->join('users AS us','sk.user_id=us.id')
      ->get('skills AS sk')
      ->row_array();
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
      return ($a['admin_id'] != NULL) ? $a['admin_id'] : $a['id'] < $b['id'];
    });

    return $array;
  }

  function get_all_id($id='')
  {
    $this->db
      ->select('*,id AS standard_id')
      ->where('user_id',$id)
      ->order_by('id','ASC');

    $standards = $this->db->get('standards')->result_array();

    $this->db
      ->select('*,id AS skill_id')
      ->where('user_id',$id)
      ->order_by('id','ASC');

    $skills = $this->db->get('skills')->result_array();

    $array = array_merge($standards,$skills);
    // usort($array, function($a, $b) {
    //   return ($a['approve_status'] !== 'accept') ? $a['approve_status'] : $a['date_create'] < $b['date_create'];
    // });

    return $array;
  }

  function get_code($user_id,$type)
  {
    return $this->db
      ->where('user_id',$user_id)
      ->get($type,1)
      ->row_array();
  }

  function get_date($date)
  {
    $standards = $this->get_standard_all();
    $skills = $this->get_skill_all();

    $events = array_merge($standards,$skills);

    $array = array();
    foreach ($events as $key => $value) :
      // if ($value['approve_status'] === 'accept') :
        // if ($value['approve_schedule'] !== '0000-00-00') :
          $date = date('d-m-Y',strtotime($date));
          $approve_schedule = date('d-m-Y',strtotime($value['approve_schedule']));
          if ($approve_schedule === $date) :
            $array[] = $value;
          endif;
        // endif;
      // endif;
    endforeach;

    return $array;
  }

  function get_future($q=array(),$status='')
  {
    $standards = $this->get_standard_all($q);
    $skills = $this->get_skill_all($q);

    $events = array_merge($standards,$skills);

    foreach ($events as $key => $value) :
      if ($value['approve_schedule'] === '0000-00-00') :
        unset($events[$key]);
      endif;
    endforeach;

    return $events;
  }

  function get_userid($id,$request)
  {
    return $this->db
      ->where('user_id',$id)
      ->get($request)
      ->row_array();
  }

  function get_reject($date)
  {
    $date = date('Y-m-d',strtotime($date));

    return $this->db
      ->where('date', $date)
      ->get('date_reject')
      ->result_array();
  }

}
