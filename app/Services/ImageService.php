<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    
    public function storeImages($files, $folder = 'uploads')
    {
        $storedFiles = [];

        // Ensure the destination folder exists
        $destinationPath = public_path($folder);
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Check if multiple files are uploaded
        if (is_array($files)) {
            foreach ($files as $file) {
                $storedFiles[] = $this->processImage($file, $destinationPath);
            }
        } else {
            // Single file upload
            return $this->processImage($files, $destinationPath);
        }

        return $storedFiles;
    }

    
    private function processImage(UploadedFile $file, $destinationPath)
    {
        $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    /**
     * Delete one or multiple images from the public folder.
     *
     * @param array|string $fileNames
     * @param string $folder
     * @return bool
     */
    public function deleteImages($fileNames, $folder = 'uploads')
    {
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames]; 
        }

        $allDeleted = true;

        foreach ($fileNames as $fileName) {
            $fullPath = public_path($folder . '/' . $fileName);

            if (file_exists($fullPath)) {
                unlink($fullPath);
            } else {
                $allDeleted = false;
            }
        }

        return $allDeleted;
    }
}