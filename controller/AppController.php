<?php

require_once 'AppDefinition.php';

require_once 'AppRepository.php';

require_once 'utilities/Auth.php';

require_once 'utilities/Emailer.php';

require_once 'utilities/Response.php';

abstract class AppController
{
    protected $f3;

    function __construct()
    {
        $f3 = Base::instance();
        $this->f3 = $f3;

        if (Auth::user($f3)) {
            $f3->set('auth', array('user' => Auth::user($f3)));
        }
    }
    
    protected function authCheck($f3) {
        if (!Auth::user($f3)) {
            $f3->reroute('/login');
        }
    }

    protected function setViewVariables($f3)
    {
        try {
            //
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    protected function setAdditionalVariables($f3, $variablesArray)
    {
        foreach ($variablesArray as $key => $value) {
            $f3->set($key, $value);
        }
    }

    protected function createAttachment($f3, $relatedId)
    {
        try {
            $file = $f3->get('FILES')['attachment'];
            $fileExtension = end(explode(".", $file['name']));
            $fileName = PasswordGenerator::generate(32) . '.' . $fileExtension;

            $attachment = array(
                'related_id' => $relatedId,
                'file_name' => $fileName,
                'file_type' => pathinfo($file['name'], PATHINFO_EXTENSION),
                'file_size' => $file['size'],
                'file_extension' => $fileExtension,
                'file_permissions' => 777,
                'file_path' => $f3->get('UPLOADS') . $fileName
            );

            // $attachment = $this->getRepository('rms_attachments')->createRecord($attachment);

            return $fileName;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function fileUpload($f3, $formFieldName)
    {
        $f3->set('UPLOADS', 'uploads/'); // don't forget to set an Upload directory, and make it writable!
        $web = \Web::instance();
        $mime = $web->mime($file); // returns 'image/jpeg'
        $overwrite = true; // set to true, to overwrite an existing file; Default: false
        $slug = true; // rename file to filesystem-friendly version

        $files = $web->receive(function ($file, $formFieldName) {
            //var_dump($file);
            /* looks like:
              array(5) {
                  ["name"] =>     string(19) "csshat_quittung.png"
                  ["type"] =>     string(9) "image/png"
                  ["tmp_name"] => string(14) "/tmp/php2YS85Q"
                  ["error"] =>    int(0)
                  ["size"] =>     int(172245)
                }*/

            // $file['name'] already contains the slugged name now

            // maybe you want to check the file size
            //if($file['size'] > (2 * 1024 * 1024)) // if bigger than 2 MB
            // return false; // this file is not valid, return false will skip moving it

            // everything went fine, hurray!
            return true; // allows the file to be moved from php tmp dir to your defined upload dir
        },
            $overwrite,
            $slug
        );

        return $files;

    }

    protected function dispatchEmail($recipient, $subject, $message)
    {
        try {

            $emailer = new Emailer($recipient, $subject);
            $emailer->send($message);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    protected function getRepository($table)
    {
        return new AppRepository($table);
    }

    protected function getDefinition($attributes)
    {
        return new AppDefinition($attributes);
    }

}
