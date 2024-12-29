<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>sighn up</title>
</head>
<body>

<div class="popup">
 <div class="contener">

    <form action="{{route('register')}}" method='post' >
                    {{csrf_field()}}
                    <h2 class="title">Sign Up</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Username" name='name'>
                        </div>
                        <div class="input_field">
                            <i class='bx bx-envelope'></i>
                            <input type="text" placeholder="Email" name='email'>
                        </div>
                       
                    
                   
                        <div class="input_field">
                            <i class='bx bx-lock'></i>
                            <input type="password" placeholder="password" name='password'>
                        </div>
                        @if($errors->has('errors'))
                        <div style='color:red'>
                       {{ $errors->first()}}
                        </div>
                    @endif
                        <input type="submit" value="Sign up" class="btn solid">

                    </form>
 

</body>
</html>