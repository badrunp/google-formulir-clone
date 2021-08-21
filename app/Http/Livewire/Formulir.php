<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Formulir extends Component
{

    public $datas = [
        [ 
        'nama' => 'Badrun',
        'alamat' => 'Cikijung'
        ],
        [ 
        'nama' => 'Badrun',
        'alamat' => 'Cikijung'
        ],
    ];

    public function getDatas(){
        dd($this->datas);
    }

    public function render()
    {
        return view('livewire.formulir')->layout('layouts.layout-app');
    }
}
