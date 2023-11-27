<form class="d-inline" action="{{route('setLocale', $lang)}}" method="post">
    @csrf
    <button type="submit" class="btn p-0 mx-1">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg ')}}" width="28" height="28" />
    </button>
</form>