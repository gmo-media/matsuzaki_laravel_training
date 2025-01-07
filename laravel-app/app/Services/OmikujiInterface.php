<?php
namespace App\Services;

interface OmikujiInterface
{
    /**
     * おみくじを引く
     * @param bool $isBilling 課金かどうか
     * @return string 結果
     */
    public function draw(bool $isBilling = false): string;

    /**
     * 結果に応じたメッセージを返す
     * @param string $result おみくじの結果
     * @return string メッセージ
     */
    public function getMessage(string $result): string;
}
