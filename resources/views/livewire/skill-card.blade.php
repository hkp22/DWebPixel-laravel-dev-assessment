<li class="px-6 py-4 border-b border-gray-100">
    @if ($editing)
        <form wire:submit.prevent="update">
            <div class="flex items-center space-x-2">
                <div class="flex-1">
                    <input type="text" wire:model="form.name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('form.name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    Update
                </button>
                <button type="button" wire:click.prevent="cancelEdit"
                    class="px-4 py-2 text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Cancel
                </button>
            </div>
        </form>
    @else
        <div class="flex items-center justify-between">
            <span>{{ $skill->name }}</span>
            <div>
                <button wire:click.prevent="edit()" class="mr-2 text-blue-500 hover:underline">Edit</button>
                <button wire:click.prevent="delete()" wire:confirm="Are you sure you want to delete this skill?"
                    class="text-red-500 hover:underline">
                    Delete
                </button>
            </div>
        </div>
    @endif
</li>
