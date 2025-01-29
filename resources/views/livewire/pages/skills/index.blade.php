<div>
    <div class="container py-4 mx-auto">
        <div class="flex items-center justify-between my-6">
            <h1 class="text-3xl font-bold">Skills</h1>
        </div>

        <div class="flex space-x-6">
            <!-- Left Section: List of Skills -->
            <div class="w-2/3">

                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-3 rounded-t-lg bg-gray-50">
                        <h2 class="text-xl font-semibold">Name</h2>
                    </div>
                    <div>
                        <ul>
                            @forelse ($skills as $skill)
                                <li wire:key="skill-{{ $skill->id }}" wire:transition.duration.500ms
                                    class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                                    <span>{{ $skill->name }}</span>
                                    <div>
                                        <a href="#" wire:click.prevent="edit({{ $skill->id }})"
                                            class="mr-2 text-blue-500 hover:underline">Edit</a>

                                        <a href="#" wire:click.prevent="delete({{ $skill->id }})"
                                            class="text-red-500 hover:underline"
                                            wire:confirm="Are you sure you want to delete this skill?"
                                            wire:loading.attr="disabled">
                                            Delete
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <li class="px-6 py-4">No skills found.</li>
                            @endforelse
                        </ul>

                    </div>
                    @if ($skills->hasPages())
                        <div class="px-6 py-3">
                            {{ $skills->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Section: Create Skill Form -->
            <div class="w-1/3">
                <div class="p-6 bg-white rounded-lg shadow">
                    <h2 class="mb-6 text-2xl font-semibold">Add new skill</h2>
                    <form wire:submit.prevent="store">
                        <div class="mb-4">
                            <label for="skill_name" class="block mb-2 text-gray-700">Name</label>
                            <input type="text" id="skill_name" wire:model="form.name" placeholder="Skill name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('form.name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
