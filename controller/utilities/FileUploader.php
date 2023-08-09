<?php

/**
 * @author Kamogelo Molotsi (Dash99)
 * @organization OPEX Business Solutions
 */

class FileUploader {

    public $f3;

    public $uploadFolder;

    public $fileName;

    function __construct($f3, $uploadFolder) {
        $this->f3 = $f3;

        $this->uploadFolder = $uploadFolder;
    }

    public function uploadImage($formFieldName, $fileName) {

        $this->fileName = $fileName;
        $this->f3->set('UPLOADS', 'uploads/');

        $web = Web::instance();
        $mime = $web->mime($file);

        $overwrite = true;

        $files = $web->receive(function($file, $formFieldName) {
            return true;
        }, true, function(){
            return $this->fileName;
        });

        return $files;
    }

}