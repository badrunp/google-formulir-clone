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
                ['jawaban' => ''],
                ['jawaban' => '']
            ]
        ],
        [
            'optionOpen' => false,
            'isCheck' => false,
            'type' => 'singkat',
            'isFill' => false,
            'question' => '',
            'singkat' => '',
            'paragraf' => '',
            'ganda' => ['tiga', 'empat']
        ],
    ];

    public function getDatas()
    {
        dd($this->datas);
    }

    public function render()
    {
        return view('livewire.formulir')->layout('layouts.layout-app');
    }
}
