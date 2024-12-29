<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
class BookingController extends Controller
{
  
    public function store(Request $request,$id){
      
        if ($request->has('payment'))
    {
        $booking=Booking::create([

        'user_id'=>Auth::id(),
        'ticket_id'=>$id,
        'number'=>$request->number,
        'status'=> 'paid'
        ]);
    }
      else{
        $booking=Booking::create([

            'user_id'=>Auth::id(),
            'ticket_id'=>$id,
            'number'=>$request->number,
            'status'=> 'pause'
            ]);
        }
        return redirect()->to(route('home'))->with(['message'=>'your request will be retrieved']);

    }


   public function create($id){

    return view('book',['id'=>$id]);
    }



    public function update(Request $request){
   
        $booking=Booking::find($request->id);
        $booking->update(['status'=> 'accept']);
         return response()->json([
      
            'status'=>true,
            'msg'=>'accept succssfully',
            'id'=>$request->id
             
           ]);

    }
    public function cancel(Request $request,$id){
   
        $booking=Booking::find($id);
       
        $booking->update(['status'=> 'cancel']);
        return redirect()->back();

    }

  
     public function about(){

        return view('about');
     }


}
