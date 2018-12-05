<!DOCTYPE html>
<!--
Author: Code Apes.
-->
<html>
<head>
	<title>Sign Up for A New Account | ExploreHK</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link type="text/css" rel="stylesheet" href="css/loginPage.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<script>
	<!-- Space for javascript uses-->
	function checkEmail() {
		var email = document.getElementById("email").value;
		atpos = email.indexOf("@");
		dotpos = email.lastIndexOf(".");
		if (atpos < 1 || ( dotpos - atpos < 2 ))
		{
			document.getElementById("email_error").style.display='block';
			document.getElementById("confirm").disabled = true;
		}
		else{
			document.getElementById("email_error").style.display='none';
			document.getElementById("confirm").disabled = false;
		}  
	}
	function checkPassword(){
		if (document.getElementById("password").value != document.getElementById("con_password").value){
			document.getElementById("password_error").style.display='block';
			document.getElementById("confirm").disabled = true;
		}
		else{
			document.getElementById("password_error").style.display='none';
			document.getElementById("confirm").disabled = false;
		}
	}
	function checkGender(){
		if (document.getElementById("gender").value == "default"){
			document.getElementById("gender_error").style.display='block';
			document.getElementById("confirm").disabled = true;
		}
		else{
			document.getElementById("gender_error").style.display='none';
			document.getElementById("confirm").disabled = false;
		}
	}
	function checkAge(){
		if (document.getElementById("age").value == "default"){
			document.getElementById("age_error").style.display='block';
			document.getElementById("confirm").disabled = true;
		}
		else{
			document.getElementById("age_error").style.display='none';
			document.getElementById("confirm").disabled = false;
		}
	}
	</script>
</head>

<body>
<div class="wrapper">
<?php
require('topnav.php');
?>
</div>

<div class="input_container">
  <h1>Create Your Account</h1>
  <h4><a href="Login.php">Already a member?</a></h4>
  <form action="php/Register_Tourists.php" method="post">
	<br>Email
	<input type="text" id="email" name="email" placeholder="Your email.." onchange="checkEmail()" required="required">
	<div id="email_error" style=
	"display:none;
	font-family:Verdana, Geneva, sans-serif;    width: 100%;
    padding: 12px 20px;    margin: 8px 0;
    border: 1px solid #ccc;    border-radius: 4px;
    box-sizing: border-box;	border-color: #8b0000;
    background-color:#FA8072;">
	You email is not valid.</div>
	<br>
	Full Name(e.g. Chan Taiman)
	<input type="text" id="fullname" name="fullname" placeholder="Your fullname.." >
	<br>
	Gender
	<select id="gender" name="gender" onclick="checkGender()">
		<option value="NULL">--Please choose--</option>
		<option value="M">Male</option>
		<option value="F">Female</option>
		<option value="other">Other</option>
	</select>
	<div id="gender_error" style=
	"display:none;
	font-family:Verdana, Geneva, sans-serif;    width: 100%;
    padding: 12px 20px;    margin: 8px 0;
    border: 1px solid #ccc;    border-radius: 4px;    box-sizing: border-box;
	border-color: #8b0000;    background-color:#FA8072;">
	Please choose a gender.</div><br>
	Age
	<select id="age" name="age" onclick="checkAge()">
		<option value="NULL">--Please choose--</option>
		<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option>
	</select>
	<div id="age_error" style=
	"display:none;	font-family:Verdana, Geneva, sans-serif; width: 100%;
    padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc;
    border-radius: 4px; box-sizing: border-box;	border-color: #8b0000;
    background-color:#FA8072;">
	Please choose an age.</div><br>
	<label for="uname" title='(Do not include the following characters:\/:*?"<>|)'>Username</label>
	<input type="text" id="username" name="username" placeholder="Your username.." 
	title="No longer than 16 characters" maxlength="16" required="required">
	<br>
	<label for="psword" title='(Do not include the following characters:\/:*?"<>|)'>Password</label>
	<input type="password" id="password" name="password" placeholder="Your password.." onchange="checkPassword()" required="required">
	<br>Confirm Your Password
	<input type="password" id="con_password" name="con_password" placeholder="Confirm Your password.." onchange="checkPassword()"required="required">
	<div id="password_error" style=
	"display:none;
	font-family:Verdana, Geneva, sans-serif;    width: 100%;
    padding: 12px 20px;    margin: 8px 0;
    border: 1px solid #ccc;    border-radius: 4px;
    box-sizing: border-box;	border-color: #8b0000;
    background-color:#FA8072;">
	Two passwords don't match. Please try again.</div>
    <input id="confirm" type="submit" value="Confirm">
  </form>
</div>

</body>

</html>
