<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class Home extends Component
{
    public $forms;

    public function mount(){
        if(auth()->check()){
            $this->forms = Form::where('user_id', auth()->user()->id)->get();
        }
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.layout-app');
    }
}
