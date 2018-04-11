<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends MY_Model {

  public $table_name = 'users';

  public function __construct()
  {
    parent::__construct();
  }

  function login($identity,$password)
  {
    return $this->db
      ->where(array('username'=>$identity,'password'=>$password))
      ->get('users')
      ->row_array();
  }

  function get_users($q='',$limit='',$offset='')
  {
    return $this->db
      ->like('us.email',$q)
      ->where('ug.group_id','2')
      ->order_by('us.id','DESC')
      ->join('users_groups AS ug','ug.user_id=us.id')
      ->limit($limit)
      ->offset($offset)
      ->get('users AS us')
      ->result_array();
  }

  function get_user($identity)
  {
    return $this->db
      ->where('username',$identity)
      ->get('users')
      ->row_array();
  }

  function insert_user($identity,$password)
  {
    $data = array(
      'username' => $identity,
      'password' => $password,
      'id_card' => $identity,
      'date_create' => date('Y-m-d')
    );
    $this->db
      ->set($data)
      ->insert('users');
  }

  function update_user($data)
  {
    $this->db
      ->set($data)
      ->where('id',$data['id'])
      ->update('users');
  }

  function change_password($password)
  {
    $this->db
      ->set(array('password'=>$password))
      ->where('id',$this->session->user_id)
      ->update('users');
  }

}
