<?php

namespace App\Http\Controllers;

use App\Services\FortuneService;
use App\Services\OmikujiInterface;

class OmikujiController extends Controller
{
    protected FortuneService $omikuji;

    public function __construct(OmikujiInterface $omikuji)
    {
        $this->omikuji = $omikuji;
    }

    public function draw()
    {
        new FortuneService();
        $result = $this->omikuji->draw();
        return response()->json(['result' => $result], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function drawPaid()
    {
        $result = $this->omikuji->draw('lucky');
        return response()->json(['result' => $result], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
