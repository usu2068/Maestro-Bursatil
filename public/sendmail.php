<?php
$name=$_POST['name'];
  $subject=$_POST['subject'];
 
  $mail=$_POST['email'];
 
  $message=$_POST['message'];

    function putinplace($string=NULL, $put=NULL, $position=false)
    {
        $d1=$d2=$i=false;
        $d=array(strlen($string), strlen($put));
        if($position > $d[0]) $position=$d[0];
        for($i=$d[0]; $i >= $position; $i--) $string[$i+$d[1]]=$string[$i];
        for($i=0; $i<$d[1]; $i++) $string[$position+$i]=$put[$i];
        return $string;
    }

    $from1 = $_POST["email"];
    $from = preg_replace('/[^a-zA-Z0-9@\.]/', ' ', $from1);

    $at_pos = strpos($from, "@");

    $from = putinplace($from, "\\", $at_pos);

    $subject1 = $_POST['subject'];
    $subject = preg_replace('/[^a-zA-Z0-9\']/', ' ', $subject1);

  
  $mailbody= '<table width="70%" border="3" align="center" cellpadding="5" cellspacing="2">';
  $mailbody.='<tr><td colspan="2"><strong><font size="+1">'.$subject.'</font></strong></td></tr>';
  $mailbody.='<tr><td width="30%" height="20">Name : </td><td width="70%">'.$name.'</td></tr>';

  $mailbody.='<tr><td height="20">E-mail : </td><td>'.$mail.'</td></tr>';
   
  
  
  $mailbody.='<tr><td valign="top" height="20">Message : </td><td valign="top">'.$message.'</td></tr></table>';
  
  
     $to=$_POST['receiver']; 
   $headers .= "From:" . $from . "\r\n";
   $headers .= 'MIME-Version: 1.0' . "\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
   $headers .= 'Content-type: text/html; charset=us-ascii' . "\r\n";
   'X-Mailer: PHP/' . phpversion();

      if(mail($to,$subject,$mailbody,$headers))
       {
  echo 'success';
  }
  else
  {
  echo 'error';
  }