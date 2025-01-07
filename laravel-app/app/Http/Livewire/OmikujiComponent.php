<?php

namespace App\Http\Livewire;

use App\Services\OmikujiInterface;
use Livewire\Component;

class OmikujiComponent extends Component
{
    public $result;
    protected OmikujiInterface $omikuji;

    public function mount(OmikujiInterface $omikuji)
    {
        $this->omikuji = $omikuji;
    }

    public function hydrate()
    {
        $this->omikuji = app(OmikujiInterface::class); // リクエストごとに再初期化
    }

    public function draw()
    {
        $this->result = $this->omikuji->draw();
    }

    public function drawPaid()
    {
        $this->result = $this->omikuji->draw(true);
    }

    public function render()
    {
        return view('livewire.omikuji-component');
    }
}
