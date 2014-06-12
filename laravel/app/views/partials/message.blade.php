@foreach($messages_types as $message => $class)
@if(Session::has($message))
<div data-alert class="alert-box{{ $class }}">
    {{ Session::get($message) }}
    <a href="#" class="close">&times;</a>
</div>
@endif
@endforeach
