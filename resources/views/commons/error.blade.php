<div class="error">
    @if(count($errors) > 0)
        @foreach($errors->message->get() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
</div>

