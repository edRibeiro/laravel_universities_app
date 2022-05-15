<?php

namespace App\Console\Commands;

use App\Models\University;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class ImportUniversities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'universities:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para importar Univercidades consumindo o endpoint: http://universities.hipolabs.com/search?country=United+States';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('http://universities.hipolabs.com/search', ['country' => 'United States']);
        
        $array = collect((array) json_decode($response->getBody()));

        $bar = $this->output->createProgressBar(100);

        for ($i = 0; $i < 100; $i++) {
            $university = new University();
            $university->alpha_two_code = $array[$i]->alpha_two_code;
            $university->domains = $array[$i]->domains[0];
            $university->country = $array[$i]->country;
            $university->web_pages = $array[$i]->web_pages[0];
            $university->name = $array[$i]->name;
            $university->status = University::STATUS_APPROVED;
            $university->save();
            $bar->advance();
        }
        $bar->finish();

        return 0;
    }
}
