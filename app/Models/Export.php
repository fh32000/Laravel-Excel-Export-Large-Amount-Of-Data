<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exports';
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'status',
        'user_id'
    ];

    public function user()
    {;
        return $this->belongsTo(User::class);
    }

}
