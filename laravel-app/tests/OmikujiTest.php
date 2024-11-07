<?php

use PHPUnit\Framework\TestCase;
use App\Services\FortuneService;
use Illuminate\Support\Facades\Log;

class OmikujiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Log::shouldReceive('info')->andReturnNull();  // Logファサードのモックを設定
    }

    public function testOmikujiResultNotEmpty()
    {
        $omikuji = new FortuneService();
        $result = $omikuji->draw();
        $this->assertNotEmpty($result);
    }

    public function testDrawReturnsExpectedFortunes()
    {
        $omikuji = new FortuneService();
        $result = $omikuji->draw();
        $exceptedFortunes = ['大吉 - 今日は最高の日です！', '中吉 - 今日はいい日です！', '小吉 - 今日は普通の日です！', '凶 - 今日は悪い日です！', '大凶 - 今日は最悪の日です！'];
        $this->assertContains($result, $exceptedFortunes, "おみくじ以外の値が返されています");
    }

    public function testDrawRandomness()
    {
        $omikuji = new FortuneService();
        $results = [];
        for ($i = 0; $i < 100; $i++) {
            $results[] = $omikuji->draw();
        }
        $uniqueResults = array_unique($results);
        $this->assertGreaterThan(1, count($uniqueResults), "おみくじの結果が偏っています");
    }
}
