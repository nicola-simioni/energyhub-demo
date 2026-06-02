<div>
    <input 
        type="text" 
        wire:model.live="search" 
        placeholder="Cerca siti..."
    />

    <ul>
        @foreach($sites as $site)
            <li>{{ $site->name }} — {{ $site->location }}</li>
        @endforeach
    </ul>
</div>