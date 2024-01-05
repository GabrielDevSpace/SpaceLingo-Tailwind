<div>
    @if (session()->has('flash_message'))
        <div class="p-3 rounded-md shadow-md drop-shadow
                    @if(session('flash_message.tipo') === 'success') bg-green-500 text-white
                    @elseif(session('flash_message.tipo') === 'error') bg-red-500 text-white
                    @elseif(session('flash_message.tipo') === 'info') bg-blue-500 text-white
                    @elseif(session('flash_message.tipo') === 'warning') bg-yellow-500 text-white
                    @endif">
            {{ session('flash_message.mensagem') }}
        </div>
    @endif
</div>