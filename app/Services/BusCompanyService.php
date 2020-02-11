<?php


namespace App\Services;


use App\BusCompanies;
use Illuminate\Database\QueryException;

class BusCompanyService
{
    protected $bool = True;
    protected $error = null;

    public function __construct()
    {
    }

    public function create_companies(BusCompanies $busCompanies)
    {
        // Validate data.
        $validator = $busCompanies->bus_company_validator();
        if ($validator->fails()) {
            $this->bool = False;
            $this->error = $validator->errors();
            return collect(['success' => $this->bool, 'errors' => $this->error]);
        }
        /*
         * save towns object
         */
        try {
            if ($busCompanies->save()) {
                $this->error = null;
                $this->bool = True;
            }
        } catch (QueryException $exception) {
            $this->error = $exception->getMessage();
            $this->bool = False;
        }
        return collect(['success' => $this->bool, 'errors' => $this->error]);
    }

    public function get_bus_companies()
    {
        $towns = BusCompanies::all();
        return collect(['success' => $this->bool, 'error' => $this->error, 'data' => $towns]);
    }
}
