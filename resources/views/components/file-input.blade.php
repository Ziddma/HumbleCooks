<div x-data="{ imagePreview: '' }">
    <input {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }} type="file" @change="previewImage($event)">
    <div x-show="imagePreview">
        <img :src="imagePreview" alt="Image Preview" class="mt-2 max-w-xs">
    </div>
    {{ $slot }}

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = (e) => {
                this.imagePreview = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    </script>
</div>
