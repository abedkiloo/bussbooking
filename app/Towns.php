<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class Towns extends Model
{
    protected $table = 'towns';


    protected $fillable = ['name', 'status'];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function town_validator()
    {
        $data = array(
            'name' => $this->name,
            'status' => $this->status,
        );

        $rules = array(
            'name' => ['required'],
        );

        return Validator::make($data, $rules);
    }
}
