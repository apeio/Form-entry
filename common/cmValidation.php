<?php
//ＵＴＦ８
	//	**********   正規表現方法   *******************************

	//	/			スラッシュ ( / ) で囲んだ文字列が正規表現である
	//	. 		任意の１文字 (ただし改行文字を除く)
	//	^			行の先頭を意味する
	//	$			行の終わりを意味する
	//	+ 		直前文字が１回以上の連続する文字
	//	* 		直前文字が0回以上の連続する文字
	//	? 		直前文字が0回、または１回だけの文字

	//	{n} 	ｎ回以上の連続する文字
	//	{n,m} ｎ回から ｍ回まで連続する文字
	//	{.m} 	0回から ｍ回まで連続する文字

	//	[ ] 	[ ]内のいずれかの１文字

	//	| 		OR （または,いずれか)
	//	() 		かっこ内を一文字としてみなす
	//	\ 		エスケープ文字 (この記号の後の特殊文字をそのまま出力する)
	//	\n 		改行文字

	//	[:alnum:]			[:alpha:]+[:digit:]
	//	[:alpha:]			[:lower:]+[:upper:]
	//	[:digit:]			数字 [0-9]
	//	[:graph:]			[:alnum:]+[:punct:]
	//	[:lower:]			小文字の半角英文字 [a-z]
	//	[:print:]			[:alnum:]+[:punct:]+スペース
	//	[:punct:]			! " # $ % & ' ( ) * + , - . /
	//	[:space:] 		空白1文字
	//	[:upper:]			大文字の半角英文字 [A-Z]

	//	応用です。
	//	.* 				とにかくなんでもいい１文字がまったくないか、連続する
	//	(AA|BBB)	AA または	BBB
	//	[^abc]		a,b,c以外の1文字

	//注意です
	//[ ]の中ではメタ文字は普通の文字として認識される \ を付ける必要はない(]  \ / については例外)

	//	何故かpreg_matchで[:alnum:]	や[:alpha:]等が全部使えない？？	それと ’ ”も認識してくれない
	//*********************************************************************************************


  //the last argument for every function denotes if this is a compulsory field.
  //by default, the field is not compulsory.
  //to indicate that the field is compulsory, specify 1.
  // clear any errors that might have been found previously
  $errors = array();

  //***************************************************
  // Basic form validation functions
  // Written by T.Watanabe
  // Date: 23/Aug/04
  //***************************************************

	//基本形 	英数字 スペース '+-=,.#$%&()*/:;が可能 HTMLタグ<>は不可 日本語の有無に利用可能 (改行、タブは不可。)
  function val_isAlphaNum00($alphaNum, $descp, $compulsory=0)
  {
		$errors	=	'';
		$alphaNumPreg	=		$alphaNum;
		$alphaNumPreg	=		str_replace(" ","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("\'","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("#","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("$","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("%","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("&","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("(","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(")","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("*","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("+","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("-","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("_","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(",","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(".","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("/","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(":","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(";","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("=","",$alphaNumPreg);

    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
  	  if(!(preg_match("/^[a-zA-Z0-9]+$/", $alphaNumPreg)))
        $errors = "The ".$descp." must only contain alphanumeric characters and space '+-=_,.#$%&()*/:; .";

    return $errors;
  }

	//主にファイル名確認に使用 (空白は不可)
  function val_isAlphaNum01($alphaNum, $descp, $compulsory=0)
  {
		$errors	=	'';
		$alphaNumPreg	=		$alphaNum;
		$alphaNumPreg	=		str_replace("(","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(")","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("-","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("_","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(".","",$alphaNumPreg);

    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
  	  if(!(preg_match("/^[a-zA-Z0-9]+$/", $alphaNumPreg)))
        $errors = "The ".$descp." must only contain alphanumeric characters and -_.() .";

    return $errors;
  }

	//英数字のみ (空白は不可)
  function val_isAlphaNum02($alphaNum, $descp, $compulsory=0)
  {
		$errors	=	'';
		$alphaNumPreg	=		$alphaNum;
		$alphaNumPreg	=		str_replace("-","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("_","",$alphaNumPreg);

    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
  	  if(!(preg_match("/^[a-zA-Z0-9]+$/", $alphaNumPreg)))
        $errors = "The ".$descp." must only contain alphanumeric characters and -_ .";

    return $errors;
  }

	//英数字のみ (空白は許可)
  function val_isAlphaNum03($alphaNum, $descp, $compulsory=0)
  {
		$errors	=	'';
		$alphaNumPreg	=		$alphaNum;
		$alphaNumPreg	=		str_replace(" ","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("(","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(")","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("-","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("+","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("_","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(".","",$alphaNumPreg);

    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
  	  if(!(preg_match("/^[a-zA-Z0-9]+$/", $alphaNumPreg)))
        $errors = "The ".$descp." must only contain alphanumeric characters and space +-_.() .";

    return $errors;
  }

	//英数字 スペース '+-=.&()*/:;が可能 HTMLタグ<>は不可 日本語の有無に利用可能 (改行、タブは不可。)
  function val_isAlphaNum04($alphaNum, $descp, $compulsory=0)
  {
		$errors	=	'';
		$alphaNumPreg	=		$alphaNum;
		$alphaNumPreg	=		str_replace(" ","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("\'","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("&","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("(","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(")","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("*","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("+","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("-","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("_","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(".","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("/","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(":","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace(";","",$alphaNumPreg);
		$alphaNumPreg	=		str_replace("=","",$alphaNumPreg);
    $alphaNumPreg	=		str_replace(",","",$alphaNumPreg);
    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
  	  if(!(preg_match("/^[a-zA-Z0-9]+$/", $alphaNumPreg)))
        $errors = "The ".$descp." must only contain alphanumeric characters and space '+-=_.&()*/:; .";

    return $errors;
  }

  function val_Upload_file($type, $upFile, $size,	$descp, $compulsory=0)
  {
    if($compulsory && empty($upFile['tmp_name']))
	    $errors = val_isEmpty($upFile['tmp_name'], $descp);
		else
		{
			$errors	=	"";
			$kbype	=	$size / 1000;

		  $UploadTemp	= $upFile['tmp_name'];
	    $UploadName = $upFile['name'];
	    $UploadSize = $upFile['size'];

			$info = pathinfo($UploadName);
	    $ext  = strtolower($info["extension"]);

			if($UploadSize>$size)
	    	$errors = "The size of the ".$descp." file cannot exceed ".$kbype."Kb.";
			elseif ($type	==	'img')
			{
		    if((strtolower($ext)<>'gif')  && (strtolower($ext)<>'jpg') && (strtolower($ext)<>'jpeg') && (strtolower($ext)<>'png'))
	  	  	$errors = "Only files with extension gif, jpg, jpeg  and png is accepted.";
			}

			if (empty($errors))  $errors = val_isSpace($UploadName, $descp, 1);
		}

    return $errors;
  }

	// Compare mailid and confirm mailid
  function val_isCompareID($ID,$confirmID, $descp)
  {
		$errors	=	'';
    if($ID != $confirmID)
      $errors = $descp;

    return $errors;
  }

  // validate if entry is empty    空欄不可
  function val_isEmpty($var, $descp)
  {
		$errors	= '';
    if(($var == "") || !(strpos($var, "nbsp") === false))
	    $errors = "The ".$descp." cannot be blank.";

    return $errors;
  }

  // validate numerical values
  function val_isNumeric($num, $descp, $compulsory=0)
  {
		$errors	= '';
     if($compulsory && empty($num))
       $errors = "The ".$descp." cannot be blank.";
     elseif(!(empty($num)) && !(is_numeric($num)))
       $errors = "The ".$descp." entry must be numeric.";

     return $errors;
  }

  // validate integer values. added on: 1 Feb 05
	// is_intは最大2147483647までしかチェックできないためロジックを変更した。12/09/2013 T.Watanabe
  function val_isInt($integer, $descp, $compulsory=0)
  {
		$errors	= '';
    if($compulsory && empty($integer))
	    $errors = "The ".$descp." cannot be blank.";
    elseif(!empty($integer))
    {
		 	for ($i=0; $i<strlen($integer); $i++)
  		{
    		$digit = substr($integer,$i,1);

       	if(!is_numeric($digit)) //check to see if there are any alphabets
        	$errors = "The ".$descp." entry must be an integer.";
       	elseif(!is_int($digit+1-1)) //the +1-1 is needed to force $integer to be a number, cos a form field is a string and this test will always fail
        	$errors = "The ".$descp." entry must be an integer.";

 				if(!empty($errors))	return $errors;
			}
		}
    return $errors;
  }

  // validate integer values. added on: 1 Feb 05
  function val_isSpace($alphaNum, $descp, $compulsory=0)
  {
		$errors	= '';
    if($compulsory && empty($alphaNum))
	    $errors = val_isEmpty($alphaNum, $descp);
    elseif(!empty($alphaNum))
		{
			if (mb_strpos($alphaNum," ") !== false || mb_strpos($alphaNum,"　") !== false) //全角、半角のスペース
    	  $errors = "The ".$descp." cannot be space.";
		}

    return $errors;
  }

  //************************************
  // Validate date inputs
  // Written by H.H.Ng
  // Date: 23/Aug/04
  //************************************
  // validate if the date is valid
  function val_date($date, $descp, $compulsory=0)
  {
		$errors	= '';
     if($compulsory && (empty($date) || ($date=='0000-00-00')))
        $errors = val_isEmpty("", "date input for ".$descp);
     elseif(!empty($date) && ($date<>'0000-00-00'))
     {
        $theDate = comm_conv_date($date);

        // extract parts of date. delimiters may be slash, dot, or hyphen.
        list($year, $mth, $day) = split ('[/.-]', $theDate);

        if(!(checkdate($mth, $day, $year)))
          $errors = "The date input for ".$descp." is not valid.";
     }

     return $errors;
  }

  // validate that the TO date is larger than the FROM date
  function val_date_compare($fromDt, $toDt, $descp, $compulsory=0)
  {
		$errors	= '';
     if(val_date($fromDt, $descp, $compulsory))
        $errors = val_date($fromDt, "From date in ".$descp, $compulsory);
     elseif(val_date($toDt, $descp, $compulsory))
        $errors = val_date($toDt, "To date in ".$descp, $compulsory);
     elseif(!empty($fromDt) && !empty($toDt))
     {
        $theFromDt = comm_conv_date($fromDt);
        $theToDt   = comm_conv_date($toDt);

        if(strtotime($theFromDt) > strtotime($theToDt))
          $errors = "The To date in ".$descp." must be later than it's From date.";
     }

     return $errors;
  }

  //**********************************
  // Validate contact information
  // Written by H.H.Ng
  // Date: 23/Aug/04, rev1:27/Jan/05
  //**********************************
  // validate email entry
  function val_email($email, $descp, $compulsory=0)
  {
		$errors	= '';
     if($compulsory && empty($email))
        $errors = val_isEmpty($email, $descp." email");
     elseif(!empty($email))
     {
        //Do the basic Reg Exp Matching for simple validation
        $validEmailExpr = "^[0-9a-z~!#$%&_-]([.]?[0-9a-z~!#$%&_-])*" .
                          "@[0-9a-z~!#$%&_-]([.]?[0-9a-z~!#$%&_-])*$";

				$domain	=	trim(substr(strrchr($email,'@'),1));
        if(!(eregi($validEmailExpr, trim($email))) || empty($domain))
          $errors = "The $descp email address is not a valid one.";
				else
				{
					$resultMX = checkdnsrr ($domain,'MX');

					if (empty($resultMX))
					{
						$resultA	= checkdnsrr ($domain,'A');

						if (empty($resultA))
		          $errors = "The $descp email address is not a valid one (not found MX or A Record).";
					}
	     }
     }

     return $errors;
  }

  function val_email_staff($email, $paswd,	$descp, $compulsory=0)
  {
		$errors	= '';

		if($compulsory && empty($email))
    	$errors = val_isEmpty($email, $descp." email");
    elseif(!empty($email))
    {
			include_once('Net/POP3.php');
			$pop3 	= new Net_POP3();																				//	インスタンス作成

			$respC		=	$pop3->connect (POPSERVER, POP3 );									// 	接続 一回目
			if ($respC === false)
			{
				sleep(1);
				$respC		=	$pop3->connect (POPSERVER, PORT );								// 	接続 二回目
				if ($respC === false)
				{
					sleep(2);
					$respC		=	$pop3->connect (POPSERVER, PORT );							// 	接続 三回目
					if ($respC === false)
					{
						sleep(3);
						$respC		=	$pop3->connect (POPSERVER, PORT );						// 	接続 四回目
						if ($respC === false)
						{
		          $errors = "The ".$descp." email address can`t connect server.";
						}
					}
				}
			}
		}

		if (empty($errors))
		{
			$respL		=	$pop3->login($email, $paswd,'USER'); 			// 	ログイン ( APOP )
			if ($respL === false)
			{
				sleep(1);
				$respL		=	$pop3->login($email, $paswd,'USER'); 			// 	ログイン ( APOP )
				if ($respL === false)
				{
          $errors = "The ".$descp." email address is not a valid.  (can't login to server).";
			    return $errors;
				}
			}
			$mailNum 	= $pop3->numMsg();																			// 	メール総件数

			if (!is_int($mailNum))
        $errors = "The ".$descp." email address is not a valid.  (Perhaps the email is not registered).";
		}

    return $errors;
  }

  //*************************************************************************************
  // Determine if there is any error. if yes, we pop up a display. else, we return true.
  // Written by H.H.Ng
  // Date: 23/Aug/04, rev1: 24/Jan/05
  // Consider multi array. Amend by T.Watanabe rev2: 11/Oct/12
  //*************************************************************************************
  function val_error($errorArray,$resetBtn=0)
  {
		//initialise a variable to denote there is no errors until proven wrong
		$errorMsg	=	val_error_check($errorArray);

		//if there is an error, pop up an error alert box
    if(!empty($errorMsg))
    {
      if($resetBtn==2){
          return $errorMsg;
      }
?>  	<script language='javascript'>
	      <!--
  	   	alert("ERROR: Your submission is not successful because\n<?=$errorMsg?>");
        if('<?=$resetBtn;?>' == 1)
        {
            top.objButton.BtnLoad("show");
        }
    	  //-->
      </script>
<?php    return false;
     }
     else //there is no errors
       return true;
  }

  function val_error_check($error)
  {
		$errorMsg	=	"";

		while (list($Key, $Value) = each($error))
		{
			if (is_array($Value))
				$errorMsg	.=	val_error_check($Value);
			else
			{
	      if(!empty($Value))
					$errorMsg	.=	"-".$Value."\\n";
			}
		}

		return $errorMsg;
	}

  //validate if an entry contains Japanese characters; added 18/Apr
  function val_jap_char($var, $descp, $compulsory=0)
  {
		$errors	= '';

		$encode  = str_replace("\xc2\xa0","",$var);       //スペースが連続すると初めのスペースがノーブレークスペース(&nbsp;みたいなもの)
																											//に変換される事があるので、（c2a0になる 要は２バイトになってしまう)
																											//日本語が無くてもstrlenとmb_strlenの長さが異なってしまう。
    if($compulsory && empty($var))
      $errors = val_isEmpty($var, $descp);
    elseif(!empty($var))
      if(strlen($encode) != mb_strlen($encode,'utf-8'))
        $errors = "The ".$descp." cannot contain Japanese characters.";

    return $errors;
  }

?>
