@extends('layout.adminweb')

@section('admin_content')
    <div>
        <h1 class="mb-4 text-2xl font-bold">Edit User</h1>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="first_name" class="block font-bold">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="w-full px-4 py-2 border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="last_name" class="block font-bold">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="w-full px-4 py-2 border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="name" class="block font-bold">Name:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-bold">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="user_type" class="block font-bold">User Type:</label>
                <input type="text" id="user_type" name="user_type" value="{{ $user->user_type }}" class="w-full px-4 py-2 border border-gray-300">
            </div>
            <div class="mb-4">
                <label for="bio" class="block font-bold">Bio:</label>
                <textarea id="bio" name="bio" class="w-full px-4 py-2 border border-gray-300">{{ $user->bio }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Save Changes</button>
        </form>
    </div>
@endsection
