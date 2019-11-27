<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    /**
     * @var string
     */
    protected $table = 'students';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'age', 'kecamatan','city', 'password', 'username', 'dob', 'address', 'telephone'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'dob'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(StudentImage::class);
    }

    // public function setPasswordAttribute($value) {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value;
        $this->attributes['age'] = Carbon::parse($value)->age;
    }



}
