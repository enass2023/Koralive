<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>sighn in</title>
</head>
<body>
<div class="popup">
<div class="contener">
                
          <form action="{{route('login')}}" method='post' >
         
      
                    {{csrf_field()}}
                        <h2 class="title">Sign in</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="email" name='email'>
                        </div>
                        <div class="input_field">
                            <i class='bx bx-lock'></i>
                            <input type="password" placeholder="password"  name='password'>
                        </div>
                        @if($errors->has('errors'))
                        <div style='color:red'>
                       {{ $errors->first()}}
                        </div>
                    @endif
                        <input type="submit" value="Login" class="btn solid">
                        <p>you dont have an account </p><a href="{{route('sighn_up')}}">sign up</a>
                    </form>
                   

</body>
</html>