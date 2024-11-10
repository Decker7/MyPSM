@extends('layout.web')

@section('content')
    <h1>Dashboard</h1>
@endsection

<!-- Dropdown menu, shown when checkbox is checked -->
<div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 peer-checked:block"
role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
<a href="{{ route('profile.show') }}"
    class="block px-4 py-2 text-sm text-gray-700 no-underline hover:bg-gray-100"
    role="menuitem">Your Profile</a>

<!-- Sign out link with logout form -->
<a href="#" class="block px-4 py-2 text-sm text-gray-700 no-underline hover:bg-gray-100"
    role="menuitem"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Sign out
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>