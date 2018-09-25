<?php
    class Image
    {
        private $targetDirectory = "img/upload/";

        static $errorMessage = null;

        public function uploadImage($photoPath)
        {
            try
            {
                $targetFile = $this->targetDirectory . $photoPath;

                $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
                {
                    self::$errorMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    return null;
                }

                if ($_FILES["photoPath"]["error"] == 1)
                {
                    self::$errorMessage = "Sorry, your file is too large. Max of 2M is allowed.";
                    return null;
                }

                if (move_uploaded_file($_FILES["photoPath"]["tmp_name"], $targetFile))
                {
                    self::$errorMessage = "The file $photoPath has been uploaded.";
                }
                else
                {
                    self::$errorMessage = "Sorry, there was an error uploading your file. Error Code:" . $_FILES["photoPath"]["error"];
                    return null;
                }

                return $targetFile;    
            } catch (Exception $e) {
                throw new Exception("$e->getMessage()", 1);
                
            }

            
        }
    }