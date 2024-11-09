<?php

namespace App\Services;

use App\Services\OmikujiInterface;
use App\Traits\Loggable;

class FortuneService implements OmikujiInterface
{
    use Loggable;
    private $messages = [];
    protected array $fortunes =
        [
            '大吉',
            '中吉',
            '小吉',
            '凶',
            '大凶'
        ];

    public function __set($name, $value)
    {
        $this->messages[$name] = $value;
    }

    public function __get($name)
    {
        return $this->messages[$name] ?? "メッセージが設定されていません。";
    }

    public function draw(): string
    {
        // 通常のおみくじ
        if () {

        }
        $result = $this->fortunes[array_rand($this->fortunes)];
        $this->logInfo("Fortune drawn: $result");
        $message = self::getMessages($result);


        return "$result - " . $message;
    }

    public function getMessages($result): string
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
