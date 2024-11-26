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

    public function draw($isBilling = false): string
    {
        if ($isBilling) {
            $isBillingFortunes = array_filter($this->fortunes, function ($fortune) {
                // 課金なら大凶を排除
                return $fortune !== '大凶';
            });

            // 課金なら大吉を2つ追加
            $isBillingFortunes[] = '大吉';
            $isBillingFortunes[] = '大吉';

            $result = $isBillingFortunes[array_rand($isBillingFortunes)];
        } else {
            $result = $this->fortunes[array_rand($this->fortunes)];
        }

        $message = self::getMessages($result);
        $this->logInfo("Fortune drawn: $result");

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
