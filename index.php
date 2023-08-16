<!DOCTYPE html>
<html>
<head>
  <title>Login Anti Injection</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<body>
  <div class="kotak_login">
    <p class="tulisan_login">Login dengan encrypt MD5 dan Anti SQL Injection</p>
    <form method='post' action='cek_login.php' enctype='multypart/form-data'>
      <table>
        <tr>
          <td>Username</td><td> : <input type='text' name='username' placeholder='Masukan Username'></td> 
        </tr>
        <tr>
          <td>Password</td><td> : <input type='password' name='password' placeholder='Masukan Password'></td> 
        </tr>
        <tr>
          <td colspan='3' align='right' font_size='10'><img src='captcha.php'></td>
        </tr>
        <tr>
          <td>Captcha</td><td> : <input type='text' name='captcha' placeholder='Masukan Captcha'></td>
        </tr>
        <tr>
          <td><br><input type='submit' value='Login'></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>