<?php


namespace App\Services;


use App\TravellingRoutes;
use Illuminate\Database\QueryException;

class TravellingRoutesService
{
    protected $bool = True;
    protected $error = null;

    public function __construct()
    {
    }

    public function create_travelling_routes(TravellingRoutes $travelling_routes)
    {
        // Validate data.
        $validator = $travelling_routes->travelling_routes_validator();
        if ($validator->fails()) {
            $this->bool = False;
            $this->error = $validator->errors();
            return collect(['success' => $this->bool, 'errors' => $this->error]);
        }
        /*
         * save travelling_routes object
         */
        try {
            if ($travelling_routes->save()) {
                $this->error = null;
                $this->bool = True;
            }
        } catch (QueryException $exception) {
            $this->error = $exception->getMessage();
            $this->bool = False;
        }
        return collect(['success' => $this->bool, 'errors' => $this->error]);
    }

    public function get_travelling_routes()
    {
        $travelling_routes = TravellingRoutes::all();
        return collect(['success' => $this->bool, 'errors' => $this->error, 'data' => $travelling_routes]);
    }
}
