<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormulirResponse extends Component
{
    public function render()
    {
        if(!session()->has('url') || !session()->has('send_success')){
            abort(404);
        }
        return view('livewire.formulir-response')->layout('layouts.layout-app');
    }
}
