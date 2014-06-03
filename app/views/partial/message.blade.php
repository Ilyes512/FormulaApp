@if ( Session::has('message') )
<div data-alert class="alert-box info">
    {{ Session::get('message') }}
    <a href="#" class="close">&times;</a>
</div>
@endif