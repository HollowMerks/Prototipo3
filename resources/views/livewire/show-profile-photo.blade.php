<div>
    @if($isOpen)
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50" wire:click.self="closeModal">
            <div class="bg-white p-4 rounded shadow-lg max-w-lg max-h-full overflow-auto">
                <img src="{{ $photoUrl }}" alt="Profile Photo" class="max-w-full max-h-screen" />
                <button wire:click="closeModal" class="mt-2 px-4 py-2 bg-red-600 text-white rounded">Close</button>
            </div>
        </div>
    @endif
</div>
