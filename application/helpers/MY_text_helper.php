<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('character_limiter'))
{
  /**
   * Character Limiter
   *
   * Limits the string based on the character count.  Preserves complete words
   * so the character count may not be exactly as specified.
   *
   * @param	string
   * @param	int
   * @param	string	the end character. Usually an ellipsis
   * @return	string
   */
  function character_limiter($str, $n = 500, $end_char = '&#8230;')
  {
    if (mb_strlen($str) < $n)
    {
      return $str;
    }

    // a bit complicated, but faster than preg_replace with \s+
    $str = mb_ereg_replace("\s+", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

    if (mb_strlen($str) <= $n)
    {
      return $str;
    }

    $out = "";
    foreach (explode(' ', trim($str)) as $val)
    {
      $out .= $val.' ';

      if (mb_strlen($out) >= $n)
      {
        $out = trim($out);
        return (mb_strlen($out) == mb_strlen($str)) ? $out : $out.$end_char;
      }
    }
  }
}
