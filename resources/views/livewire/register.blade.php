<div>
    <form wire:submit.prevent="register">
        <label for="name">名前</label>
        <input id="name" type="text" wire:model="name">
        @error('name') <span class="error text-red-400">{{ $message }}</span> @enderror
        <br>
        <label for="email">メール</label>
        <input id="email" type="email" wire:model="email">
        @error('email') <span class="error text-red-400">{{ $message }}</span> @enderror
        <br>
        <label for="password">パスワード</label>
        <input id="password" type="password" wire:model="password">
        @error('password') <span class="error text-red-400">{{ $message }}</span> @enderror
        <br>
        <button>登録する</button>
    </form>
</div>