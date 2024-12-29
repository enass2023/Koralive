<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Matching;
use App\Models\User;
use App\Models\Club;
use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class MatchingController extends Controller
{
    public function indexBy()

    { 
   
    $date_now=Carbon::now()->format('Y-m-d');
    $today_matchings=Matching::whereDate('when','=',$date_now)->get();
    $next_matchings=Matching::whereDate('when','>',$date_now)->get();
    $last_matchings=Matching::whereDate('when','<',$date_now)->get();
    return view('welcome',['today_matchings'=>$today_matchings,'next_matchings'=> $next_matchings,'last_matchings'=>$last_matchings]);

}

public function show($id)
{

 $matching=Matching::find($id);
  
 return view('details',['matching'=>$matching]);


}


public function create(){
    $clubs=Club::all();
    return view('add',['clubs'=> $clubs]);
   
   }
   

    public function store(Request $request)
    {


        $validate = Validator::make($request->all(),[
        'when' => 'required',
        'club1_id' => 'required|exists:clubs,id',
        'club2_id' =>'required|exists:clubs,id',
          'city'=>'required|string',
          'stadium'=>'required|string' ,
          'club1_score'=>'integer|min:0|max:10',
          'club2_score'=>'integer|min:0|max:10',
          'price'=>'required|numeric|min:1',
        'tickets_count'=>'required|integer|min:1'  ]);
        if($validate->fails()){
            return redirect()->back()->withErrors(['errors'=>$validate->errors()->first()]);    
            }

    $matching=Matching::create($request->all());

    $ticket=Ticket::create([
        'matching_id'=>$matching->id,
        'price'=>$request->input('price'),
        'tickets_count'=>$request->input('tickets_count'),
       

    ]);
    return redirect()->to(route('dashboard'));    

    }





    
    public function index()
    {
    $users=User::all();
    $matchings=Matching::all();
    $bookings=Booking::all();
    return view ('admin',['matchings'=> $matchings,'users'=>$users,'bookings'=>$bookings]);
    }


    public function update($matching,Request $request):object
    {
        $validate = Validator::make($request->all(),[
           
            'club1_id' => 'exists:clubs,id',
            'club2_id' =>'exists:clubs,id',
              'city'=>'string',
              'stadium'=>'string' ,
              'club1_score'=>'integer|min:0|max:10',
              'club2_score'=>'integer|min:0|max:10',
              'price'=>'numeric|min:1',
            'tickets_count'=>'integer|min:1'  ]);
            if($validate->fails()){
                return redirect()->back()->withErrors(['errors'=>$validate->errors()->first()]);    
                }

        $matching=Matching::find($matching);
        $input=$request->all();
       $input['city']=request('city',$matching->city);
       $input['price']=request('price',$matching->ticket->price);
       $input['tickets_count']=request('tickets_count',$matching->ticket->tickets_count);
       $input['stadium']=request('staduim',$matching->city);
       $input['club1_score']=request('club1_score',$matching->club1_score);
       $input['club2_score']=request('club2_score',$matching->club2_score);
        $matching->update($input);
        $matching->ticket->price=$input['price'];
        $matching->ticket->tickets_count=$input['tickets_count'];
        $matching->ticket->save();
        return redirect()->to(route('dashboard'));

    }
     

    public function edit(Matching $matching){
     
        $clubs=Club::all();
        return view('edit',['clubs'=>$clubs,'matching'=>$matching]);
        
        }
    


        public function delete($id){


            $matching=Matching::findOrFail($id);
            return view('delete_match',['matching'=>$matching]);
           }












    public function destroy(Matching $matching)
    {
     
    
        $matching->delete();
        return redirect()->to(route('dashboard'));

    }







}