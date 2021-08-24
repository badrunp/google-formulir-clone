<?php

namespace App\Http\Livewire;

use App\Models\Form;
use App\Models\Question;
use Livewire\Component;

class Formulir extends Component
{

    public $title = 'Formulir tanpa judul';
    public $description = '';
    public $forms;
    public $type = 'create';

    public $datas = [
        [
            'type' => 'singkat',
            'requiredfill' => false,
            'question' => '',
            'options' => [
                ['option' => 'Opsi 1']
            ]
        ]
    ];

    protected $queryString = ['forms'];

    public function mount()
    {
        if ($this->forms != '') {
            $form = Form::where('has', $this->forms)->first();
            if ($form) {
                if ($form->user_id == auth()->user()->id) {
                    $this->title = $form->title;
                    $this->description = $form->description;
                    $this->type = 'update';
                    $this->datas = [];
                    foreach ($form->questions()->get(['id', 'question', 'type', 'requiredfill']) as $item) {
                        $this->datas[] = [
                            'id' => $item->id,
                            'type' => $item->type,
                            'requiredfill' => $item->requiredfill == 1 ? true : false,
                            'question' => $item->question,
                            'options' => $item->options()->get(['id', 'option', 'question_id'])->toArray() ?? []
                        ];
                    }
                } else {
                    return redirect()->route('formulir.store');
                }
            } else {
                return redirect()->route('formulir.store');
            }
        }
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'datas.*.question' => 'required'
        ];
    }

    protected $validationAttributes = [
        'title' => 'Judul',
        'datas.*.question' => 'Pertanyaan'
    ];

    public function getDatas()
    {
        dd($this->datas);
    }

    public function handleDeleteQuestion($index)
    {
        unset($this->datas[$index]);
        $this->datas = array_values($this->datas);
    }

    public function handleDeleteOption($index, $i)
    {
        unset($this->datas[$index]['options'][$i]);
        $this->datas[$index]['options'] = array_values($this->datas[$index]['options']);
    }

    public function addOption($index)
    {
        $this->datas[$index]['options'][] = ['option' => 'Opsi'];
    }

    public function store()
    {
        $this->validate();

        if ($this->type == 'create') {
            $rand = rand(111111111, 999999999);
            $formId = Form::where('has', $rand)->first();
            if ($formId) {
                $rand = rand(111111111, 999999999);
            }

            $form = auth()->user()->forms()->create([
                'title' => $this->title,
                'description' => $this->description,
                'has' => $rand
            ]);

            foreach ($this->datas as $item) {
                $question = Question::create([
                    'question' => $item['question'],
                    'type' => $item['type'],
                    'requiredfill' => $item['requiredfill'],
                    'form_id' => $form->id
                ]);
            }
        } else if ($this->type == 'update') {

            $form = Form::where('has', $this->forms)->first();
            $form->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);

            foreach ($this->datas as $item) {
                if ($item['id'] != '') {
                    $question = Question::where('id', $item['id'])->first();
                    $question->update([
                        'question' => $item['question'],
                        'type' => $item['type'],
                        'requiredfill' => $item['requiredfill'],
                    ]);

                    if($item['type'] == 'ganda' || $item['type'] == 'centang' || $item['type'] == 'dropdown'){
                        if(isset($item['options'])){
                            $question->options()->delete();
                            foreach($item['options'] as $option){
                                $question->options()->create([
                                    'option' => $option['option']
                                ]);
                            }
                        }
                    }
                } else {
                    $question = Question::create([
                        'question' => $item['question'],
                        'type' => $item['type'],
                        'requiredfill' => $item['requiredfill'],
                        'form_id' => $form->id
                    ]);
                    if($item['type'] == 'ganda' || $item['type'] == 'centang' || $item['type'] == 'dropdown'){
                        if(isset($item['options'])){
                            $question->options()->delete();
                            foreach($item['options'] as $option){
                                $question->options()->create([
                                    'option' => $option['option']
                                ]);
                            }
                        }
                    }
                }
            }
        } else {
            abort(404);
        }

        $this->dispatchBrowserEvent('success', ['text' => 'Success, formulir berhasil direkam']);
    }

    public function render()
    {
        return view('livewire.formulir')->layout('layouts.layout-app');
    }
}
