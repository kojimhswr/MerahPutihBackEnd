<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    /**
     * @var string
     */
    protected $table = 'student_images';

    /**
     * @var array
     */
    protected $fillable = ['student_id', 'full'];

    /**
     * @var array
     */
    protected $casts = [
        'student_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
