<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Kora Live</title>
</head>

<body>
    <div class="sadebar">
        <div class="contener">
            <ul>
                <li class="Matches">Matches</li>
                <li class="Users">Users</li>
                <li class="Requests">Requests</li>
            </ul>
        </div>
    </div>

    <section class="Matches active" id="Matches">
        <div class="header">
            <h1>Matches</h1>
            <a href="{{route('create_match')}}"  id="openAddPopup" class="btn-primary">add</a>
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
                        <th>CTA</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                @foreach($matchings as $matching)
                    <tr>
                        <td>{{$matching->club1->name}}</td>
                        <td>{{$matching->club2->name}}</td>
                        <td>{{$matching->when}}</td>
                        <td>12:00 PM</td>
                        <td>{{$matching->stadium}}</td>
                        <td>{{$matching->city}}</td>
                        <td>{{$matching->ticket->price}}</td>
                        <td>{{$matching->ticket->tickets_count}}</td>
                        <td>
                        <a href ="{{route('edit_match',['matching'=>$matching])}}"><i class='bx bx-edit-alt' id="openEditPopup" ></i></a>
                        <a href="{{route('delete_match',['id'=>$matching->id])}}">   <i class='bx bx-trash' id="openDeletePopup"></i></a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>
    <section class="Users" id="Users">
        <div class="header">
            <h1>Users</h1>

        </div>

        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>CTA</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                @foreach( $users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>
                         <a href="{{route('delete_user',['id'=>$user->id])}}">   <i class='bx bx-trash' id="openDeletePopup"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section class="Requests" id="Requests">
        <div class="header">
            <h1>Requests</h1>
        </div>

        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead> 
                <tr>
                        <td>Id</th>
                        <th>Match</th>
                        <th>User</th>
                        <th>Number of seats</th>
                        <th>Status</th>
                        <th>CTA</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tbody>
                
                @foreach( $bookings as $key=> $booking)
                @if($booking->status=='accept'||$booking->status=='pause'||$booking->status=='paid')
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$booking->ticket->matching->club1->name}}-{{$booking->ticket->matching->club2->name}}</d>
                    <td>{{$booking->user->name}}</td>
                    <td>{{$booking->ticket->available}}</td>
                    <td>{{$booking->status}}</td>
                  
             <td>
                @if($booking->status=='pause'||$booking->status=='paid')
              <i class='bx bx-check accept{{$booking->id}}' id="acceptButton" data-id="{{$booking->id}}"></i></a>
             <a href="{{route('cancel_status',['id'=>$booking->id])}}">    <i class='bx bx-trash cancel{{$booking->id}}' id="openDeletePopup"></i></a>
             @endif
             </td>
                </tr>
                @endif
                @endforeach
           

                </tbody>
            </table>
        </div>
    </section>

    <div class="popups">
        <!-- delete -->
        <!-- <div class="popup deletePopup" id="deletePopup">
            <div class="contener">
                <h1>Delete !!</h1>
                <h3>Are you sure you want to delete?</h3>
                <div class="btn-contener">
                    <button class="btn solid btn-danger">Delete</button>
                    <button id="closePopup" class="btn solid btn-secondery">cansel</button>
                </div>
            </div>
        </div> -->
    </div>
    <script src="./assets/js/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
$(document).on('click','#acceptButton',function(event) {
     
        event.preventDefault();
      let id = $(this).data("id");
      $.ajax({
           url: "{{ route('change_status') }}",
           type: 'get',
           dataType: 'json',
           data:{id:id},
           success: function(response){

             if(response['status'] == true){
             Swal.fire({
             icon: 'success',
             title:response['msg']  ,
             showConfirmButton: false,
             timer: 2000
             });

              $('.accept'+response['id']).remove();
              $('.cancel'+response['id']).remove();
         
             }

           
         
            
             }

           
        });
   
  });

</script>






</body>

</html>