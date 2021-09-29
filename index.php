<?php  
 $connect = mysqli_connect("localhost", "root", "", "demo");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:success.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "INSERT INTO users (name, pass) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Registration Done")</script>';  
           }  
      }  
 }  
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE name = '$username' AND pass = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:success.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Đăng nhập</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link
      rel="stylesheet"
      href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css"
    />
    <style>
      body {
        height: 100vh;
        width: 100%;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #07000f;
      }
      form {
        height: 60vh;
        width: 350px;
        background: linear-gradient(to top left, #3d0091, #0085a6);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        margin: auto;
        padding: 10px;
      }

      .inputdata {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
      }

      input {
        width: 230px;
        height: 30px;
        border: unset;
        border-bottom: 1px solid;
        background-color: transparent;
        border-bottom-color: cyan;
        color: white;
        cursor: pointer;
      }

      input:focus {
        animation: unset;
        background: transparent;
        color: white;
      }

      #icon {
        font-size: 12px;
        color: cyan;
      }

      ::placeholder {
        align-text: center;
        color: rgba(255, 255, 255, 0.42);
      }

      #submit {
        background-color: transparent;
        width: 25%;
        height: 30px;
        color: cyan;
        border: 1px solid cyan;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        font-size: 17px;
        font-family: calibri;
        cursor: pointer;
        animation: bloomButton infinite 2s ease-in-out;
        animation-direction: alternate-reverse;
      }

      @keyframes bloomButton {
        0% {
          color: cyan;
        }
        100% {
          color: white;
        }
      }

      #login {
        font-size: 30px;
        color: white;
        font-family: baskerville;
      }
      #error {
        padding: 10px;
        font-size: 15px;
        color: white;
      }

      #formLine {
        height: 2px;
        border: unset;
        background-color: cyan;
        margin-top: -2px;
        padding: 0;
        animation: bloom infinite 2s ease-in-out;
        animation-direction: alternate-reverse;
      }

      @keyframes bloom {
        0% {
          width: 0.1%;
          background-color: white;
        }
        50% {
          background-color: #7400ff;
        }
        100% {
          width: 100%;
          background-color: #00fffb;
        }
      }
    </style>
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <div class="form">
			      <form method="post" autocomplete="on" novalidate="novalidate">
			        <span id="login">Đăng nhập</span>
			        <div class="inputdata">
			          <div id="emailinfo">
			            <i id="icon" class="im im-mail"></i>
			            <input name="username" id="email" type="text" placeholder="Username" />
			          </div>
			          <div id="passwordinfo">
			            <i id="icon" class="im im-lock"></i>
			            <input name="password" id="password" type="password" placeholder="Password" />
			          </div>
			        </div>

			        <span id="error"></span>

			        <button id="submit" name="login" type="submit" style="font-size: 16px">Đăng nhập</button>
			        <a href="index.php" style="text-decoration: none; color: red">Đăng ký</a>
			      </form>
			      <hr id="formLine" />
			    </div>
                <!-- <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Nhập username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Nhập password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-primary " />  
                     <br />  
                     <p align="center"><a href="index.php">Đăng ký</a></p>  
                </form>   -->
                <?php       
                }  
                else  
                {  
                ?>  
                <!-- <h3 align="center">Register</h3>  
                <br />  
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                     <p align="center"><a href="index.php?action=login">Login</a></p>  
                </form>  --> 
                <div class="form">
			      <form method="post" autocomplete="on" novalidate="novalidate">
			        <span id="login">Đăng ký</span>
			        <div class="inputdata">
			          <div id="emailinfo">
			            <i id="icon" class="im im-mail"></i>
			            <input name="username" id="email" type="text" placeholder="Username" />
			          </div>
			          <div id="passwordinfo">
			            <i id="icon" class="im im-lock"></i>
			            <input name="password" id="password" type="password" placeholder="Password" />
			          </div>
			        </div>

			        <span id="error"></span>

			        <button id="submit" name="register" type="submit">Đăng ký</button>
			        <a href="index.php?action=login" style="text-decoration: none; color: red">Đăng nhập</a>
			      </form>
			      <hr id="formLine" />
			    </div>
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>  
