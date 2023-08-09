<?php

/**
 * @author Kamogelo Molotsi (Dash) 
 * @organization OPEX Business Solutions
 */
require_once 'PasswordGenerator.php';

class Auth {

    public static function createSession($f3, $user) {
        try {

            //new Session();

            $f3->set('SESSION.id', PasswordGenerator::generate(10));
             $f3->set('SESSION.USER.id', $user['usr_id']);
            $f3->set('SESSION.USER.role', $user['usr_role']);
            $f3->set('SESSION.USER.name', $user['usr_name']);
            $f3->set('SESSION.USER.surname', $user['usr_surname']);
            $f3->set('SESSION.USER.email', $user['usr_email']);
            $f3->set('SESSION.LAST_ACTIVITY', time());
            
            return true;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public static function user($f3) {

        if (!$f3->get('SESSION.id')) {
            return false;
        }

        return [
            'id' => $f3->get('SESSION.USER.id'),
            'name' => $f3->get('SESSION.USER.name'),
            'surname' => $f3->get('SESSION.USER.surname'),
            'email' => $f3->get('SESSION.USER.email'),
            'type' => $f3->get('SESSION.USER.type')
        ];
    }

    public static function destroySession($f3) {
        $f3->clear('SESSION');
    }

}
