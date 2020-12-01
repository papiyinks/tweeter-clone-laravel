<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <div>
            <textarea
                name="body"
                class="w-full"
                placeholder="what's up doc?"
            ></textarea>

            @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-6">
            <label class="block mb-2 font-bold text-base text-gray-700" for="image">Upload an image</label>

            <div class="flex">
                <input
                    type="file"
                    class="border border-gray-400 p-2 w-full"
                    name="image"
                    id="image"
                >
            </div>

            @error('image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="your avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <button
                type="submit"
                class="bg-blue-500 rounded-lg shadow py-1 px-6 text-white"
            >
                Publish
            </button>
        </footer>

    </form>
</div>
