<div class="btn-group">
    <button wire:click="exportBatch" type="button" class="btn btn-sm btn-default">Export</button>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right" role="menu">
        <a wire:click="exportBatch" class="dropdown-item">Batch</a>
        <a wire:click="exportNormal" class="dropdown-item">Normal</a>
    </div>
</div>
