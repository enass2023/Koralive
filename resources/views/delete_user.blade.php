<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Document</title>
</head>
<body>
<div   id="deletePopup">
            <div class="contener">
                <h1>Delete !!</h1>
                <h3>Are you sure you want to delete?</h3>
                <div class="btn-contener">
                  <a href="{{route('destroy_user',['user'=>$user])}}"> <button class="btn solid btn-danger">Delete</button></a>

                 
                   <a href="{{route('destroy_cancel')}}">   <button id="closePopup" class="btn solid btn-secondery">cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>