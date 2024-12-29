<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>About</title>

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
                <h1>Lorem, ipsum dolor.</h1>
            </div>
            <div class="slide two parallax-effect">
                <h1>Lorem, ipsum.</h1>
            </div>
            <div class="slide three parallax-effect">
                <h1>Lorem ipsum dolor sit.</h1>
            </div>
            <div class="labels">
                <label for="slide-btn-1"></label>
                <label for="slide-btn-2"></label>
                <label for="slide-btn-3"></label>
            </div>
        </div>
    </section>

    <br>
















</br>
<section class="about">
            <div class="about-box">
                <div class="about-image">
                    <img src="./assets/images/about.jpg" alt="">
                </div>
                <div class="about-info">
                    <h2>About</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur sequi adipisci sed commodi sit
                        amet fugit expedita vitae dolorum, ducimus possimus voluptate molestiae, explicabo asperiores
                        ipsa
                        perspiciatis maxime temporibus voluptates.</p>
                </div>
            </div>
        </section>


        <br>





</br>
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

    <script src="./assets/js/script.js"></script>





</body>
</html>