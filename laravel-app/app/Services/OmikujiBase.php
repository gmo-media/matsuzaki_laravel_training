<?php

namespace App\Services;

use App\Traits\Loggable;
use App\Traits\HistoryTrait;

abstract class OmikujiBase implements OmikujiInterface
{
    use Loggable;
    use HistoryTrait;

    public $result;

    // 確率の重みを持つ
    protected array $fortunes = [
        '大吉' => 10,
        '中吉' => 30,
        '小吉' => 50,
        '凶' => 7,
        '大凶' => 3,
    ];

    /**
     * おみくじの結果を返す
     * @param bool $isBilling 課金かどうか
     * @return string
     */
    public function draw(bool $isBilling = false): string
    {
        $adjustedFortunes = $isBilling ? $this->isBilling() : $this->fortunes;

        $result = $this->weightRandom($adjustedFortunes);
        $this->result =  "$result - " .$this->getMessage($result);
        $this->addToHistory($this->result);
        return $this->result;
    }

    /**
     * 課金時の確率調整
     */
    public function isBilling(): array
    {
        $fortunes = $this->fortunes;

        // 課金時は大吉の重みを増加する
        $fortunes['大吉'] += 10;

        // 大凶の重みを減少させる
        $fortunes['大凶'] -= 2;

        return $fortunes;
    }

    /**
     *  重みに基づいて結果を返す
     * @param string $result おみくじの結果
     * @return string
     */
    protected function weightRandom(array $items): string
    {
        $totalWeight = array_sum($items);
        $random = rand(1, $totalWeight);

        foreach ($items as $item => $weight) {
            $random -= $weight;
            if ($random <= 0) {
                return $item;
            }
        }
        return '';
    }

    /**
     * 結果のメッセージを返す
     */
    abstract  function getMessage(string $result): string;
}
