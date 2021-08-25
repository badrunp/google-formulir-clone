<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class FormulirAnswer extends Component
{

    public $form;
    public $answers;
    public $paginate = 925762205;
    public $numbers = [];
    // public $questions;

    public function mount(Form $form){
        $this->form = $form;
        $this->answers = $form->answers->load('question')->load('option')->groupBy(['user_id', function($item){
            return $item['question_id'];
        }], $preserveKeys = true)->toArray();
        $this->numbers = $form->answers()->distinct()->pluck('user_id')->toArray();
    }

    public function previous(){
        $number = array_search($this->paginate, $this->numbers);
        if($number != 0){
            $this->paginate = $this->numbers[$number-1];
        }else{
            return;
        }
    }

    public function next(){
        $number = array_search($this->paginate, $this->numbers);
        if($number != count($this->numbers)-1){
            $this->paginate = $this->numbers[$number+1];
        }else{
            return;
        }
    }

    public function render()
    {
        // dd($this->numbers);
        return view('livewire.formulir-answer')->layout('layouts.layout-app');
    }
}
