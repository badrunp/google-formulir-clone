<?php

namespace App\Http\Livewire;

use App\Models\Form;
use Livewire\Component;

class FormulirAnswer extends Component
{

    public $form;
    public $answers;
    public $paginate = -1;
    public $numbers = [];
    public $number = 1;

    public function mount(Form $form){
        $this->form = $form;
        $this->answers = $form->answers->load('question')->load('option')->groupBy(['user_id', function($item){
            return $item['question_id'];
        }], $preserveKeys = true)->toArray();
        $first = $this->numbers = $form->answers()->distinct()->pluck('user_id')->toArray();
        if($first){
            $this->paginate = $first[0];
        }
    }

    public function previous(){
        $number = array_search($this->paginate, $this->numbers);
        if($number != 0 && $this->paginate != -1){
            $this->number = $this->number -1;
            $this->paginate = $this->numbers[$number-1];
        }else{
            return;
        }
    }

    public function next(){
        $number = array_search($this->paginate, $this->numbers);
        if($number != count($this->numbers)-1 && $this->paginate != -1){
            $this->number = $this->number +1;
            $this->paginate = $this->numbers[$number+1];
        }else{
            return;
        }
    }

    public function render()
    {  
        // dd($this->answers);
        return view('livewire.formulir-answer')->layout('layouts.layout-app');
    }
}
