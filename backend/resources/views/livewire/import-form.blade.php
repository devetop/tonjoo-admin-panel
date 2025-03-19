<div>
    <div class="card">
        <div class="card-header">
            <form wire:submit.prevent="import" enctype="multipart/form-data" class="">
                @csrf

                <div class="form-group row">
                    <div class="col-12 col-md-2 col-lg-2">
                        <label for="importFileInput-{{ $iteration }}" class="control-label text-left font-weight-normal d-flex align-items-center">
                            Import File
                            <span class="required">*</span>
                        </label>
                    </div>
                    <div class="col-12 col-md-10 col-lg-10">
                        <div class="d-flex align-items-start">
                            <div class="input-wrap w-100">
                                <input type="file"
                                    wire:model="importFile"
                                    class="form-control"
                                    id="importFileInput-{{ $iteration }}"
                                >
                                <div class="invalid-feedback" role="alert" style="display: block;">{{ $errors->first('importFile') }}</div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-3">
                                Import
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="form-group row mb-0">
                <div class="col-12 col-md-2 col-lg-2">
                    <label class="control-label text-left font-weight-normal d-flex align-items-center">
                        Import File
                    </label>
                </div>
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card shadow-none border bg-black ">
                        <div class="card-body p-3 overflow-auto" style="height:350px;">
                            @if ($importing)
                                <div wire:poll="updateImportDisplay">
                                    {!! $logData ?? '' !!}
                                </div>
                            @endif
    
                            @if ($importFinished)
                                {!! $logData ?? '' !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div class="card-body">
            <h5 class="card-title">Output :</h5>

            <div class="card">
                <div class="card-body bg-black rounded overflow-auto d-flex flex-column-reverse" style="height: 50vh !important;">
                    
                </div>
            </div>
        </div> -->
    </div>
</div>
