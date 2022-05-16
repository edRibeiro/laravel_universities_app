<?php

namespace App\Http\Livewire;

use App\Models\University;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;

    public User $user;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->user = User::with(['universities', 'suggesteds'])->find(auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.profile', ['universities' => $this->user->universities()->paginate(3, ['*'], 'universitiesPage'), 'suggesteds' => $this->user->suggesteds()->paginate(3, ['*'], 'suggestedsPage')]);
    }

    public function unsubscribe($id)
    {
        $user = User::find(auth()->user()->id);
        $user->load(['universities', 'suggesteds']);
        $user->universities()->detach($id);
        session()->flash('status', ['message' => 'University subiscribe successfully.']);
    }
}
