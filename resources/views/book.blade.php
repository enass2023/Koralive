<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('assets/css/style2.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <style>
        color:red;
        text-alighn:center;
    </style>
</head>

<body>
<section class="popup popup-book" id="popup-book">
        <div class="contener">
        @if(session()->has('massege'))
        <div>{{session()->get(massege)}}
        </div>
        @endif
            <div class="forms_contener">
                <div class="signin_signgup">
                    <form action="{{route('store_book',['id'=>$id])}}" method='post' class="sign_in">
                    {{csrf_field()}}
                        <h2 class="title">Book a match</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="number" placeholder="Number of seats" name="number">
                        </div>
                        
                        <div class="input_fieldnh">
                            <input type="checkbox" name="payment"  >
                            <label for="payment" >I transferred money to Syriatel Cash account number 23435 </label>
                        </div>
                        <input type="submit" value="Book" class="btn solid">
                    </form>
        
                </div>
            </div>
        </div>
    </section>
    <script src="./assets/js/script.js"></script>



</body>

</html>