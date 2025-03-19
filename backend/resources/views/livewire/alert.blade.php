<div>
    @if ($show)
        <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
            <span>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
</div>
