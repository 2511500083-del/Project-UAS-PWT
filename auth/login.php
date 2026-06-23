<!DOCTYPE html>
<html>
<head>

    <title>Login</title>

    <style>

        body{
            background:#f4f6f9;
            font-family:Arial;
        }

        .login-box{

            width:350px;
            background:white;

            margin:100px auto;

            padding:25px;

            border-radius:10px;

            box-shadow:0px 0px 10px rgba(0,0,0,0.2);

        }

        input{

            width:100%;
            padding:10px;

            margin-top:5px;
            margin-bottom:15px;

        }

        button{

            width:100%;
            padding:10px;

            background:#0d6efd;

            color:white;

            border:none;

            cursor:pointer;

        }

        h2{
            text-align:center;
        }

    </style>

</head>
<body>

<div class="login-box">

    <h2>LOGIN</h2>

    <form action="proses_login.php" method="POST">

        Username

        <input
            type="text"
            name="username"
            required
        >

        Password

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>