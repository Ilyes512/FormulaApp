@if($errors->any() || Session::has('form_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        @if(Session::has('form_error'))
            {{ Session::get('form_error') }}
        @else
            Oeps, there were one or more errors!
        @endif
    </div>
@endif