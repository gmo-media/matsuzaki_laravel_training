<?php

namespace App\Traits;

trait HistoryTrait
{
    /**
     * 履歴をセッションに保存
     *
     * @param mixed $item
     * @return void
     */
    public function addToHistory(mixed $item): void
    {
        $history = session('history', []);
        $history[] = [
            'item' => $item,
            'timestamp' => now()->toDateTimeString(),
        ];
        session(['history' => $history]);
    }

    /**
     * 履歴を取得
     *
     * @return array
     */
    public function getHistory(): array
    {
        return session('history', []);
    }

    /**
     * 履歴をクリアする
     */
    public function clearHistory(): void
    {
        session()->forget('history');
    }
}
