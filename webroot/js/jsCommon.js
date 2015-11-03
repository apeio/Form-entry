
  function NumOnly(obj)
  {
      if(isNaN(obj.value)==true)
          {
              obj.value = "";
          }
  }


 	function HeightSet(top, bottom,botton)
	{
		document.getElementById('flameTop').style.height 		= top+'%';
		document.getElementById('flameBottom').style.height = bottom+'%';
		document.getElementById('flameBotton').style.height = botton+'%';
	}

	function WidthGet()
	{
		if(document.all)
		{
 			docWidth 	= document.body.clientWidth;
 			docHeight 	= document.body.clientHeight;
		}
		else if(document.getElementById || document.layers)
		{
		  docWidth 	= window.innerWidth;
			docHeight	= window.innerHeight
		}

		setCookie("docWidth"	, docWidth);
		setCookie("docHeight"	, docHeight);
	}

	function menuToggle(divCounter)
	{
    //var MenuID = "menu"+divCounter;
		//if this div already open, user click to close
		if(document.getElementById("menu"+divCounter).className == "menu")
		{
			document.getElementById("menu"+divCounter).className = "menu hide";
			document.getElementById("menuBar"+divCounter).className = "menuBarInactive";

      //sessionStorage.setItem(divCounter,"hide");
		}
		else
		{
			//open the div and change the bar colour
			document.getElementById("menu"+divCounter).className = "menu";
			document.getElementById("menuBar"+divCounter).className = "menuBarActive";

      //sessionStorage.setItem(divCounter,"show");
		}


	}

  //bring the cursor to the first form element. this is a user-friendly tool
  function focusFirstElem()
  {
     for (i = 0; i < document.forms[0].elements.length; i++)
     {
        if (document.forms[0].elements[i].type != "hidden")
        {
           document.forms[0].elements[i].focus();
           break;
        }
     }
  }

  //*******************************************************
  // Focus the pointer to the field that contains an error
  // Written by H.H.Ng
  // Date: 23/Aug/04, rev1: 8/Jun/05
  //*******************************************************
  function focusElement(formName, elemName)
  {
     var elem = document.forms[formName].elements[elemName];
     elem.focus();

     //if this is not a select box, we highlight the entry in the box
     if((elem.type != "select-one") && (elem.type != "select-multiple"))
       elem.select();
  }

  /************************************************************************/
  /* To change an image upon mouse hovering an image and to change back to*/
  /* the original image upon mouse out                                    */
  /************************************************************************/
  function swImg(iName,str)
  {
    document.images[iName].src = str;
    return;
  }

  //******************************************************************************
  // Round a floating point number to only 2 decimal places
  // NB: need to add 0.0001 because if not 2.3 will become 2.29 under it
  // Written by H.H.Ng
  // Date: 03/May/05
  //******************************************************************************
  function roundDecimal(val)
  {
    var num = new Number(val);
    var amt = new Number();

    amt = Math.round((num+0.0001)*100)/100;

    return parseFloat(amt);
  }

  //***********************************
  // Formats the date to dd/mmm/yy
  // Written by H.H.Ng
  // Date: 12/Aug/05
  //***********************************
  function getUKDt(dt)
  {
    var UKDate  = dt;
    var str = trimString(dt);

    if((str == null) || (str.length == 0))
       return "";

    if ((n = str.indexOf("/")) == -1)
      UKDate = str.substr(0, 2) + "/" + str.substr(2, 2) + "/" + str.substr(4, 4);

     var theDate = new Date();
     var arrMMM  = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

     theDate = convertDate(UKDate);

     if(theDate == false)
       return false;

     return pad(theDate.getDate()) + "/" + arrMMM[theDate.getMonth()] + "/" + (theDate.getYear()+"").substring(2,4);
  }

  //*****************************************************************************************
  // Calculate the TO date given the FROM date and the interval between the FROM and TO date
  // Written by H.H.Ng
  // Date: 23/Aug/04, rev1:16/Feb/05
  //*****************************************************************************************
  function getToDate(theInDt, numOfDays)
  {
     num = new Number(numOfDays);

     var inDate  = theInDt;
     var theDate = new Date();

     theDate = convertDate(inDate);

     if(theDate == false)
       return "";

     theDate.setDate(theDate.getDate() + num);

     return theDate.getYear() + "-" + pad(theDate.getMonth() + 1) + "-" + pad(theDate.getDate());
  }

  // store cookie value with optional details as needed
  function setCookie(name, value, expires, path, domain, secure)
  {
     document.cookie = name + "=" + escape (value) +
                       ((expires) ? "; expires=" + expires : "") +
                       ((path)    ? "; path=" + path       : "") +
                       ((domain)  ? "; domain=" + domain   : "") +
                       ((secure)  ? "; secure"             : "");
  }

  // remove the cookie by setting ancient expiration date
  function deleteCookie(name, path, domain)
  {
     if (document.cookie.indexOf(name) != -1)
     {
        document.cookie = name + "=" +
                          ((path)   ? "; path=" + path     : "") +
                          ((domain) ? "; domain=" + domain : "") +
                          "; expires=Thu, 04-Jan-01 00:00:01 GMT";
     }
  }

  //*****************************************************************************************************************
	// Below internal use Don't delete
  //*****************************************************************************************************************

  //*******************************************************
  // Trim the string of leading and trailing spaces
  // Written by H.H.Ng
  // Date: 25/Jan/05
  //*******************************************************
  function trimString(str)
  {
    while((str.charAt(0) == ' ') || (str.charAt(0) == '\t'))
      str = str.substring(1);

    while((str.charAt(str.length - 1) == ' ') || (str.charAt(str.length - 1) == '\t'))
      str = str.substring(0, str.length - 1);

    return str;
  }

  function stripCharsInBag(s, bag)
  {
    var i;
    var returnString = "";

    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for(i=0; i<s.length; i++)
    {
      var c = s.charAt(i);

      if(bag.indexOf(c) == -1)
        returnString += c;
    }

    return returnString;
  }

  function daysInFebruary(year)
  {
    // February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
  }

  function DaysArray(n)
  {
    for(var i = 1; i <= n; i++)
    {
      this[i] = 31;

      if (i==4 || i==6 || i==9 || i==11)
       this[i] = 30;

      if (i==2)
        this[i] = 29;
     }

     return this;
  }

  //**********************************************************************
  // Converts a date into the format that Javascript comprehends
  // This is a utility function for the calDaysDiff, getToDate and getSQLDt
  // Types of dates that gets converted (these are the UK standards):
  // d/m/yyyy, d/mm/yyyy, d/mmm/yyyy, dd/m/yyyy, dd/mm/yyyy, dd/mmm/yyyy
  // d/m/yy, d/mm/yy, d/mmm/yy, dd/m/yy, dd/mm/yy, dd/mmm/yy
  // d/m, d/mm, d/mmm, dd/m, dd/mm, dd/mmm
  // Written by H.H.Ng
  // Date: 12/Aug/05
  //**********************************************************************
  function convertDate(inDate)
  {
     dateComponent = inDate.split("/");

     if (dateComponent.length == 1)
     {
        dateComponent = inDate.split("-");

        if (dateComponent.length == 1)
        {
           dateComponent = inDate.split(".");

           if (dateComponent.length == 1)
           {
              alert('Your date input is not valid.');
              return false;
           }
        }
     }

     var inDay = dateComponent[0];
     var inMth = dateComponent[1];
     var inYr  = dateComponent[2];

     //set the format of day
     inDay = (inDay.length == 1) ? "0" + inDay : inDay;

     //set the year and it's format
     if(typeof inYr == "undefined") //if this is in the form d/m, d/mm, d/mmm, dd/m, dd/mm, dd/mmm, we set the year to current year
     {
        var today = new Date();
        var inYr  = today.getYear();
     }
     else
       inYr  = (inYr.length  == 2) ? "20" + inYr : inYr ; //set format to yyyy

     //set the format of month
     if(isNaN(inMth)) //month is in the format of Aug so we use the string method
       var theDate = new Date(inMth + " " + inDay + ", " + inYr)
     else //this is a number, means date is in the form d/m or dd/mm
     {
       //check if this is a valid date first
       if(isDate(inDay + "/" + inMth + "/" + inYr) == false)
       {
         alert('Your date input is not valid.');
         return false;
       }

       inMth = inMth - 1;
       inMth = (inMth.length == 1) ? "0" + inMth : inMth;

       var theDate = new Date(inYr, inMth, inDay);
     }

     return theDate;
  }

  //*****************************************************************************************
  // To pad a number smaller than 10 with a leading zero (used for getToDate)
  // Written by H.H.Ng
  // Date: 09/May/05
  //*****************************************************************************************
  function pad(int)
  {
    return int = (int < 10) ? '0' + int : int;
  }
