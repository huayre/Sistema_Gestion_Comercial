<?php

namespace Modules\Compras\Http\Livewire;
use Livewire\Component;

class Contador extends Component
{   
    public $count = 10;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('compras::proveedor.contador');
    }
}
