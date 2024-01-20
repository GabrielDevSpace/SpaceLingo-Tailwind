<div class="w-full flex justify-center bg-white px-2 pb-20 pt-2 shadow-md rounded-md overflow-x-hidden mx-auto">
    <div class="bg-white px-2">
        <div class="flex justify-center px-4 pb-4">
            <span class="pt-1 px-2 text-xl font-medium text-violet-800">
                <b><u>Support</u> Projects Like This <i class="fa fa-thumbs-up"></i></b>
            </span>
        </div>
        <div class="flex justify-center px-4">
            <span class="text-violet-800 text-sm px-4">
                If you like our system and want to support development, consider making a contribution through PIX or Bitcoin.
            </span>
        </div>
        <div class="flex justify-center py-10">
            <hr width="90%">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 justify-center">
            <div class="w-full px-2 pb-16">
                <div class="flex justify-center">
                    <img src="{{ asset('/images/support/pix_oficial.png') }}" width="100px" alt="PIX Icon">
                </div>
                <div class="p-4">
                    <div class="flex justify-center">
                        <b class="text-green-500">PIX</b>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <span id="key_pix" class="text-sm">20d400c6-8176-44f1-a307-9c250e811bbb</span> &nbsp
                        </div>
                        <div class="flex justify-center">
                            <button class="bg-purple-700 hover:bg-purple-900 text-white text-xs px-2 py-1 rounded-full flex items-center" onclick="copyToClipboard('key_pix')"><i class="fa fa-copy"></i>&nbsp Copy</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('/images/support/pix.png') }}" width="100px" alt="PIX Icon">
                </div>
            </div>

            <div class="w-full px-2">
                <div class="flex justify-center">
                    <img src="{{ asset('/images/support/bitcoin_logo.png') }}" width="100px" alt="Bitcoin Icon">
                </div>
                <div class="flex justify-center">
                    <div class="p-4">
                        <div class="flex justify-center">
                            <b class="text-yellow-500">Bitcoin (BSC - BEP20)</b>
                        </div>
                        <div>
                            <div class="flex justify-center">
                                <span id="address_bitcoin" class="text-sm">0xb977ffd8b9ea4eb5ced656fbfd051ae80adc4193</span> &nbsp
                            </div>
                            <div class="flex justify-center">
                                <button class="bg-purple-700 hover:bg-purple-900 text-white text-xs px-2 py-1 rounded-full flex items-center" onclick="copyToClipboard('address_bitcoin')"><i class="fa fa-copy"></i>&nbsp Copy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pb-10">
                    <img src="{{ asset('/images/support/bitcoin-bsc-bep20.png') }}" width="100px" alt="Bitcoin Icon">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function copyToClipboard(elementId) {
        var element = document.getElementById(elementId);
        var range = document.createRange();
        range.selectNode(element);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
        alert(elementId + " Copied to Clipboard!");
    }
</script>