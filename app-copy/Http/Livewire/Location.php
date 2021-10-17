<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Builder;

use Livewire\Component;

class Location extends Component
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function render()
    {
        return view('livewire.location');
    }
}
