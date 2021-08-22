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
        ],
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
