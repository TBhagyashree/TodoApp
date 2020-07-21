<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\step;
class EditStep extends Component
{
    public function mount($steps){
        $this->steps = $steps->toArray();
    }
    public $steps = [];
    public  function increment(){
        $this->steps[] = count($this->steps);
    }
    public  function decrement($index){

        $step = $this->steps[$index];
        if(isset($step['id'])){
            Step::find($step['id'])->delete();
        }
        unset($this->steps[$index]);
    }
    public function render()
    {
        return view('livewire.edit-step');
    }
}
