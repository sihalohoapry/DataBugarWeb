@if (session('fail'))
    <div class="alert alert-danger alert-dismiss=">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session('fail') }}
    </div>
@endif
