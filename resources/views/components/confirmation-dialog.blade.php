<div x-data="{ open: false }" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="open" class="fixed inset-0 transition-opacity bg-gray-500/75" aria-hidden="true"></div>

    <div x-show="open" class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                <div class="sm:flex sm:items-start">
                    <div
                        class="flex items-center justify-center mx-auto bg-red-100 rounded-full size-12 shrink-0 sm:mx-0 sm:size-10">
                        <svg class="text-red-600 size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold text-gray-900" id="modal-title">Cancel Booking</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500"
                                x-text="'Are you sure you want to cancel the booking for ' + activityName + '?'"></p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:ml-10 sm:mt-4 sm:flex sm:pl-4">
                    <button @click="confirmAction()" type="button"
                        class="inline-flex justify-center w-full px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500 sm:w-auto">Cancel
                        Booking</button>
                    <button @click="open = false" type="button"
                        class="inline-flex justify-center w-full px-3 py-2 mt-3 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-3 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
