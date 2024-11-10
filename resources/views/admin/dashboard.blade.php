<p>Ini adalah halaman dashboard</p>


<form action="{{route('dashboard.logout')}}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>
{{-- {{Auth::user()->roles()}} --}}
