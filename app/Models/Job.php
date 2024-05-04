<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Job extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'salary', 'employer_id'];
    /*
    stop fillable ---> protected $guarded = [];
    */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
?>
