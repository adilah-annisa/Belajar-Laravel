<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge"> <title>Login</title>
<!-- Bootstrap 5 →
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
 body {
font-family: 'Arial', sans-serif;
background-color: #f5f5f5;
 display: flex;
justify-content: center;
 align-items: center;
height: 100vh;
margin: 0;
 }

 .login-card {
 width: 100%;
max-width: 400px;
 border: none;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
 border-radius: 10px; padding: 30px; background-color: #9b59b6; color: white; } .login-card h3 { font-weight: bold; margin-bottom: 20px; } .login-card input { border-radius: 8px; } .btn-login { background-color: #e91e63; border: none; border-radius: 8px; } .btn-login:hover { background-color: #db1b60 } .login-card a { color: #ffe0f0; } </style> </head> <body> <div class="login-card"> <h3>Login</h3> <form method="post" action="{{ 'login' }}"> @csrf <div class="mb-3"> <label for="username" class="form-label">Username</label> <input type="text" class="form-control" name="username" value="{{old('username')}}"> </div> <div class="mb-3"> <label for="password" class="form-label">Password</label> <input type="password" class="form-control" name="password" value="{{old('password')}}"> </div> <button type="submit" class="btn btn-login">Login</button> </form> </div> </body> </html>