/*
 * ２重サブミット防止
 * ・ボタンフレーム必須
 * ・画像を予め読んでおき、hideを操作する。
 *   <img id="Loading" src="0images/loading.gif" alt="processing, please wait" height="30" class="hide"/>
 * ・サブミット処理前にBtnLoading("show");を書くこと。
 */
  function BtnLoad(BtnStatus)
  {
    if(BtnStatus == "hide")
    {
      document.getElementById("Loading").className = "";
      document.getElementById("Btn").className     = "center hide";
    }
    else if(BtnStatus == "show")
    {
      document.getElementById("Loading").className = "hide";
      document.getElementById("Btn").className     = "center";
    }
    else
    {
      document.getElementById("Loading").className = "hide";
      document.getElementById("Btn").className     = "center";
    }
  }

  /**
   * popupを強制フォーカスにする。
   */
    function InitFocus ()
    {
        if (document.hasFocus)
            setInterval ("CheckFocus ()", 200);
        else
            alert ("Your browser does not support the hasFocus method");
    }

    function CheckFocus ()
    {
        if (document.hasFocus ())
        {
            //フォーカスある場合はなにもしない
            //document.focus();
        }
        else
        {
            //強制フォーカス
            document.focus();
        }
      }

function send_outlook(fileNm,FilePath,script)
{
top.iFrameSubmit.location.href=script+'?fileNm='+fileNm+'&FilePath='+FilePath;
}

