<?php

namespace App\Rules;

use App\Models\FileUpload;
use Illuminate\Contracts\Validation\Rule;

class FileUploadPath implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private string $path
    ) {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $uploadedDirPath = str_replace(config('app.frontend_dashboard_base_url') . '/uploads/', "", $value);
        $uploadedDirPath = str_replace('/' . basename($value), "", $uploadedDirPath);
        
        $isValidPath = $uploadedDirPath === $this->path;
        $isValidFileUrl = app(FileUpload::class)->isValidFileurl($value);

        return $isValidPath && $isValidFileUrl;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute does not have a valid url.';
    }
}
