<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($category) ? __('Edit Category') : __('Create Category') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form
                    action="{{ isset($category) ? route('dashboard.category.update', $category->id) : route('dashboard.category.store') }}"
                    method="POST" class="p-6 dark:bg-gray-800">
                    @csrf

                    @if (isset($category))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="name"
                            class="block text-base font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name"
                            value="{{ isset($category) ? $category->name : '' }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-white"
                            required>
                    </div>

                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 dark:bg-green-800 dark:hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-white font-medium rounded-md">
                            {{ isset($category) ? 'Update Category' : 'Create Category' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