function LoadNotification()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("NotificationArea").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_Notify.php?Type=Notify",true);
xmlhttp.send();
}
/**
 * better number validation
 * @param {type} n
 * @returns {unresolved}
 */
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function SnoozeAsk(Type,ID,W100GS010SeqNo,W100GS010GroupID,W100GS010GroupSeqNo,W100GS010UserCd)
{
    var snoozetime = prompt('when to snooze next ? \n please input in minutes','15');

    if(snoozetime){
    if(isNumber(snoozetime)==false){
        alert('please input number');
        return;
    }

    if(snoozetime>1440)
    {
        alert(' cannot set for more than 24 hour ');
        return;
    }

    NotifyStatus(Type,ID,W100GS010SeqNo,W100GS010GroupID,W100GS010GroupSeqNo,W100GS010UserCd,snoozetime);
    }
}

function NotifyStatus(Type,ID,W100GS010SeqNo,W100GS010GroupID,W100GS010GroupSeqNo,W100GS010UserCd,snoozetime)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(ID!=""){
        document.getElementById(ID).className="hide";
        }
//        alert(xmlhttp.responseText);
        //document.getElementById("NotificationArea").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_Notify.php?Type="+Type+"&ID="+ID+"&W100GS010SeqNo="+W100GS010SeqNo+"&W100GS010GroupID="+W100GS010GroupID+"&W100GS010GroupSeqNo="+W100GS010GroupSeqNo+"&W100GS010UserCd="+W100GS010UserCd+"&snoozetime="+snoozetime,true);
xmlhttp.send();
}
//Detect IE UserAgent
function getInternetExplorerVersion()
{
  var rv = -1;
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  else if (navigator.appName == 'Netscape')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}

//Set Only IE11 UserAgent
function isIE11()
{
  var isIE11 = !!navigator.userAgent.match(/Trident.*rv[ :]*11\./)
  return isIE11;
}

/**
 *
 * @returns alert message or just pass trough
 */
