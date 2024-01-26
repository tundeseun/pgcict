<html>
<head>
    <link rel="stylesheet" type="text/css"href="nothome.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php
require_once('config.php');
require_once('function_notify.php');
$mat = $_GET['mat'];
     $user_id = $_GET['user_id'];

?>
<title>Notification</title>
 <style type="text/css">
<!--
.style3 {font-size: 24px}
.style5 {font-size: 30px; font-weight: bold; }
.style6 {font-size: 42px}
.style7 {
	font-size: 30px;
	font-family: "Times New Roman";
	font-weight: bold;
}
.style8 {font-size: 30px}
.style20 {font-size: 34px}
-->
 </style>
 <style type="text/css">
 p.small {
    line-height: 90%;
}

p.big {
    line-height: 400%;
} 
 .style21 {
	font-family: "Times New Roman";
	font-size: 25px;
}
 .style22 {font-family: "Times New Roman"}
.style25 {font-family: "Times New Roman"; font-size: 16px; }
 .style28 {font-family: "Times New Roman"; font-size: 16px; font-weight: bold; }
 </style>
</head>
   <table width="100%" align="center">
  <tr>
    <td width="942"><div align="center" class="style5 style6">UNIVERSITY OF IBADAN, IBADAN, NIGERIA </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style5">THE POSTGRADUATE COLLEGE </div></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
  <table width="100%" align="center">
    <tr>
      <td width="609"><p class="style28"><strong>PROVOST:&nbsp;&nbsp;Prof. J. O. Babalola, Ph.D. (Ibadan) </strong><br />
        Mobile:&nbsp; 08034540881<br />
      Email: bamijibabalola@yahoo.co.uk</p></td>
      <td width="319" rowspan="3"><div align="center"><img src="images/logo.png" width="121" height="138" /> </div></td>
      <td width="286">&nbsp;</td>
      <td width="412"><p class="style28"><strong><strong>DEPUTY REGISTRAR (Exams & Records) </strong></strong><br />
              <strong><strong>B. T. Adetona,  B.Sc. (OAU), MILR (Ibadan)</strong><br />
                Mobile:  08055113625<br />
      Email:&nbsp;&nbsp;btadetona@gmail.com </strong></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style28"><strong>DEPUTY PROVOST  (Administration)</strong> <br />
        A. S. O. Ogunjuyigbe <strong><br />
          B.Eng. (Ekpoma), M.Sc. (Lagos), D.Tech (Pretoria)<br />
          Mobile:  08023504826&nbsp;<br />
          Email:  a.ogunjuyigbe@ui.edu.ng, aogunjuyigbe@yahoo.com</strong> 
        </span>
        <title></title></td>
      <td>&nbsp;</td>
      <td><p class="style28"><strong>DEPUTY PROVOST   (Academic)&nbsp; </strong><br />
                <strong>K. M. Samuel, Ph.D. (Ibadan)&nbsp; </strong>&nbsp;&nbsp;&nbsp; <br />
        Mobile: 08034781804&nbsp;&nbsp; <br />
        Email:  kk.samuel@ui.edu.ng, symphonykay@gmail.com </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style20 " style="font-family: 'Times New Roman'; font-size: 20px;  "><em><strong>Date: <?php approval($mat);  ?></strong></em></span> <span class="style25"></strong></em></span></td>
    </tr>
  </table>
  <table width="100%" align="center">
  <tr>
    <td><span class="style22 style3"><em><strong>
     <?php biodata($user_id);  ?></strong></em></span></td>
    <td>&nbsp;</td>  </tr>
  <tr>
    <td><span class="style22 style3"><strong><em><?php matric($user_id);  ?></em></strong></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
      
      <td><span class="style22 style3"><strong><em><?php dept($user_id);  ?></em></strong></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style22 style3"><em><strong>University of Ibadan.</strong></em></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style3"></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
      <td><span class="style22 style3"><em><strong>DEAR 
      <?php title($user_id);  ?></strong></em></span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" height="302" align="center">
  <tr>
    <td width="1155" height="29"><div align="center" class="style8">
      <p class="style7">NOTIFICATION OF HIGHER DEGREE RESULT </p>
      </div></td>
  </tr>
  <tr>
    <td height="48" valign="top"><table width="100%">
      <tr>
        <td><div align="justify" ><span class="style20 style21" style="line-height: 1.82em; "> I have pleasure in informing you that, sequel to the ratification of the </span><span class="style20 style21"><em><strong>&nbsp; <?php fac($user_id);  ?> </strong></em> Postgraduate Committee and the 
          Board of</span> <span class="style20 style21" style="line-height: 1.82em;">the Postgraduate College, Senate has approved the recommendation of the examiners that the</span> <span class="style20 style21">degree 
            of <%=programme%><em><strong> <%=degree%></strong></em></span> <span class="style20 style21"><em><strong><%=field_of_interest%></strong></em></span> <span class="style20 style21">of this University be conferred on you. 
              </span></div></td>
      </tr>
      
      <tr>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
      </tr>
     
      <tr>
        <td><div align="left"></div></td>
      </tr>
     <tr>
         <td><div align="left"><span class="style20 style21" style="line-height: 1.82em;">The effective date of the award is <em><strong><?php effective($mat);  ?></strong></em></span></div></td>
      </tr>
     <!-- <tr>
        <td><div align="left"></div></td>
      </tr>-->
     <tr>
        <td><div align="left"></div></td>
      </tr>
     <tr>
         <tr>
        <td><div align="left"></div></td>
      </tr>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left" class="style20 style21" style="line-height: 1.5em;">You are also eligible to proceed to <strong><em><?php result($mat);  ?></em></strong> <em><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></em></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
      </tr>
      <tr>
        <td><p align="left" class="style20 style21" style="line-height: 1.5em;">On behalf of the Vice Chancellor, I congratulate you on the successful completion of your programme.</p>          </td>
      </tr>
      
      <tr>
        <td><div align="left"></div></td>
      </tr>
    </table>
      <p align="center" class="style3">
    <p align="center" class="style3"></td>
  </tr>
  <tr align="justify">
    <td height="167"><table width="1126" align="center">
     <tr align="justify">
    <td height="167"><table width="1089" align="center">
    <tr>
        <td width="251">&nbsp;</td>
        <td width="480">&nbsp;</td>
        <td width="480">&nbsp;</td>
        <td width="480"><p align="center" class="style22 style3">Yours Sincerely,</p>
          <p align="center" class="style22 style3">&nbsp;</p>
          <p align="center" style="margin-top:-1.5em;" class="style21"><strong style="margin-left: -1em;">B. T. Adetona</strong><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style21"><em><strong>Deputy Registrar </strong></em></span>
              <span class="style21"><em><strong style="margin-left: 2em;"><br> (Examinations & Records)</strong></em></span></p></td>
      </tr>
    </table></td>
  </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>  
    </tr>
    </table></td>
  </tr>
    </table></td>
  </tr>
</table>
</body>
</html>