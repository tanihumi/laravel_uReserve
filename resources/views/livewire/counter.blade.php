<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    <br><br>

    こんにちは、{{ $name }}さん<br>
    <input type="text" wire:model="name"><br>
    <button wire:mouseover="mouseOver">マウス合わせて</button>
</div>