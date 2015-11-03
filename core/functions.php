<?php
  //*********************************
  // trim every element in an array & cut ms-word tag
  //*********************************
  function comm_trim(&$array)
  {
    if(is_array($array))
      array_walk($array, "comm_trim");
		else
		{
			//不正なScriptが仕込まれているといやなので、Scriptはカットする。(特にVbScritではPCのファイルを書き換えられたりする。)
			$array 		=	str_ireplace(" SCRIPT","SCRIPT",$array);
			$array 		=	str_ireplace(" SCRIPT","SCRIPT",$array);
			$array 		=	str_ireplace("SCRIPT ","SCRIPT",$array);
			$array 		=	str_ireplace("SCRIPT ","SCRIPT",$array);

			$i = 0;
			while ($i == 0)
			{
				$posS	=	stripos($array,"<SCRIPT");
				if ($posS === false)
					$i = 1;
				else
				{
					$posE			=	stripos($array,"/SCRIPT>",$posS);
					if ($posE === false)
					{
						$posE			=	stripos($array,">",$posS+1);

						if ($posE !== false)$len	=	$posE-$posS+1;
						else								$len	=	7;
					}
					else
						$len			=	$posE-$posS+8;

					$cutWord	=	substr($array,$posS,$len);
					$array 		=	str_replace($cutWord,"",$array);
				}
			}
			$array = trim($array,"\x00..\x20,");			// ASCII 制御文字 (0 から 31 まで) と,を取り除く
      //Added to escape value
      $array = db_escape_string($array);
		}

    return $array;
  }

  /*******************************************
   * function comm_htmlentities
   *
   *  Usage:
   *   use this function only when
   *   displaying it to HTML with Input Forms!!
   *
   * @param string/array $value
   * @return string/array
   ********************************************/
  function comm_htmlentities($value)
  {
      if(is_array($value))
      {
          foreach($value as $key=>$val)
          {
             $return[$key] = htmlentities($val,ENT_QUOTES,"UTF-8");
          }
      }
      else
      {
          $return = htmlentities($value,ENT_QUOTES,"UTF-8");
      }
      return $return;
  }