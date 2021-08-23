<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Formulir extends Component
{

    public $datas = [
        [
            'optionOpen' => false,
            'isCheck' => false,
            'type' => 'singkat',
            'isFill' => false,
            'question' => '',
            'singkat' => '',
            'paragraf' => '',
            'ganda' => [
                ['option' => 'Opsi'],
            ],
            'centang' => [
                ['option' => 'Opsi'],
            ],
            'dropdown' => [
                ['option' => 'Opsi'],
            ]
        ]
    ];

    public function getDatas()
    {
        dd($this->datas);
    }

    public function handleDeleteQuestion($index){
        unset($this->datas[$index]);
        $this->datas = array_values($this->datas);
    }

    public function handleDeleteOption($index, $i, $type){
        unset($this->datas[$index][$type][$i]);
        $this->datas[$index][$type] = array_values($this->datas[$index][$type]);
    }

    public function addOption($index, $type){
        $this->datas[$index][$type][] = ['option' => 'Opsi'];
    }

    public function render()
    {
        return view('livewire.formulir')->layout('layouts.layout-app');
    }
}
