<?php

namespace App\Services;

use App\Models\University;
use Illuminate\Support\Facades\Http;

class UniversityService
{
    private $universities;

    public function __construct()
    {

    }

    private function syncUniversities()
    {
        $response = Http::get('http://universities.hipolabs.com/search', ['country' => 'United States']);

        $array = (array) json_decode($response->getBody());

        for ($i = 0; $i < 100; $i++) {
            $university = new University();
            $university->alpha_two_code = $array[$i]->alpha_two_code;
            $university->domains = $array[$i]->domains[0];
            $university->country = $array[$i]->country;
            $university->web_pages = $array[$i]->web_pages[0];
            $university->name = $array[$i]->name;
            $university->status = University::STATUS_APPROVED;
            $university->save();
        }

    }

    public function getUnivercities($paginated = true, $perpage=10)
    {
        if(University::count() === 0){
            $this->syncUniversities();
        }
        if($paginated){
            return University::whereStatusApproved()->paginate($perpage);
        }
        return University::all();
    }
}
