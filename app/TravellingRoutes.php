<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TravellingRoutes extends Model
{
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    public function travelling_routes_validator()
    {
        $data = array(
            'name' => $this->name,
            'company_id' => $this->company_id,
            'from_town_id' => $this->from_town_id,
            'to_town_id' => $this->to_town_id,
            'boarding_points' => $this->boarding_points,
            'fare' => $this->fare,
            'discount' => $this->discount,
            'number_of_seats' => $this->number_of_seats,
        );

        $rules = array(
            'name' => ['string'],
            'departure_time' => ['string'],
            'company_id' => ['required'],
            'from_town_id' => ['required'],
            'to_town_id' => ['required'],
            'fare' => ['fare'],
            'number_of_seats' => ['required'],
            'seats_format' => ['required'],
            'boarding_points' => ['required'],
        );

        return Validator::make($data, $rules);
    }
}
