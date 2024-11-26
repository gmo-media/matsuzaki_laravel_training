<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OmikujiInterface;
use Omikuji;

class OmikujiController extends Controller
{
    protected OmikujiInterface $omikuji;

    public function __construct(OmikujiInterface $omikuji)
    {
        $this->omikuji = $omikuji;
    }

    public function draw()
    {
        $result = Omikuji::draw();
        return response()->json(['result' => $result], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function drawPaid()
    {
        $result = $this->omikuji->draw('lucky');
        return response()->json(['result' => $result], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
