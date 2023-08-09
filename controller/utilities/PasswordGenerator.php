<?php

/**
 * @author Kamogelo Molotsi (Dash) 
 * @organization OPEX Business Solutions
 */

class PasswordGenerator {

    public static function generate($length = 8) {
        $unique = '';
        for ($i = $length; $i--; $i > 0) {
            $unique .= mt_rand(0, 9);
        }

        return $unique;
    }
    
    public static function generatePrimaryKey($table, $length = 3) {
        $unique = '';
        for ($i = $length; $i--; $i > 0) {
            $unique .= mt_rand(0, 9);
        }

        return substr(strtoupper(date('YM')), 0,7).$unique.date('s');
    }

}
