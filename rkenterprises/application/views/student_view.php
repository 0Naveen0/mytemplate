<?php
ob_start();


session_start();
$_SESSION['message']='';
if(isset($_POST['fname']))
{
include $_SERVER [ 'DOCUMENT_ROOT' ].'/easyexam/includes/db.inc.php';
 $email = $password=$repassword = " ";
$fname=$_POST["fname"];
 
 $lname=$_POST["lname"];
 $username=$_POST["username"];
 $contact=$_POST["contact"];
 $usertype=$_POST["usertype"];
 $email=$_POST["email"];

$password=$_POST["password"];

$repassword=$_POST["repassword"];

 if (($password)==($repassword)) 
 {
	 //echo "Registered";
$sql='insert into user set fname="'.$fname.'",lname="'.$lname.'",contact="'.$contact.'",email="'.$email.'",password="'.$password.'",username="'.$username.'",usertype="'.$usertype.'"';
if (!mysqli_query($link, $sql))
{
$error = 'Error adding submitted joke: ' . mysqli_error($link);
include 'error.html.php';
exit();
}

 }
else
{
  
echo "Password Not match"; 
}
}
?>

<!doctype html>

<head>
<title>Easy Exam</title>
<link href="/easyexam/css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<?php include $_SERVER['DOCUMENT_ROOT'] . 'easyexam/includes/header.php' ;?>
<!--<header>

              <object type="application/x-shockwave-flash" data="/easyexam/swf/mybanner1.swf" width="1200" height="200" >
				<param name="quality" value="high" />
				<param name="wmode" value="opaque" />
				<param name="swfversion" value="6.0.65.0" />
               </object>
</header>-->

<div id="aside"><!--
&nbsp;&nbsp;&nbsp;&nbsp;Notice <br/><br/>
Exam Commencement Date 26/10/2015<br/><br/>
Last Date Form Submission 31/11/2015<br/><br/>
Exam Date 15/01/2016-->
<?php include $_SERVER['DOCUMENT_ROOT'] . 'easyexam/includes/aside.inc.php' ;?>
</div>

<div id="main">
Home>>>><?php echo $_SESSION["message"]; ?><br/>
Welcome to Online Examination
<br/>
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<object type="application/x-shockwave-flash" data="/easyexam/swf/exam.swf" width="640" height="480">
				<param name="quality" value="high" />
				<param name="wmode" value="opaque" />
				<param name="swfversion" value="6.0.65.0" />
               </object>
<span style="color : rgb(255,0,0); font-family : Arial Unicode MS; font-size: 16px;"></span>
</div>
<div id="nav">
&nbsp;&nbsp;&nbsp;&nbsp;
<ul>
<li><a href="home" >Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
<li><a href="admin">Admin</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
<li><a href="faculty">Institute</a></li>&nbsp;&nbsp;&nbsp;&nbsp;




<li><a id="current" href="#">Student</a>
<ul>
<li><a href="registration">Registration</a></li>
<li><a href="signin">Signin</a></li>
<li><a href="exam">Exam</a></li>
</ul>
</li>&nbsp;&nbsp;&nbsp;&nbsp;
<li><a href="about">About</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
<li><a href="contact">Contact</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
</ul>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.facebook.com"target="_blank"><img src="/easyexam/images/facebook.jpg"  width="24" height="24"alt="facebook"></img></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.twitter.com"target="_blank"><img src="/easyexam/images/twitter.jpg"  width="24" height="24"alt="twitter"></img></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.gmail.com"target="_blank"><img src="/easyexam/images/gmail.jpg"  width="24" height="24"alt="gmail"></img></a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>

<div id="links">
Useful Links.........<br/><br/>
<a href="http://www.nielit.gov.in"target="_blank">NIELIT</a><br/>
<a href="http://www.student.nielit.gov.in"target="_blank">NIELIT Student Portal</a><br/>
<a href="http://www.Mygov.in"target="_blank">Govt. of India</a><br/>
<a href="http://www.irctc.co.in"target="_blank">Indian Railway</a><br/>
<a href="http://www.nvsp.in"target="_blank">Election Commission</a><br/>
<a href="http://www.google.co.in"target="_blank">Google</a><br/>
</div>
<div id=footer class=footer>
<?php include $_SERVER['DOCUMENT_ROOT'] . 'easyexam/includes/footer.inc.php' ;?>
</div>
</div>
</body>

</html>
