<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn">Logout</button>
</form>
