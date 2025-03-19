<div>
    @if ($importing && ! $importFinished)
        <div class="alert alert-warning fade show" role="alert">
            Sedang melakukan proses import, harap tunggu...
        </div>
    @endif

    @if ($importFinished)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>
                Selesai. File berhasil diimport.
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
</div>
