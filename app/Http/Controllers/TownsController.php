<?php

namespace App\Http\Controllers;

use App\Services\TownsService;
use App\Towns;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsFalse;

class TownsController extends Controller
{

    /**
     * @var TownsService
     */
    protected $townsService;

    public function __construct(TownsService $townsService)
    {
        $this->townsService = $townsService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * function to help to create towns data
     */
    public function create_town(Request $request)
    {
        /*
         * creating new towns model
         */
        $new_town = new Towns();
        $new_town->name = $request->name;
        $new_town->status = $request->status;
        /*
         * submit creating new town to service
         */
        $create_town = $this->townsService->create_towns($new_town);
        if ($create_town['success'] == false) {
            return api_response(false, $create_town['errors'], 1, 'failed',
                'Cannot create town', null, 500);
        } else {
            return api_response(true, null, 0, 'success',
                'Created create town', null, 201);
        }
    }

    /**
     * function to get all towns data
     */
    public function fetch_towns()
    {
        return api_response(true, null, 0, 'success',
            'Created create town', $this->townsService->get_towns()['data'], 200);

    }
}
