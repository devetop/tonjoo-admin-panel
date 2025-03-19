<?php

namespace App\Services;


use App\Models\FileUpload;
use Illuminate\Support\Str;
use App\Contracts\FileStorageInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FileStorageService implements FileStorageInterface
{
    private const FILE_FOLDER = 'uploads/';

    public function upload($file, $path = "/", $isPrivate = false)
    {
        $fileName = Str::random(5) . date("YmdHis") . '.' . $file->getClientOriginalExtension();
        $filePath = self::FILE_FOLDER . $path . $fileName;
        $visibility = $isPrivate ? 'private' : 'public';
        $fileUrlPath = ($isPrivate ? "/private" : "") . "/$filePath";

        // local disk
        Storage::disk($visibility)->put(
            $filePath,
            file_get_contents($file),
        );

        app(FileUpload::class)->create([
            'original_file_name' => $file->getClientOriginalName(),
            'file_url_path' => $fileUrlPath,
            'is_persisted' => false
        ]);

        return [
            'file_name' => $fileName,
            'file_path' => "$visibility/$filePath",
            'file_url_path' => config('app.frontend_dashboard_base_url') . $fileUrlPath,
            'file_original_name' => $file->getClientOriginalName(),
        ];
    }

    public function download($filePath, $fileName, $isPrivate = false)
    {

        // Check if the file exists in storage
        $type = $isPrivate ? 'private' : 'public';
        if (Storage::disk($type)->exists(self::FILE_FOLDER . $filePath)) {
            // Create a response to force download the file
            $storage_path = storage_path("app/$type/" . self::FILE_FOLDER . $filePath);

            return Response::file($storage_path, ['Content-Disposition' => 'attachment; filename="' . $fileName . '"']);
        } else {
            // Handle file not found
            return response()->json(['message' => 'File not found.'], 404);
        }
    }

    public function inline($filePath, $fileName)
    {

        // Check if the file exists in storage
        if (Storage::disk('public')->exists(self::FILE_FOLDER . $filePath)) {
            // Create a response to force download the file
            $storage_path = storage_path('app/public/' . self::FILE_FOLDER . $filePath);

            $response = Response::file($storage_path);
            $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $fileName);

            return $response;
        } else {
            // Handle file not found
            return response()->json(['message' => 'File not found.'], 404);
        }
    }

    public function getUrl($path = NULL, $fileName = NULL, $isPrivate = false, $isImage = false)
    {
        $storage = Storage::disk($isPrivate ? 'private' : 'public');
        if (($fileName && $path) && $storage->exists(self::FILE_FOLDER . $path . $fileName)) {
            if ($isImage) {
                return str_replace(env('FRONTEND_DASHBOARD_BASE_URL'), '', $storage->url(self::FILE_FOLDER . $path . $fileName));
            } else {
                return $storage->url(self::FILE_FOLDER . $path . $fileName);
            }
        }
        return;
    }

    public function delete($file, $path)
    {
        if (Storage::disk('public')->exists(self::FILE_FOLDER . $path . $file)) {
            Storage::disk('public')->delete(self::FILE_FOLDER . $path . $file);
        }
    }

    public function getPath($filePath, $isPrivate = false)
    {
        return Storage::disk($isPrivate ? 'private' : 'public')->path(self::FILE_FOLDER . $filePath);
    }
}
