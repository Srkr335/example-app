<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $guarded = [];
    protected $hidden = ['user_id'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }



    public function getDateOfBirthFormattedAttribute()
    {
        return date('d-M-Y', strtotime($this->date_of_birth));
    }

    public function getDateOfBirthAttribute($value){
        $this->attributes['date_of_birth']= date('Y-m-d',strtotime($value));
    }






    public function getStatusTextAttribute()
    {
        return $this->status === 1 ? 'Active' : 'Inactive';
    }

    protected $appends = ['date_of_birth_formatted', 'status_text'];
}