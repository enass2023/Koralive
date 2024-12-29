<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="popup">
        <div class="popup addPopup">
            <div class="contener">
                <div class="forms_contener">
                    <div class="signin_signgup">
                        <h2 class="title">Add</h2>
                        <form action="{{route('add_match')}}"  method='post'class="sign_in">
                        {{csrf_field()}}
                            <div class="input_field">
                                <i class='bx bx-football'></i>
                                <select name='club1_id' id="First_team">
                                @foreach($clubs as $club)
                                <option  selected  value="{{$club->id}}">{{$club->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input  placeholder="First team score" name='club1_score'>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-football'></i>
                                <select name='club2_id' id="First_team">
                                @foreach($clubs as $club)
                                <option  selected  value="{{$club->id}}">{{$club->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input type="number" placeholder="Second team score" name='club2_score'>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-notepad'></i>
                                <input type="datetime-local" placeholder="Day" name='when'>
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-map-pin'></i>
                                <input   placeholder="Stadium"  name='stadium'>
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-city'></i>
                                <input type="text" placeholder="city"  name='city'>
                            </div>
                            <div class="input_field">
                                <i class='bx bxs-purchase-tag'></i>
                                <input type="number" placeholder="Ticket Price"  name='price'>
                            </div>
                            <div class="input_field">
                                <i class='bx bx-street-view'></i>
                                <input type="number" placeholder="Total seats" name='tickets_count'>
                            </div>
                            @if($errors->has('errors'))
                        <div style='color:red'>
                       {{ $errors->first()}}
                        </div>
                    @endif
                            <div class="btn-contener">
                                <input type="submit" value="add" class="btn solid">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>