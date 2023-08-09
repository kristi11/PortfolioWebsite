<div class="grid-cols-1">
    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Subscribe to my newsletter
    </h2>
    <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
    </div>

    <form method="POST" action="/newsletter" class="flex items-center justify-center text-center">
        @csrf
        <div class="flex items-center">
            <x-label for="email" class="sr-only">Email Address</x-label>
            <div>
                <input
                    type="text"
                    class="p-1 mx-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm text-black"
                    placeholder="Your email address"
                    name="email"
                    id="email"
                    required>
                @error('email')
                <div id="successContainer"
                     class="bg-red-600 bottom-2 fixed flex justify-center mt-2 p-2 right-2 rounded-md text-white z-50">
                    <div>
                        {{ $message }}
                    </div>
                    <button id="dismissButton" class="ml-2 focus:outline-none">
                        <span class="font-bold p-1 text-white">x</span>
                    </button>
                </div>
                @enderror
            </div>
        </div>
        <x-button type="submit" class="bg-blue-500 hover:bg-blue-700">Subscribe</x-button>
    </form>
    @if(session('success'))
        <div id="successContainer"
             class="bg-blue-600 bottom-2 fixed flex justify-center mt-2 p-2 right-2 rounded-md text-white z-50">
            <div>
                {{ session('success') }}
            </div>
            <button id="dismissButton" class="ml-2 focus:outline-none">
                <span class="font-bold p-1 text-white">x</span>
            </button>
        </div>
        <script>
            // Function to hide the success message container when the "X" button is clicked
            function hideSuccessMessage() {
                var successContainer = document.getElementById('successContainer');
                if (successContainer) {
                    successContainer.style.display = 'none';
                }
            }

            // Attach a click event listener to the "X" button
            var dismissButton = document.getElementById('dismissButton');
            if (dismissButton) {
                dismissButton.addEventListener('click', function () {
                    hideSuccessMessage();
                });
            }
        </script>
    @endif
</div>
