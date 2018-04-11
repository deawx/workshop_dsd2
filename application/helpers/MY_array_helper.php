<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('any_in_array'))
{
  /**
   * Lets you check trought your array
   * If the function is empty it returns FALSE (defaul is FALSE)
   *
   * @param	array $needle
   * @param	array $haystack
   * @return boolean, TRUE if in array || FALSE if not
   *
   * Example : any_in_array(array('1','2'), array('1','3','5','7','9')));
   */
  function any_in_array($needle, $haystack)
  {
    $needle = is_array($needle) ? $needle : array($needle);
    $haystack = (array)$haystack;

    foreach ($needle as $item)
    {
      if (in_array($item, $haystack))
      {
        return TRUE;
      }
    }
    return FALSE;
  }
}

if ( ! function_exists('clear_null_array'))
{
  /**
   * Lets you check trought your array
   * If the function is empty it returns NULL (defaul is NULL)
   *
   * @param	array $array
   * @return array $array with clear couple of null value
   *
   * Example : clear_null_array(array('1'=>'','2'=>'true','3'=>false,'4'=>null)));
   */
  function clear_null_array($array,$reindex=FALSE)
  {
    $array = is_array($array) ? $array : array($array);
    $array = array_map('trim', $array);
		$array = array_filter($array);
    return ($reindex)
      ? array_values($array)
      : $array;
  }
}

if ( ! function_exists('result_in_array'))
{
  /**
   * Lets you check trought your array
   * If the function is empty it returns NULL (defaul is NULL)
   *
   * @param	array $array
   * @return string value in array $array
   *
   * Example : result_in_array(array('1'=>'1','2'=>'2','3'=>'3','4'=>'4')));
   */
  function result_in_array($array)
  {
    $array = is_array($array) ? $array : array($array);
    $string = '';
    foreach ($array as $key => $value) :
      $string .= $value . PHP_EOL;
    endforeach;
    return $string;
  }
}
