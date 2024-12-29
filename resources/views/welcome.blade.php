<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/plusStyle.css">
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
              
                    @if(Auth::check()&&Auth::user()->isadmin==1)
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    @endif
                    @if (!Auth::check())
                    <div class="btn-contener">
                        <button class="btn-primary" ><a href="{{route('sighn_in')}}">Login </a></button>
                    </div>
                    @endif
                    @if(Auth::check())
                    <li><a  class='user_name' href="{{route('protfolio')}}">{{Auth::user()->name}}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <section class="home" id="home">
        <div class="carousel">
            <input type="radio" name="carousel" id="slide-btn-1" class="slide-btn" onclick="setInt();" checked />
            <input type="radio" name="carousel" id="slide-btn-2" class="slide-btn" onclick="setInt();" />
            <input type="radio" name="carousel" id="slide-btn-3" class="slide-btn" onclick="setInt();" />
            <div class="slide one parallax-effect">
                <h1>Find your perfect match online.</h1>
            </div>
            <div class="slide two parallax-effect">
                <h1>Book matches effortlessly with our website.</h1>
            </div>
            <div class="slide three parallax-effect">
                <h1>Experience seamless match booking today.</h1>
            </div>
            <div class="labels">
                <label for="slide-btn-1"></label>
                <label for="slide-btn-2"></label>
                <label for="slide-btn-3"></label>
            </div>
        </div>
    </section>
    <section class="matches">
    <div claas="first">
            <h1>
                    Today's Matches <span id="date"></span>
            </h1>
          
         
            <div class="vs-box-contener">
                @foreach($today_matchings as $matching)
                <a href="{{route('match_details',['id'=>$matching->id])}}">
                    <div class="vs-box">
                        <div class="group group-one">
                            <img src="{{url($matching->club1->logo)}}" alt="">
                            <h3>{{$matching->club1->name}}</h3>
                            <span></span>
                        </div>
                        <div class="group center-box">
                            <img src="./assets/images/vs.png" alt="">
                            @if($matching->status=="live")
                            <button class="btn-primary">
                               
                                Live </button>
                                @else 
                                <button class="btn-alert">
                               
                                Details </button>

                            @endif
                        </div>
                        <div class="group group-tow">
                            <img src="{{url($matching->club2->logo)}}" alt="">
                            <h3> {{$matching->club2->name}}</h3>
                            <span></span>
                        </div>
                    </div>
                </a>
             @endforeach
            </div>
        </div>



        <div claas="first">
            <h1>
                    Comming Matches <span id="date"></span>
            </h1>
          
         
            <div class="vs-box-contener">
                @foreach($next_matchings as $matching)
                <a href="{{route('match_details',['id'=>$matching->id])}}">
                    <div class="vs-box">
                        <div class="group group-one">
                            <img src="{{url($matching->club1->logo)}}" alt="">
                            <h3>{{$matching->club1->name}}</h3>
                            <span></span>
                        </div>
                        <div class="group center-box">
                            <img src="./assets/images/vs.png" alt="">
                            <button class="btn-primary">Details</button>
                        </div>
                        <div class="group group-tow">
                            <img src="{{url($matching->club2->logo)}}" alt="">
                            <h3> {{$matching->club2->name}}</h3>
                            <span></span>
                        </div>
                    </div>
                </a>
             @endforeach
            </div>
        </div>
        <div claas="Last">
            <h1>
                Last Matches <span id="date"></span>
            </h1>
            <div class="vs-box-contener">
            @foreach($last_matchings as $matching)
          
                <div class="vs-box">
                    <div class="group group-one">
                    <img src="{{url($matching->club1->logo)}}" alt="">
                        <h3>{{$matching->club1->name}}</h3>
                    </div>
                    <div class="group center-box">
                        <img src="./assets/images/vs.png" alt="">
                        <p>
                            Stadium:{{$matching->stadium}} <br>
                            Date and time:{{$matching->when}}
                        </p>
                    </div>
                    <div class="group group-tow">
                        <img src="{{url($matching->club2->logo)}}" alt="">
                        <h3>{{$matching->club2->name}}</h3>
                    </div>
                </div>
            </div>
       
        </div>
</a>
        @endforeach
    </section>

    <footer class="footer">
        <div class="contaner">
            <div class="row">
                <div class="footer-col">
                    <h4>Locations</h4>
                    <ul>

                        <li><a href="#">Syria-Homs</a></li>
                        
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
                        <li><a href="#">+963999333666</a></li>
                       
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

                    <form action="{{route('register')}}" method='post' class="sign_up" >
                        {{csrf_field()}}
                        <h2 class="title">Sign Up</h2>
                        <div class="input_field">
                            <i class='bx bx-user'></i>
                            <input type="text" placeholder="Username" name='name'>
                        </div>
                        @if($errors->has('errors'))
                        
                        {{ $errors->get('errors')[0]}}
                     
                     @endif
                        <div class="input_field">
                            <i class='bx bx-envelope'></i>
                            <input type="text" placeholder="Email" name='email'>
                        </div>
                        <div class="input_field">
                            <i class='bx bx-lock'></i>
                            <input type="password" placeholder="password" name='password'>
                        </div>
                        <input type="submit" value="Sign up" class="btn solid">

                    </form>
                </div>
            </div>

            <div class="panels_contener">
                <div class="panel left_panel">
                    <div class="content">
                        <h3>New Here?</h3>
                        <p>Don't you have an account? You can create a new account
                        </p>
                        <button class="btn transparent" id="sign_up_btn">Sign up</button>
                    </div>

                </div>
                <div class="panel right_panel">
                    <div class="content">
                        <h3>One of us?</h3>
                        <p>you have an account? You can log in here
                        </p>
                        <button class="btn transparent" id="sign_in_btn">Log in</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
 
    <script src="./assets/js/script.js"></script>
</body>

</html>