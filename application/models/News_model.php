<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model {

  public $table_name = 'news';

  public function __construct()
  {
    parent::__construct();
  }

  function get_all($q='',$limit='',$offset='')
  {
    if ($q) :
      foreach ($q as $key => $value) :
        $this->db->like($key,$value);
      endforeach;
    endif;

    $news = $this->db
      ->limit($limit)
      ->offset($offset)
      ->order_by('id','DESC')
      ->get($this->table_name);

    return $news->result_array();
  }

  function get_id($id='')
  {
    $new = $this->db
      ->where('id',$id)
      ->get($this->table_name);

    return $new->row_array();
  }

  function pinned($id)
  {
    $new = $this->db
      ->select('pinned')
      ->where('id',$id)
      ->get($this->table_name);

    if ($new->num_rows() < 1)
      return FALSE;

    $new = $new->row_array();
    $pinned = ($new['pinned'] > 0) ? '0' : '1';

    $this->db
      ->set('pinned',$pinned)
      ->where('id',$id)
      ->update($this->table_name);

    return $this->db->affected_rows();
  }

  function views($id)
  {
    $this->db
      ->set('views','views+1',FALSE)
      ->where('id',$id)
      ->update($this->table_name);

    return $this->db->affected_rows();
  }

}
