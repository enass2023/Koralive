<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;
    protected $fillable = [
        'when',
        'status',
        'city',
        'club1_id',
        'club2_id',  
        'club1_score', 
        'club2_score',       
        'stadium'
     
    ];
    public function club1(){

        return $this->belongsTo(Club::class,'club1_id');
        
        }
        public function club2(){
    
            return $this->belongsTo(Club::class,'club2_id');
            
            }
            public function ticket(){
    
                return $this->hasOne(Ticket::class);
                
                }



}
