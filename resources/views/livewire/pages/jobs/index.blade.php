<div>
    <div class="container py-4 mx-auto">
        <div class="flex items-center justify-between py-8">
            <h1 class="text-2xl font-bold">Jobs</h1>
        </div>
        <div class="w-full">

            @if (session('success'))
                <div wire:transition x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 7000)"
                    class="relative w-1/2 px-4 py-3 mx-auto mb-4 text-green-700 bg-green-100 border border-green-400 rounded"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                        <svg class="w-6 h-6 text-green-500 fill-current" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
                        </svg>
                    </span>
                </div>
            @endif

            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Company Logo</th>
                                <th scope="col" class="px-4 py-3">Company Name</th>
                                <th scope="col" class="px-4 py-3">Experience</th>
                                <th scope="col" class="px-4 py-3">Salary</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Skills</th>
                                <th scope="col" class="px-4 py-3">Extra</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                                <tr wire:key="job-{{ $job->id }}" class="border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $job->title }}
                                    </th>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ str($job->description)->words(7) }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <img src="{{ $job->companyLogoPath() }}" class="block w-auto h-12 mx-auto"
                                            alt="{{ $job->company_name }}">
                                    </td>
                                    <td><span class="font-medium text-gray-900">{{ $job->company_name }}</span></td>
                                    <td class="px-4 py-3">{{ $job->experience }}</td>
                                    <td class="px-4 py-3">{{ $job->salary }}</td>
                                    <td class="px-4 py-3">{{ $job->location }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap items-center gap-2">
                                            @foreach ($job->skills as $skill)
                                                <span
                                                    class="inline-block bg-gray-200 rounded-full px-2 py-0.5 text-xs font-medium text-gray-700">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap items-center gap-2">
                                            @foreach ($job->extra as $extra)
                                                <span
                                                    class="inline-block bg-amber-100 rounded-full px-2 py-0.5 text-xs font-medium text-amber-800">{{ $extra }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="flex items-center justify-end px-4 py-3">
                                        <a href="#" wire:click.prevent="delete({{ $job->id }})"
                                            wire:confirm="Are you sure you want to delete this Job listing?"
                                            class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-gray-700">
                                    <td colspan="10" class="p-6 text-center ">
                                        No jobs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($jobs->hasPages())
                    <div class="p-4">
                        {{ $jobs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
