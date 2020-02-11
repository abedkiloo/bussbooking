<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BusCompanies extends Model
{
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function bus_company_validator()
    {
        $data = array(
            'name' => $this->name,
            'description' => $this->descripton,
            'image' => $this->image,
            'status' => $this->status,
        );

        $rules = array(
            'name' => ['required'],
//            'image' => ['mimes:jpeg,png,bmp,tiff |max:4096'],
        );

        return Validator::make($data, $rules);
    }
}
