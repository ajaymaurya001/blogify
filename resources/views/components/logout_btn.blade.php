<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn dropdown-item text-center text-light bg-danger w-75 mx-auto mt-2">Logout</button>
</form>
