<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_date'))
{
  function check_date($m=NULL,$d=NULL,$y=NULL)
  {
    $m = is_numeric($m) ? $m : '1';
    $d = is_numeric($d) ? $d : '1';
    $y = is_numeric($y) ? $y : '2500';

    return checkdate($m,$d,$y);
  }
}

if ( ! function_exists('age_calculate'))
{
  /*
  /
  @timestamp $birthdate
  */
  function age_calculate($birthdate,$todate=NULL)
  {
    $birthdate = date('d-m-Y',strtotime($birthdate));
    $todate = date('d-m-Y', strtotime('+543 year'));

    return date_diff(date_create($birthdate),date_create($todate))->y;
  }
}
