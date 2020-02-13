<?php

namespace App\Http\Controllers;

use App\Services\TravellingRoutesService;
use App\TravellingRoutes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TravellingRoutesController extends Controller
{

    /**
     * @var TravellingRoutesService
     */
    protected $travelling_routesService;

    public function __construct(TravellingRoutesService $travelling_routesService)
    {
        $this->travelling_routesService = $travelling_routesService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     * function to help to create travelling_routes data
     */
    public function create_travelling_routes(Request $request)
    {
        /*
         * creating new travelling_routes model
         */
        $new_travelling_route = new TravellingRoutes();
        $new_travelling_route->name = $request->name;
        $new_travelling_route->company_id = $request->company_id;
        $new_travelling_route->from_town_id = $request->from_town_id;
        $new_travelling_route->to_town_id = $request->to_town_id;
        $new_travelling_route->to_town_id = $request->to_town_id;
        $new_travelling_route->boarding_points = $request->boarding_points;
        $new_travelling_route->departure_time = $request->departure_time;
        $new_travelling_route->fare = $request->fare;
        $new_travelling_route->discount = $request->discount;
        $new_travelling_route->number_of_seats = $request->number_of_seats;
        $new_travelling_route->seats_format = $request->seats_format;
        $new_travelling_route->status = is_null($request->status) ? 0 : $request->status;


        /*
         * submit creating new town to service
         */
        $create_town = $this->travelling_routesService->create_travelling_routes($new_travelling_route);
        if ($create_town['success'] == false) {
            return api_response(false, $create_town['errors'], 1, 'failed',
                'Cannot create travelling route', null, 500);
        } else {
            return api_response(true, null, 0, 'success',
                'Created create travelling', null, 201);
        }
    }

    /**
     * function to get all travelling_routes data
     */
    public function fetch_travelling_routes()
    {
        return api_response(true, null, 0, 'success',
            'Fetched create travelling routes', $this->travelling_routesService->get_travelling_routes()['data'], 200);

    }
}
