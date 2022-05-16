<?php

namespace App\Http\Livewire\Components\Universities;

use App\Models\University;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $search = $this->search;
        if (!empty($search)) {
            $search = "%" . $search . "%";
            return view('livewire.components.universities.table', ['universities' =>  University::where('name', 'like', $search)->paginate(10)]);
        }
        return view('livewire.components.universities.table', ['universities' => University::paginate(10)]);
    }

    public function subiscribe($id)
    {
        $university = University::find($id)->load('users');
        $user = User::find(auth()->user()->id);

        if (!$university->users->contains($user)) {
            $university->users()->attach($user->id);
            session()->flash('status', ['message' => 'University subiscribe successfully.']);
        }
    }
}
