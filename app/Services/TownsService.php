<?php


namespace App\Services;


use App\Towns;
use Illuminate\Database\QueryException;

class TownsService
{
    protected $bool = True;
    protected $error = null;

    public function __construct()
    {
    }

    public function create_towns(Towns $towns)
    {
        // Validate data.
        $validator = $towns->town_validator();
        if ($validator->fails()) {
            $this->bool = False;
            $this->error = $validator->errors();
            return collect(['success' => $this->bool, 'errors' => $this->error]);
        }
        /*
         * save towns object
         */
        try {
            if ($towns->save()) {
                $this->error = null;
                $this->bool = True;
            }
        } catch (QueryException $exception) {
            $this->error = $exception->getMessage();
            $this->bool = False;
        }
        return collect(['success' => $this->bool, 'error' => $this->error]);
    }

    public function get_towns()
    {
        $towns = Towns::all();
        return collect(['success' => $this->bool, 'error' => $this->error, 'data' => $towns]);
    }
}
