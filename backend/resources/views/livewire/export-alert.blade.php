<div>
    @if ($exporting && ! $exportFinished)
        <div wire:poll="updateExportProgress" class="alert alert-warning fade show" role="alert">
            Sedang melakukan proses export, harap tunggu...
        </div>
    @endif

    @if ($exportFinished)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>
                Selesai. File export dapat didownload pada tautan berikut
                <a class="btn btn-link p-0" wire:click="downloadExport">
                    {{ Str::afterLast($path, '/') }}
                </a>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
</div>
