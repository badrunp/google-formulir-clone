<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class FormUser extends Component
{

    public $form;
    public $questions = []; 
    public $ganda = [];
    public $centang = [];


    public function mount(Form $form){
        $this->form = $form;
        $this->questions = $form->questions->load('options');
    }

    public function getDatas(){
        dd(array_values([$this->ganda, $this->centang]));
    }

    public function render()
    {
        return view('livewire.form-user')->layout('layouts.layout-app');
    }
}
