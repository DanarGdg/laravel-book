<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function scopeFilter($query, array $filters){
        
        if(isset ($filters['search']) ? $filters['search'] : false){
            return$query->where('nama', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('merk', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('harga', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('release', 'like', '%' . $filters['search'] . '%');
        }

        if(isset ($filters['publisher']) ? $filters['publisher'] : false){
            return$query->where('publisher_id', $filters['publisher']);
        }
    }
}
