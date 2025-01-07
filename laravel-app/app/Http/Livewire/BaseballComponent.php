<?php

namespace App\Http\Livewire;

use App\Services\BaseballService;
use Livewire\Component;

class BaseballComponent extends Component
{
    public $result;
    protected BaseballService $omikuji;

    public function mount(BaseballService $omikuji)
    {
        $this->omikuji = $omikuji;
    }

    public function hydrate()
    {
        $this->omikuji = app(BaseballService::class);
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
        return view('livewire.baseball-component');
    }
}
