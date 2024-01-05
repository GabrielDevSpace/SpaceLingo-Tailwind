<div class="absolute bottom-5 w-30% right-5">
    @if (session()->has('flash_message'))
    <div class="px-5 py-3 rounded-md shadow-md drop-shadow
                 @if(session('flash_message.tipo') === 'success') bg-green-500 text-white
                 @elseif(session('flash_message.tipo') === 'error') bg-red-500 text-white
                 @elseif(session('flash_message.tipo') === 'info') bg-blue-500 text-white
                 @elseif(session('flash_message.tipo') === 'warning') bg-yellow-500 text-white
                 @endif" id="flash-message">
        {{ session('flash_message.mensagem') }}
        <button class="close absolute top-0 right-1"><b>&times;</b></button>
    </div>
    <script>
        const flashMessage = document.getElementById('flash-message');
        const closeButton = flashMessage.querySelector('.close'); // Get the close button

        // Set a timeout for automatic fade out
        setTimeout(() => {
            flashMessage.style.opacity = 0;
            setTimeout(() => {
                flashMessage.remove();
            }, 500);
        }, 4000);

        // Add event listener for manual closing
        closeButton.addEventListener('click', () => {
            flashMessage.remove(); // Remove the message immediately on click
        });
    </script>
    @endif
</div>