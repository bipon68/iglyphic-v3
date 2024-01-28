<?php

namespace Sourav;

class FileUpload
{
    public static function uploadFile($fileInputName, $uploadDirectory)
    {
        // Check if the file was uploaded without errors
        // Get the file name and extension
        $fileName = $fileInputName['originalName'];

        // Build the path to the upload directory
        $uploadPath = $uploadDirectory . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($fileInputName['tmp_name'], $uploadPath)) {
            return $uploadPath; // Return the uploaded file path
        } else {
            echo "Error uploading file.";
        }

        return null; // Return null if the upload was not successful
    }
}
