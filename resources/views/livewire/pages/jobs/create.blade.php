<div>
    <div class="container py-4 mx-auto">
        <div class="flex items-center justify-between my-6">
            <h1 class="text-3xl font-bold">Create new job posting</h1>
        </div>

        <form method="POST" wire:submit.prevent="store">
            <div class="flex mt-6 space-x-6">
                <div class="w-2/3 p-6 shadow">
                    <h1 class="mb-6 text-2xl font-bold">Job details</h1>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="form.title" name="title"
                            placeholder="Job title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('form.title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" wire:model="form.description" name="description" placeholder="Job description"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
                        @error('form.description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <div class="mb-4">
                                <label for="experience"
                                    class="block text-sm font-medium text-gray-700">Experience</label>
                                <input type="text" id="experience" wire:model="form.experience" name="experience"
                                    placeholder="Eg. 1-2 Yrs"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @error('form.experience')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" id="location" wire:model="form.location" name="location"
                                    placeholder="Eg. Remote, Pune"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @error('form.location')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="mb-4">
                                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                                <input type="text" id="salary" wire:model="form.salary" name="salary"
                                    placeholder="Eg. 2.75 - 5 Lacs PA"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @error('form.salary')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="extra_info" class="block text-sm font-medium text-gray-700">Extra
                                    Info</label>
                                <input type="text" id="extra_info" wire:model="form.extra_info" name="extra_info"
                                    placeholder="Eg. Full Time, Urgent / Part Time, Flexible"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                @error('form.extra_info')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/3 p-6 shadow">
                    <h1 class="mb-6 text-2xl font-bold">Company details</h1>
                    <div class="mb-4">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" id="company_name" wire:model="form.company_name" name="company_name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('form.company_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="company_logo" class="block text-sm font-medium text-gray-700">Logo</label>
                        <input type="file" id="company_logo" wire:model="form.company_logo" name="company_logo"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('form.company_logo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                        <select id="skills" wire:model="form.skills" name="skills[]" multiple
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                        @error('form.skills')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" wire:loading.attr="disabled"
                    class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 disabled:bg-gray-400 disabled:cursor-not-allowed">Save</button>
                <span wire:loading class="ml-2 text-gray-500">Submitting...</span>
            </div>
        </form>

    </div>
</div>
