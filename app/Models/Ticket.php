<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'matching_id',
        'price',
        'class',
         
        'tickets_count',         
        
    ];


    public function bookings()
    {

        return $this->hasMany(Booking::class);
    }
    public function matching()
    {

        return $this->belongsTo(Matching::class);
    }

    protected $appends=['available'];
    public function getAvailableAttribute(){
      $bookings=$this->bookings()->where('status',"=",'paid')->count();
      $available_seats=$this->tickets_count-$bookings;
      return $available_seats;
    }



    

}
