<div>
    @if(session($alert))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
        {{session($alert)}}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>

    </div>
        @endif
</div>