<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="mx-auto sm:px-6 lg:px-8">

        {{-- top div --}}
        <div class="flex flex-col grid-cols-1 mt-10 mb-4">
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2">
                <p>Test</p>
            </div>
        </div>

        {{-- middle div --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- left div --}}
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2">01</div>

            {{-- right div --}}
            <div class="flex items-center justify-center h-32 p-6 text-center bg-teal-300 border-2">02</div>
        </div>

        {{-- bottom div --}}
        <div class="flex flex-col grid-cols-1 mb-4">
            <div class="flex items-center justify-center h-40 p-6 text-center bg-teal-300 border-2">
                <ul>
                    <li>Table</li>
                    <li>1</li>
                    <li>2</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
