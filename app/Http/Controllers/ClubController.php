<?php

namespace App\Http\Controllers;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Traits\FileUploader;
class ClubController extends Controller
{
    use FileUploader;
   public function store(Request $request)
   {

    $logo=$this->uploadImagePublic2($request,'club','logo');
    
    $club=Club::create([

        'name'=>$request->input('name'),
        'logo'=>$logo,
    

    ]);

// echo "fcyc";


   }
}
