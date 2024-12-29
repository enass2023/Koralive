<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
<div >
            <div class="contener">
                <div class="forms_contener">
                    <div class="signin_signgup">
                        <h2 class="title">Edit</h2>
                         <form method='post' action="{{route('update',['matching'=>$matching])}}">
                         {{csrf_field()}}
                         
                         <div class="input_field">
                                <i class='bx bx-football'></i>
                                <select name='club2_id' id="First_team">
                                @foreach($clubs as $club)
                                <option    {{ $club->id== $matching->club1_id ? 'selected':"" }} value="{{$club->id}}">{{$club->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input type="number" placeholder="First team score" name='club1_score'  value="{{$matching->club1_score}}">
                            </div>
                            <div class="input_field">
                                <i class='bx bx-football'></i>
                                <select name='club2_id' id="First_team">
                                @foreach($clubs as $club)
                                <option   {{ $club->id== $matching->club2_id ? 'selected':"" }}  value="{{$club->id}}">{{$club->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input type="number" placeholder="second team score" name='club2_score'  value="{{$matching->club2_score}}">
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input type="datetime-local" placeholder="Day"name="when" value="{{$matching->when}}">
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-map-pin'></i>
                                <input type="text" value="{{$matching->stadium}}" placeholder="Staduim" name="stadium" >
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-city'></i>
                                <input type="text" value="{{$matching->city}}"placeholder="City" name="city" >
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-purchase-tag'></i>
                                <input type="number" value="{{$matching->ticket->price}}" placeholder="Price" name="price" >
                            </div>
                            <div class="input_field">
                                <i class='bx bx-street-view'></i>
                                <input type="number" value="{{$matching->ticket->available}}" name="tickets_count">
                            </div>
                            @if($errors->has('errors'))
                        <div style='color:red'>
                       {{ $errors->first()}}
                        </div>
                    @endif
                           <div class="btn-contener">
                            <input type="submit" value="Edit" class="btn solid">
                            <button id="closePopup" class="btn solid btn-secondery"><a href="{{route('destroy_cancel')}}">cancel</a></button>
                           </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>