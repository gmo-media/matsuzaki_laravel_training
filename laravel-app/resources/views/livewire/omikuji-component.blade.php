<div>
    <h1>おみくじを引く</h1>
    <button class="btn btn-primary" wire:click="draw">おみくじを引く</button>
    <button class="btn btn-primary" wire:click="drawPaid">100円でおみくじを引く</button>
    <p>結果: {{ $result }}</p>
</div>
