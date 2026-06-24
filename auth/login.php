
<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Sistem Informasi Laboratorium</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    background:linear-gradient(
        135deg,
        #0f172a,
        #1e40af,
        #3b82f6
    );

    overflow:hidden;
    position:relative;
}

/* Dekorasi Background */

body::before{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:#60a5fa;

    border-radius:50%;

    top:-200px;
    left:-200px;

    filter:blur(180px);

    opacity:.3;
}

body::after{

    content:'';

    position:absolute;

    width:500px;
    height:500px;

    background:#2563eb;

    border-radius:50%;

    bottom:-200px;
    right:-200px;

    filter:blur(180px);

    opacity:.3;
}

.login-box{

    width:420px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.2);

    border-radius:25px;

    padding:40px;

    box-shadow:
    0 15px 40px rgba(0,0,0,.25);

    position:relative;
    z-index:100;
}

.logo{

    width:90px;
    height:90px;

    margin:auto;
    margin-bottom:20px;

    border-radius:50%;

    background:white;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:40px;

    color:#2563eb;
}

h2{

    text-align:center;

    color:white;

    margin-bottom:30px;

    font-size:28px;

    font-weight:700;
}

.form-group{
    margin-bottom:18px;
}

label{

    display:block;

    margin-bottom:8px;

    color:white;

    font-size:14px;

    font-weight:500;
}

input{

    width:100%;

    padding:14px;

    border:none;

    border-radius:12px;

    background:rgba(255,255,255,.15);

    color:white;

    outline:none;

    transition:.3s;
}

input::placeholder{
    color:#dbeafe;
}

input:focus{

    background:rgba(255,255,255,.25);

    box-shadow:
    0 0 0 3px rgba(96,165,250,.4);
}

button{

    width:100%;

    padding:15px;

    border:none;

    border-radius:12px;

    margin-top:10px;

    background:
    linear-gradient(
        135deg,
        #60a5fa,
        #2563eb
    );

    color:white;

    font-size:15px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;
}

button:hover{

    transform:translateY(-2px);

    box-shadow:
    0 10px 20px rgba(37,99,235,.45);
}

.footer{

    text-align:center;

    margin-top:20px;

    color:#dbeafe;

    font-size:13px;
}

.footer span{
    font-weight:600;
}

@media(max-width:500px){

    .login-box{
        width:90%;
        padding:30px;
    }

}

</style>

</head>
<body>

<div class="login-box">

    <div class="logo">
        🖥
    </div>

    <h2>LOGIN</h2>

    <form action="proses_login.php" method="POST">

        <div class="form-group">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan Username"
                required>

        </div>

        <div class="form-group">

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required>

        </div>

        <button type="submit">
            Login ke Dashboard
        </button>

    </form>

    <div class="footer">
        <span>Sistem Informasi Laboratorium Komputer</span>
    </div>

</div>

</body>
</html>

