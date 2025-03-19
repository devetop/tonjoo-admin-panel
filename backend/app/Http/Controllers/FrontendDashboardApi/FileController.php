<?php

namespace App\Http\Controllers\FrontendDashboardApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendDashboardApi\FileUploadRequest;
use App\Services\FileStorageService;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function __construct(
        private FileStorageService $fileStorageService,
    ) {
    }

    public function upload(FileUploadRequest $request, $path){
        $data = $this->fileStorageService->upload($request->file('file'), "$path/", false);

        return response()->json(compact('data'));
    }

    public function privateUpload(FileUploadRequest $request, $path) {        
        $data = $this->fileStorageService->upload($request->file('file'), "$path/", true);
        return response()->json(compact('data'));
    }

    public function download() {
        return response()->noContent();
    }

    public function getPrivateFile($path) {
        
        $filePath = storage_path('app/private/' . $path);

        if (!\File::exists($filePath)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $fileContent = \File::get($filePath);
        $mimeType = \File::mimeType($filePath);
        $fileName = collect(explode('/', $filePath))->last();

        if (request()->has('download')) {
            return (new Response($fileContent))
                ->header('Content-Type', $mimeType, true)
                ->header('Content-Disposition', 'attachment; filename="' . basename($fileName) . '"')
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        } else {
            return (new Response($fileContent))
                ->header('Content-Type', $mimeType, true)
                ->header('Content-Disposition', 'inline; filename="' . basename($fileName) . '"')
                ->header('Content-Security-Policy', "frame-ancestors 'self' " . config('app.frontend_dashboard_base_url'))
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }
    }
}
