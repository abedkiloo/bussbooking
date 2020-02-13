<?php

namespace App\Http\Controllers;

use App\BusCompanies;
use App\Services\BusCompanyService;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BusCompanyController extends Controller
{

    /**
     * @var BusCompanyService
     */
    protected $busCompanyService;

    public function __construct(BusCompanyService $busCompanyService)
    {
        $this->busCompanyService = $busCompanyService;
    }

    /**
     * @param Request $request
     * @return JsonResponseAlias
     *
     * function to help to create bus company data
     */
    public function create_bus_company(Request $request)
    {
        /*
         * creating new towns model
         */
        $new_bus_company = new BusCompanies();
        $new_bus_company->name = $request->name;
        $new_bus_company->status = is_null($request->status) ? 0 : $request->status;
        $new_bus_company->description = $request->description;
        //checking whether the request contains a file which needs to be uploaded
        $location_desc = null;
        if ($request->hasFile('image')) {

            //getting the image and compressing it to obtain a minized image
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $destinationPath = 'public/storage/images';
//            if(!File::exists($destinationPath)) File::makeDirectory($destinationPath, 775);

            $img = Image::make($file)->resize(200, 200);
            //saving the image in a directory
//            $img->save($destinationPath . '/' . $filename);


            $location_desc = $destinationPath . '/' . $filename;
            $new_bus_company->image = $location_desc;

        }

        /*
         * submit creating new town to service
         */
        $create_bus_company = $this->busCompanyService->create_companies($new_bus_company);
        if ($create_bus_company['success'] == false) {
            return api_response(false, $create_bus_company['errors'], 1, 'failed',
                'Cannot create town', null, 500);
        } else {
            return api_response(true, null, 0, 'success',
                'Created create company', null, 201);
        }
    }

    /**
     * function to get all bus companies data data
     */
    public function fetch_companies()
    {
        return api_response(true, null, 0, 'success',
            'Created fetched bus companies', $this->busCompanyService->get_bus_companies()['data'], 200);
    }
}
