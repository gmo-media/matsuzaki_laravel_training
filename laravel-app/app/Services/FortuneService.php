<?php

namespace App\Services;

use App\Traits\Loggable;

class FortuneService extends OmikujiBase
{
    use Loggable;
    private $messages = [];

    public function isBilling(): array
    {
        $fortunes = $this->fortunes;

        $fortunes['大吉'] += 10;
        $fortunes['大凶'] -= 2;

        return $fortunes;
    }

    public function getMessage($result): string
    {
        $fortuneService = new FortuneService();

        if ($result == "大吉") {
            $fortuneService->$result = "今日は最高の日です！";
        } elseif ($result == "中吉") {
            $fortuneService->$result = "今日はいい日です！";
        } elseif ($result == "小吉") {
            $fortuneService->$result = "今日は普通の日です！";
        } elseif ($result == "凶") {
            $fortuneService->$result = "今日は悪い日です！";
        } elseif ($result == "大凶") {
            $fortuneService->$result = "今日は最悪の日です！";
        }
        return $fortuneService->$result;
    }
}
