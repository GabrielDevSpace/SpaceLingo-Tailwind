<a href="#" onclick="ShowModal('myModalContact')" class="fixed bottom-4 right-4 text-sm bg-green-400 border-2 border-white shadow-lg hover:bg-green-600 text-white px-2 py-1 rounded-full ml-2 flex items-center"><i class="fa fa-bug"></i>&nbsp Report</a>

<!-- Modal -->
<div class="fixed z-10 inset-0 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="myModalContact">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <!-- Modal content -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle max-w-3xl w-full">

            <div class="bg-white px-2 pt-2 pb-2 sm:p-2 sm:pb-2">
                <form wire:submit.prevent="saveContact">
                    <div class="mb-4">
                        <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Contact:</label>
                        <select wire:model="reason" id="reason" name="reason" required class="mt-1 p-2 block w-full rounded-md border-gray-300">
                            <option value="">Select...</option>
                            <option value="report_issue">Report an Issue</option>
                            <option value="request_feature">Request a New Feature</option>
                            <option value="compliment_complaint">Compliment / Complaint</option>
                            <option value="other_reason">Other Reason</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description of the Request:</label>
                        <textarea wire:model="description" id="description" name="description" rows="12" required class="mt-1 p-2 block w-full rounded-md border-gray-300"></textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" @click="modalOpen = false" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-300 border border-transparent rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:border-blue-300 transition">
                            Cancel
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 text-base font-medium text-white hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="HiddenModal('myModalContact')">
                    <i class="fa fa-close mr-1 mt-1"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function ShowModal() {
        var modal = document.getElementById('myModalContact');
        modal.classList.remove('hidden');
        modal.classList.add('block');
    }

    function HiddenModal() {
        var modal = document.getElementById('myModalContact');
        modal.classList.remove('block');
        modal.classList.add('hidden');
    }
</script>