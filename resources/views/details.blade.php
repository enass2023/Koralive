<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Kora Live</title>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <span class="logo navLogo"><a href="#">
                    <i class='bx bx-football'></i>
                    Kora Live</a>
            </span>
            <div class="menu">
              
                <ul class="nav-links">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About</a></li>
                    @if(Auth::check())
                    <li><a  class='user_name' href="{{route('protfolio')}}">{{Auth::user()->name}}</a></li>
                    @endif
                 
                </ul>
                 
                  
            </div>
        </div>
    </nav>
    <section class="matches">
        <div class="vs-box-contener">
            <div class="vs-box">
                <div class="group group-one">
                    <img src="{{url($matching->club1->logo)}}" alt="">
                    <h3>{{$matching->club1->name}}</h3>
                    <h3>{{$matching->club1_score}}</h3>
                </div>
                <div class="group center-box">
                    <img src="../assets/images/vs.png" alt="">

                </div>
                <div class="group group-tow">
                    <img src="{{url($matching->club2->logo)}}" alt="">
                    <h3>{{$matching->club2->name}}</h3>
                    <h3>{{$matching->club2_score}}</h3>
                </div>

            </div>
            <div class="more-details">
                <h3> Day : <span>{{date('Y-m-d', strtotime($matching->when))}}</span></h3>
                <h3> Time : <span>{{date('H:i:s', strtotime($matching->when))}}</span></h3>
                <h3> Stadium : <span>{{$matching->stadium}}</span></h3>
                <h3> City : <span>{{$matching->city}}</span></h3>
                <h3> Ticket Price : <span>{{$matching->ticket->price}}</span></h3>
                <h3>------------</h3>
                <h3> Total number of seats : <span id="total">{{$matching->ticket->tickets_count}}</span></h3>
                <h3> Number of seats available : <span id="available">{{$matching->ticket->available}}</span></h3>
                <h3 id="result"></h3>
            </div>
            <div class="btn-contener">
               <a href="{{route('add_book',['id'=>$matching->ticket->id])}}"> <button id="bookLogin" class="btn-primary">Book a ticket</button></a>
                
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="contaner">
            <div class="row">
                <div class="footer-col">
                    <h4>Locations</h4>
                    <ul>

                        <li><a href="#">India</a></li>
                        <li><a href="#">Japan </a></li>
                        <li><a href="#">Russia</a></li>
                        <li><a href="#">USA</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#"> Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Info</h4>
                    <ul>
                        <li><a href="#">+123-456-7890</a></li>
                        <li><a href="#">+111-222-3333</a></li>
                        <li><a href="#">CooraLive@Gmail.Com</a></li>
                        <li><a href="#">any@Gmail.Com</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"> <i class='bx bxl-facebook-circle'></i></a>
                        <a href="#"> <i class='bx bxl-twitter'></i></a>
                        <a href="#"> <i class='bx bxl-instagram-alt'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
                <div class="credit">
                    2024 By
                    <span>Kora Live</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- Popup -->
    <!-- <section class="popup" id="popup">
        <i id="clodePopup" class="bx bx-x"></i>
        <div class="contener">
            <div class="forms_contener">
                <div class="signin_signgup">
                    <form action="#" class="sign_in">
                        <h2 class="title">Sign in</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="input_field">
                            <i class='bx bx-lock'></i>
                            <input type="password" placeholder="password">
                        </div>
                        <input type="submit" value="Login" class="btn solid">

                    </form>

                    <form action="#" class="sign_up">
                        <h2 class="title">Sign Up</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="input_field">
                            <i class='bx bx-envelope'></i>
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="input_field">
                            <i class='bx bx-lock'></i>
                            <input type="password" placeholder="password">
                        </div>
                        <input type="submit" value="Sign up" class="btn solid">

                    </form>
                </div>
            </div>

            <div class="panels_contener">
                <div class="panel left_panel">
                    <div class="content">
                        <h3>New Here?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, asperiores similique eligendi
                        </p>
                        <button class="btn transparent" id="sign_up_btn">Sign up</button>
                    </div>

                </div>
                <div class="panel right_panel">
                    <div class="content">
                        <h3>One of us?</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, asperiores similique eligendi
                        </p>
                        <button class="btn transparent" id="sign_in_btn">Sign in</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <script src="./assets/js/script.js"></script>

</body>

</html>