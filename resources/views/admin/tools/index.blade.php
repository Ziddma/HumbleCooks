<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tools List') }}
            </h2>

            @if (session('status'))
                <p class="text-base text-green-600 dark:text-green-400">{{ session('status') }}</p>
            @endif

            <a href="{{ route('dashboard.tools.create') }}"
                class="inline-block bg-green-500 dark:bg-green-800 hover:bg-green-700 dark:hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                Create Tools
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Search -->
            <div class="mb-4 flex justify-end">
                <form action="{{ route('dashboard.tools.index') }}" method="GET" class="flex">
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        class="flex-1 px-2 py-1 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:outline-none dark:text-white"
                        placeholder="Search tool...">
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-medium rounded">
                        Search
                    </button>
                </form>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full bg-white dark:bg-gray-800" id="toolTable">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-blue-500 dark:bg-blue-800 font-bold uppercase text-sm text-gray-600 dark:text-gray-400 border-b border-gray-300 dark:border-gray-700">
                                Name
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-500 dark:bg-blue-800 font-bold uppercase text-sm text-gray-600 dark:text-gray-400 border-b border-gray-300 dark:border-gray-700">
                                Image
                            </th>
                            <th
                                class="py-4 px-6 bg-blue-500 dark:bg-blue-800 font-bold uppercase text-sm text-gray-600 dark:text-gray-400 border-b border-gray-300 dark:border-gray-700">
                                Description
                            </th>

                            <th
                                class="py-4 px-6 bg-blue-500 dark:bg-blue-800 font-bold uppercase text-sm text-gray-600 dark:text-gray-400 border-b border-gray-300 dark:border-gray-700">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tools as $tool)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td
                                    class="py-4 px-6 text-zinc-700 dark:text-white border-b border-gray-300 dark:border-gray-700">
                                    {{ $tool->name }}
                                </td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">
                                    <img src="{{ Storage::disk('tools')->url($tool->image) }}" alt="tool Image"
                                        class="max-w-xs object-cover">
                                </td>
                                <td
                                    class="py-4 px-6 text-zinc-700 dark:text-white border-b border-gray-300 dark:border-gray-700">
                                    <div class="line-clamp-6">
                                        {{ $tool->description }}
                                    </div>
                                </td>

                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">
                                    <div class="flex gap-2">
                                        <a href="{{ route('dashboard.tools.edit', $tool->id) }}"
                                            class="text-blue-500 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.32 4.52l-.85-.85-2.34 2.34.85.85L16.32 4.52zM5 14.5l6-6L14.5 9l-6 6H5v-1.5z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('dashboard.tools.destroy', $tool->id) }}" method="POST"
                                            id="deleteForm{{ $tool->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300"
                                                onclick="showDeleteConfirmation({{ $tool->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5 7a1 1 0 011-1h8a1 1 0 011 1v9a1 1 0 01-1 1H6a1 1 0 01-1-1V7zm7 2a1 1 0 11-2 0 1 1 0 012 0zm-4 0a1 1 0 11-2 0 1 1 0 012 0zM5 5a3 3 0 00-3 3v9a3 3 0 003 3h8a3 3 0 003-3V8a3 3 0 00-3-3H5zm8 2h2a1 1 0 011 1v9a1 1 0 01-1 1h-2V7zm-4 0h4v10H9V7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="py-4 px-6 border-b border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-200">
                                    No tools found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tools->links() }}
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto transform duration-300 ease-out hidden"
        style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
            <p class="text-lg text-gray-800 dark:text-gray-200 mb-4">Are you sure you want to delete this tool?
            </p>
            <div class="flex justify-end">
                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white font-medium rounded"
                    onclick="hideDeleteConfirmation()">Cancel</button>
                @isset($tool)
                    <form id="deleteForm" method="POST" action="{{ route('dashboard.tools.destroy', $tool->id) }}"
                        class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-medium rounded">Delete</button>
                    </form>
                @endisset
            </div>
        </div>
    </div>


    <script>
        function showDeleteConfirmation(toolId) {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.classList.remove('hidden');
            deleteModal.querySelector('#deleteForm').action = '{{ route('dashboard.tools.destroy', ':id') }}'.replace(
                ':id', toolId);
        }

        function hideDeleteConfirmation() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.classList.add('hidden');
            deleteModal.querySelector('#deleteForm').action = '';
        }
    </script>
</x-app-layout>
