@if (session('status'))
    <div class="alert alert-success alert-dismiss=">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session('status') }}
    </div>
@endif
