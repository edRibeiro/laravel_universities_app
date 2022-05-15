<?php

namespace App\Http\Livewire;

use App\Models\University;
use App\Services\UniversityService;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    public function mount()
    {
        (new UniversityService())->getUnivercities();

    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
