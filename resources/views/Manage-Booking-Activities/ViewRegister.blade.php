@extends('layout.web')

@section('content')
    <div class="px-4 py-10 mt-20 bg-gray-50 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl">
            <h1 class="mt-6 text-3xl font-bold text-center text-gray-900">Register for Activity</h1>

            {{-- Display errors --}}
            @if (session('error'))
                <div class="p-4 mx-6 mt-4 text-red-700 bg-red-100 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 mx-6 mt-4 text-red-700 bg-red-100 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Register form --}}
            <form action="{{ route('register.store', $booking->id) }}" method="POST" class="p-6">
                @csrf

                {{-- Approval code input --}}
                <div class="mb-4">
                    <label for="approval_code" class="block text-sm font-medium text-gray-700">Enter Approval Code</label>
                    <input type="text" name="approval_code" id="approval_code" value="{{ old('approval_code') }}"
                        required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Phone number input --}}
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required
                        placeholder="e.g., +60123456789"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                {{-- Submit button --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
