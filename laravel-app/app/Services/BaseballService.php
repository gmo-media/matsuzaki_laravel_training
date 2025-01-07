<?php

namespace App\Services;

use App\Traits\Loggable;

class BaseballService extends OmikujiBase
{
    use Loggable;
    private $messages = [];
    protected array $fortunes = [
        'ホームラン' => 10,
        'ツーベースヒット' => 20,
        'ヒット' => 50,
        '三振' => 15,
        '併殺打' => 5,
    ];

    public function isBilling(): array
    {
        $fortunes = $this->fortunes;

        $fortunes['ホームラン'] += 10;
        $fortunes['併殺打'] -= 2;

        return $fortunes;
    }

    public function getMessage($result): string
    {
        $fortuneService = new FortuneService();

        if ($result == "ホームラン") {
            $fortuneService->$result = "最高の一発！チームに勢いを与えます！";
        } elseif ($result == "ツーベースヒット") {
            $fortuneService->$result = "ナイスバッティング！ランナーが得点圏に進みました。";
        } elseif ($result == "小吉") {
            $fortuneService->$result = "シングルヒット！出塁成功！";
        } elseif ($result == "三振") {
            $fortuneService->$result = "惜しい！次は頑張りましょう。";
        } elseif ($result == "併殺打") {
            $fortuneService->$result = "不運！攻撃の流れが止まりました！";
        }
        return $fortuneService->$result;
    }
}
