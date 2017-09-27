@if( isset( $errors ) && count( $errors ) > 0 )
    <div class="alert alert-dismissable alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert" arial-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach( $errors->all() as $error )
            <div>
                <strong>{!! $error !!}</strong>
            </div>
        @endforeach
    </div>
@endif