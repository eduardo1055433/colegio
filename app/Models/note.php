<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 *
 * @property $id
 * @property $nota
 * @property $id_user
 * @property $id_course
 * @property $created_at
 * @property $updated_at
 *
 * @property Course $course
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Note extends Model
{
    
    static $rules = [
		'nota' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nota','id_user','id_course'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Models\Course', 'id', 'id_course');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
