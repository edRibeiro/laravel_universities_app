<?php

namespace App\Http\Livewire;

use App\Services\UniversityService;
use Livewire\Component;

class Dashboard extends Component
{
    public $universities;

    public function mount()
    {
        $universities = (new UniversityService())->getUnivercities();
        $this->universities;
    }

    public function render()
    {

        return view('livewire.dashboard');
    }
}