function TestLocalStorage()
{
    var mod = 'modernizr';
    try {
      localStorage.setItem(mod, mod);
      localStorage.removeItem(mod);
    } catch(e) {
      alert("Failed to save! \nTo use this function,\nPlease add this System to Trusted sites.");
    }
}
/**
 * JAVASCRIPT
 * function expandtext
 *
 * for auto expanding textarea.
 *
 * IE  does not auto,
 *
 * @param {type} textArea
 * @returns N/A
 */
function expandtext(textArea) {
    while (
            textArea.rows > 1 &&
            textArea.scrollHeight < textArea.offsetHeight
            ) {
        textArea.rows--;
    }

    while (textArea.scrollHeight > textArea.offsetHeight)
    {
        textArea.rows++;
    }
    textArea.rows++
}

/**
 * comm_ajax
 * replaces innerHTML
 *
 * @param {type} id
 * @param {type} script example: zajax_common.php
 *               should be a target script that ajax will do query
 * @returns {undefined}
 */
function comm_ajax(id,script,Type,AddtionalGET)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(id!='')
        {
            document.getElementById(id).innerHTML=xmlhttp.responseText;
        }
    }
  }
xmlhttp.open("GET",script+"?Type="+Type+AddtionalGET,true);
xmlhttp.send();
}


/**
 * comm_ajaxValue
 * replaces value
 *
 * @param {type} id
 * @param {type} script example: zajax_common.php
 *               should be a target script that ajax will do query
 * @returns {undefined}
 */
function comm_ajaxValue(id,script,Type,AddtionalGET)
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        if(id!='')
        {
            document.getElementById(id).value=xmlhttp.responseText;
        }
    }
  }
xmlhttp.open("GET",script+"?Type="+Type+AddtionalGET,true);
xmlhttp.send();
}

function DumpDialog(contents)
{
 if(contents == "")
     return;

  var w = "600";
  var h = "600";
  var left  = (screen.width/2)-(w/2);
  var top   = (screen.height/2)-(h/2);
  var Dialog = window.open("null.php", "dialog", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
  Dialog.document.write(escape(contents));

}

function number_format (number, decimals, dec_point, thousands_sep) {
    // Formats a number with grouped thousands
    //
    // version: 1109.2015
    // discuss at: http://phpjs.org/functions/number_format
    // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     bugfix by: Michael White (http://getsprink.com)
    // +     bugfix by: Benjamin Lupton
    // +     bugfix by: Allan Jensen (http://www.winternet.no)
    // +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // +     bugfix by: Howard Yeend
    // +    revised by: Luke Smith (http://lucassmith.name)
    // +     bugfix by: Diogo Resende
    // +     bugfix by: Rival
    // +      input by: Kheang Hok Chin (http://www.distantia.ca/)
    // +   improved by: davook
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Jay Klehr
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Amir Habibi (http://www.residence-mixte.com/)
    // +     bugfix by: Brett Zamir (http://brett-zamir.me)
    // +   improved by: Theriault
    // +      input by: Amirouche
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // *     example 1: number_format(1234.56);
    // *     returns 1: '1,235'
    // *     example 2: number_format(1234.56, 2, ',', ' ');
    // *     returns 2: '1 234,56'
    // *     example 3: number_format(1234.5678, 2, '.', '');
    // *     returns 3: '1234.57'
    // *     example 4: number_format(67, 2, ',', '.');
    // *     returns 4: '67,00'
    // *     example 5: number_format(1000);
    // *     returns 5: '1,000'
    // *     example 6: number_format(67.311, 2);
    // *     returns 6: '67.31'
    // *     example 7: number_format(1000.55, 1);
    // *     returns 7: '1,000.6'
    // *     example 8: number_format(67000, 5, ',', '.');
    // *     returns 8: '67.000,00000'
    // *     example 9: number_format(0.9, 0);
    // *     returns 9: '1'
    // *    example 10: number_format('1.20', 2);
    // *    returns 10: '1.20'
    // *    example 11: number_format('1.20', 4);
    // *    returns 11: '1.2000'
    // *    example 12: number_format('1.2000', 3);
    // *    returns 12: '1.200'
    // *    example 13: number_format('1 000,50', 2, '.', ' ');
    // *    returns 13: '100 050.00'
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}