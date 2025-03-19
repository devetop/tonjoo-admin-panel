<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $fillable = [
        'fileuploadable_type',
        'fileuploadable_id',
        'uploaderable_type',
        'uploaderable_id',
        'original_file_name',
        'file_url_path',
        'filepath',
        'is_persisted'
    ];

    protected $casts = [
        'is_persisted' => 'boolean'
    ];

    // Relationship untuk fileuploadable (nullable polymorphic)
    public function fileuploadable()
    {
        return $this->morphTo();
    }

    // Relationship untuk uploaderable (polymorphic)
    public function uploaderable()
    {
        return $this->morphTo();
    }

    public function scopeOfFileUrl($query, $fileUrl)
    {
        $urlPath = str_replace(config('app.frontend_dashboard_base_url'), "", $fileUrl);
        return $query->where('file_url_path', $urlPath);
    }

    // public function getFileurlAttribute() {
    //     if ($this)
    // }

    // public function getIsPrivateAttribute() {

    // }

    public function persist()
    {
        dd(111);
        // $this->where('filepath', );
    }

    public function isValidFileurl($fileUrl)
    {
        $urlPath = str_replace(config('app.frontend_dashboard_base_url'), "", $fileUrl);

        if (str_starts_with($urlPath, '/private')) { // private file
            $fileUpload = $this->ofFileUrl($fileUrl)->first(['file_url_path']);
            
            if ($fileUpload === null) { // fileurl tidak ditemukan di db
                return false;
            }

            if (!file_exists(storage_path("app$urlPath"))) { // file tidak ditemukan di storage
                return false;
            }

            return true;
        } else if (str_starts_with($urlPath, '/uploads')) { // public file
            $fileUpload = $this->ofFileUrl($fileUrl)->first(['file_url_path']);
            
            if ($fileUpload === null) { // fileurl tidak ditemukan di db
                return false;
            }
            
            if (!file_exists(storage_path("app/public$fileUpload->file_url_path"))) { // file tidak ditemukan di storage
                return false;
            }

            return true;
        }
        
        return false;
    }
}