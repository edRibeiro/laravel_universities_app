<?php

namespace App\Http\Livewire\Universities;

use App\Models\University;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.universities.create');
    }

    public User $user;
    public University $university;

    protected function rules()
    {
        return [
            'university.name' => 'required|string',
            'university.domains' => 'required|string',
            'university.web_pages' => 'required|string',
            'university.country' => 'required|string',
            'university.alpha_two_code' => 'required|string',
        ];
    }

    protected $messages = [

        'name.required' => 'The Name cannot be empty.',
        'domains.required' => 'The Domain cannot be empty.',
        'web_pages.required' => 'The Site cannot be empty.',
        'country.required' => 'The Country cannot be empty.',
        'alpha_two_code.required' => 'The Country Code cannot be empty.',

    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->university = new University();
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->university->status = University::STATUS_PENDING;
        $this->university->suggested_by = $this->user->id;
        $this->university->save();
        session()->flash('status', ['message' => 'University successfully created.']);
        return redirect()->route('dashboard');
    }
}
