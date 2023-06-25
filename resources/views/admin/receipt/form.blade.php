<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ isset($receipt) ? __('Edit Receipt') : __('Create Receipt') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form
                    action="{{ isset($receipt) ? route('dashboard.receipt.update', $receipt->id) : route('dashboard.receipt.store') }}"
                    method="POST" enctype="multipart/form-data" class="p-6 dark:bg-gray-800">
                    @csrf

                    @if (isset($receipt))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="name"
                            class="block text-base font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name"
                            value="{{ isset($receipt) ? $receipt->name : '' }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-white"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="thumbnail"
                            class="block text-base font-medium text-gray-700 dark:text-gray-300">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" onchange="previewThumbnail(event)"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-white"
                            {{ isset($receipt) ? '' : 'required' }}>
                        <img id="thumbnailPreview"
                            src="{{ isset($receipt) ? Storage::disk('receipts')->url($receipt->thumbnail) : '' }}"
                            alt="Thumbnail Preview" class="mt-2 max-w-xl">
                    </div>

                    <div class="mb-4">
                        <label for="description"
                            class="block text-base font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-white"
                            required>{{ isset($receipt) ? $receipt->description : '' }}</textarea>
                    </div>

                    <div id="steps-container">
                        @if (isset($receipt) && $receipt->steps->count() > 0)
                            @foreach ($receipt->steps as $step)
                                <div class="mb-4 step">
                                    <label class="block text-base font-medium text-gray-700 dark:text-gray-300">Step
                                        {{ $loop->iteration }}</label>
                                    <div class="flex items-center mb-2">
                                        <input type="text" name="steps[{{ $step->id }}][title]"
                                            value="{{ $step->title }}"
                                            class="mr-2 w-1/2 rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-white"
                                            placeholder="Title" required>
                                        <button type="button" class="remove-step text-red-500 focus:outline-none">
                                            Remove
                                        </button>
                                    </div>
                                    <textarea name="steps[{{ $step->id }}][description]" rows="2"
                                        class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:text-white"
                                        placeholder="Description">{{ $step->description }}</textarea>
                                    <div class="mt-2">
                                        <input type="file" name="steps[{{ $step->id }}][images][]" multiple
                                            class="image-input" accept="image/*">
                                    </div>
                                    <div class="flex mt-2" id="step-images-preview">
                                        @foreach ($step->stepImages as $image)
                                            <div class="mr-2">
                                                <img src="{{ asset('storage/' . $image->image) }}" alt="Step Image"
                                                    class="w-20 h-20 object-cover rounded-md">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="mb-4 step">
                                <label class="block text-base font-medium text-gray-700 dark:text-gray-300">Step
                                    1</label>
                                <div class="flex items-center mb-2">
                                    <input type="text" name="steps[1][title]"
                                        class="mr-2 w-1/2 rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:text-white"
                                        placeholder="Title" required>
                                    <button type="button" class="remove-step text-red-500 focus:outline-none">
                                        Remove
                                    </button>
                                </div>
                                <textarea name="steps[1][description]" rows="2"
                                    class="w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:text-white"
                                    placeholder="Description"></textarea>
                                <div class="mt-2">
                                    <input type="file" name="steps[1][images][]" multiple class="image-input"
                                        accept="image/*">
                                </div>
                                <div class="flex mt-2" id="step-images-preview"></div>
                            </div>
                        @endif
                    </div>

                    <button type="button" id="add-step"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 dark:bg-blue-800 dark:hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-white font-medium rounded-md">
                        Add Step
                    </button>

                    <div>
                        <button type="submit"
                            class="mt-4 inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 dark:bg-green-800 dark:hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-white font-medium rounded-md">
                            {{ isset($receipt) ? 'Update receipt' : 'Create receipt' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewThumbnail(event) {
            const imageInput = event.target;
            const thumbnailPreview = document.getElementById('thumbnailPreview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    thumbnailPreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            } else {
                thumbnailPreview.src = '';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const stepsContainer = document.getElementById('steps-container');
            const addStepButton = document.getElementById('add-step');
            let stepIndex = 1;

            addStepButton.addEventListener('click', () => {
                const stepDiv = document.createElement('div');
                stepDiv.classList.add('mb-4', 'step');

                const stepLabel = document.createElement('label');
                stepLabel.classList.add('block', 'text-base', 'font-medium', 'text-gray-700',
                    'dark:text-gray-300');
                stepLabel.textContent = `Step ${stepIndex + 1}`;
                stepDiv.appendChild(stepLabel);

                const stepFieldsDiv = document.createElement('div');
                stepFieldsDiv.classList.add('flex', 'items-center', 'mb-2');
                stepDiv.appendChild(stepFieldsDiv);

                const stepTitleInput = document.createElement('input');
                stepTitleInput.type = 'text';
                stepTitleInput.name = `steps[${stepIndex + 1}][title]`;
                stepTitleInput.classList.add('mr-2', 'w-1/2', 'rounded-md', 'border-gray-300', 'shadow-sm',
                    'dark:bg-gray-700', 'dark:border-gray-600', 'dark:focus:border-indigo-500',
                    'dark:text-white');
                stepTitleInput.placeholder = 'Title';
                stepTitleInput.required = true;
                stepFieldsDiv.appendChild(stepTitleInput);

                const removeStepButton = document.createElement('button');
                removeStepButton.type = 'button';
                removeStepButton.classList.add('remove-step', 'text-red-500', 'focus:outline-none');
                removeStepButton.textContent = 'Remove';
                stepFieldsDiv.appendChild(removeStepButton);

                const stepDescriptionTextarea = document.createElement('textarea');
                stepDescriptionTextarea.name = `steps[${stepIndex + 1}][description]`;
                stepDescriptionTextarea.rows = '2';
                stepDescriptionTextarea.classList.add('w-full', 'rounded-md', 'border-gray-300',
                    'shadow-sm', 'dark:bg-gray-700', 'dark:border-gray-600',
                    'dark:focus:border-indigo-500', 'dark:text-white');
                stepDescriptionTextarea.placeholder = 'Description';
                stepDiv.appendChild(stepDescriptionTextarea);

                const stepImagesInput = document.createElement('input');
                stepImagesInput.type = 'file';
                stepImagesInput.name = `steps[${stepIndex + 1}][images][]`;
                stepImagesInput.multiple = true;
                stepImagesInput.classList.add('image-input');
                stepImagesInput.accept = 'image/*';
                stepDiv.appendChild(stepImagesInput);

                const stepImagesPreviewDiv = document.createElement('div');
                stepImagesPreviewDiv.classList.add('flex', 'mt-2');
                stepImagesPreviewDiv.id = `step-images-preview-${stepIndex + 1}`;
                stepDiv.appendChild(stepImagesPreviewDiv);

                stepsContainer.appendChild(stepDiv);

                removeStepButton.addEventListener('click', () => {
                    stepDiv.remove();
                });

                const imageInput = stepDiv.querySelector('.image-input');
                imageInput.addEventListener('change', () => {
                    const previewDiv = stepDiv.querySelector(
                        `#step-images-preview-${stepIndex + 1}`);
                    previewDiv.innerHTML = '';

                    Array.from(imageInput.files).forEach(file => {
                        const imagePreview = document.createElement('img');
                        imagePreview.src = URL.createObjectURL(file);
                        imagePreview.alt = 'Step Image';
                        imagePreview.classList.add('w-20', 'h-20', 'object-cover',
                            'rounded-md');
                        previewDiv.appendChild(imagePreview);
                    });
                });

                stepIndex++;
            });

            const imageInputs = document.querySelectorAll('.image-input');
            imageInputs.forEach(input => {
                input.addEventListener('change', () => {
                    const stepDiv = input.closest('.step');
                    const previewDiv = stepDiv.querySelector(`#step-images-preview-${stepIndex}`);
                    previewDiv.innerHTML = '';

                    Array.from(input.files).forEach(file => {
                        const imagePreview = document.createElement('img');
                        imagePreview.src = URL.createObjectURL(file);
                        imagePreview.alt = 'Step Image';
                        imagePreview.classList.add('w-20', 'h-20', 'object-cover',
                            'rounded-md');
                        previewDiv.appendChild(imagePreview);
                    });
                });
            });
        });
    </script>
</x-app-layout>
