<div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <table class="min-w-full divide-y divide-gray-200 border">
        <thead>
            <tr>
                {{ $heading }}
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            {{ $slot }}
        </tbody>
    </table>
</div>
