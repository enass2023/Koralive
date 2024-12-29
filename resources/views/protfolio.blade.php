<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">
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
    <section class="profile">
        <div class="profile">
            <div class="profile-image">
                
                <img src="./assets/images/user.png" alt="">
            </div>
            <div class="profile-info">
                <h2>Name : {{Auth::user()->name}}</h2>
                <h2>Email : {{Auth::user()->email}}</h2>
                <a href="{{route('logout')}}" ><button class="btn-primary">Logout</button></a>
            </div>
        </div>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>

                    <tr>
                        <th>First team</th>
                        <th>second team</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Stadium</th>
                        <th>City</th>
                        <th>Ticket Price</th>
                        <th>Total seats</th>
                        <th>status</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach($bookings  as $booking)
                    <tr>
                        <td>{{$booking->ticket->matching->club1->name}}</td>
                        <td>{{$booking->ticket->matching->club2->name}}</td>
                        <td>{{date('Y-m-d', strtotime($booking->ticket->matching->when))}}</td>
                       
                        <td>{{date('H:i:s', strtotime($booking->ticket->matching->when))}}</td>
                        <td>{{$booking->ticket->matching->stadium}}</td>
                        <td>{{$booking->ticket->matching->city}}</td>
                        <td>{{$booking->ticket->price}}</td>
                        <td>{{$booking->ticket->tickets_count}}</td>
                        <td>{{$booking->status}}</td>
                    </tr>
                  @endforeach

                </tbody>
            </table>
        </div>
    </section>
</body>

</html>