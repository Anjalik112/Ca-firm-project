<?php

class PhotoUpload
{
    private string $field_name;
    private string $file_name;
    private string $logotargetdir;
    private string $logofilepath = "";

    public function __construct(string $field_name, string $file_name, string $targetDir)
    {
        $this->field_name = $field_name;
        $this->file_name = $file_name;
        $this->logotargetdir = rtrim($targetDir, '/') . '/'; // Ensure the target directory has a trailing slash
    }

    // Check if file path already exists
    private function createPathName(string $temp): bool
    {
        return file_exists($temp);
    }

    // Validate if uploaded file is an image
    private function checkImage(): bool
    {
        if (!isset($_FILES[$this->field_name])) {
            throw new Exception("No file uploaded in field: {$this->field_name}");
        }

        $tmp_name = $_FILES[$this->field_name]["tmp_name"];
        if (empty($tmp_name) || !file_exists($tmp_name)) {
            throw new Exception("Uploaded file is invalid or missing.");
        }

        $check = getimagesize($tmp_name);
        if ($check === false) {
            throw new Exception("Uploaded file is not a valid image.");
        }

        return true;
    }

    // Save the uploaded file
    public function save(): bool
    {
        $this->checkImage();

        $filetype = strtolower(pathinfo($_FILES[$this->field_name]["name"], PATHINFO_EXTENSION));
        if (!in_array($filetype, ["jpg", "png", "jpeg"])) {
            throw new Exception("Invalid file type. Only JPG, PNG, and JPEG are allowed.");
        }

        $this->logofilepath = $this->logotargetdir . $this->file_name . "." . $filetype;
        $i = 1;

        // Avoid overwriting existing files
        while ($this->createPathName($this->logofilepath)) {
            $this->logofilepath = $this->logotargetdir . $this->file_name . $i . "." . $filetype;
            $i++;
        }

        // Ensure the target directory exists
        if (!is_dir($this->logotargetdir)) {
            if (!mkdir($this->logotargetdir, 0777, true) && !is_dir($this->logotargetdir)) {
                throw new Exception("Failed to create target directory: {$this->logotargetdir}");
            }
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES[$this->field_name]["tmp_name"], $this->logofilepath)) {
            throw new Exception("Failed to save the uploaded file.");
        }

        return true;
    }

    // Get the saved file path
    public function getPath(): string
    {
        return $this->logofilepath;
    }
}

?>
