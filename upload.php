<?php

$db = new PDO("mysql:host=localhost;dbname=irsgloba_digitalglass", "irsgloba_glass", "d1g1talglass2018");

if (isset($_POST["currentDirectory"])) {
    $layout = filter_input(INPUT_POST, "layout");
    $rowcounter = filter_input(INPUT_POST, "rowcounter");
    $refno = filter_input(INPUT_POST, "refno");
    $expires = filter_input(INPUT_POST, "expires");
    $target_dir = $_POST["currentDirectory"].'/';
    $target = explode('cmsdemo',$target_dir);
    $target_url = 'http://digitalglass.irsglobal.net'.$target[1] . '/';
    $allowedExts = array("jpg", "jpeg", "gif", "png", "3gp", "mp4", "mpeg", "webm", "webp", "ts");

    $upload = false;
    $sql = $db->prepare("SELECT * FROM adverts WHERE `refno` =:refno");
    $sql->bindValue(":refno", $refno, PDO::PARAM_STR);
    $result = $sql->execute();
    if (!$result)
        $_SESSION['message'] = "*E" . implode("_", $sql->errorInfo()) . "\n";
    else {
        //$expires = date("Y-m-d",strtotime($expires));
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $advertID = $row['id'];
            $query = $db->prepare("UPDATE `adverts` SET `layout`=:layout, `refno`=:refno, `expires`=:expires  WHERE `refno` = :refno");
        } else {
            $query = $db->prepare("INSERT INTO `adverts` (`folder`, `layout`, `refno`, `created`,`expires`)"
                    . "VALUES (:folder,:layout, :refno, NOW(), :expires)");
        }
        $query->bindValue(":folder", $target_dir, PDO::PARAM_STR);
        $query->bindValue(":layout", $layout, PDO::PARAM_STR);
        $query->bindValue(":refno", $refno, PDO::PARAM_STR);
        $query->bindValue(":expires", $expires, PDO::PARAM_STR);
        
        $result = $query->execute();
        
        if (!$result)
            $_SESSION['message'] = "*E" . implode("_", $query->errorInfo()) . "\n";
        else {
            if ($sql->rowCount() < 1)
                $advertID = $db->lastInsertId();
            /*
             * loop through all the images 
             */
            
            
            for ($i = 0; $i <= $rowcounter; $i++) {
                if (!empty($_FILES["file_$i"]['name'])) {
                    
                    $extension = pathinfo($_FILES["file_$i"]['name'], PATHINFO_EXTENSION);

                    if ((($_FILES["file_$i"]["type"] == "video/mp4") || ($_FILES["file_$i"]["type"] == "video/3gp") || ($_FILES["file_$i"]["type"] == "video/mpeg") || ($_FILES["file_$i"]["type"] == "video/webm") || ($_FILES["file_$i"]["type"] == "video/webp") || ($_FILES["file_$i"]["type"] == "video/ts") || ($_FILES["file_$i"]["type"] == "image/jpg") || ($_FILES["file_$i"]["type"] == "image/gif") || ($_FILES["file_$i"]["type"] == "image/png") || ($_FILES["file_$i"]["type"] == "image/jpeg")) && $_FILES["file_$i"]["size"] < 50000000 && in_array($extension, $allowedExts)) {
                        if ($_FILES["file_$i"]["error"] > 0) {
                            //echo "Return Code: " . $_FILES["fileToUpload"]["error"] . "<br />";
                            $_SESSION['message'] .= 'Upload Error*';
                        } else {

                            move_uploaded_file($_FILES["file_$i"]["tmp_name"], $target_dir . $_FILES["file_$i"]["name"]);
                            $upload = true;
                            $sql = $db->prepare("SELECT * FROM `media` WHERE `filename` =:filename AND `advert_id` = :advert_id");
                            $sql->bindValue(":filename", $_FILES["file_$i"]["name"], PDO::PARAM_STR);
                            $sql->bindValue(":advert_id", $advertID, PDO::PARAM_INT);
                            $resultItem = $sql->execute();
                            
                            if(!empty($_POST["block_$i"])) $block = filter_input(INPUT_POST, "block_$i");
                            if(empty($block)) $block = null;
                            
                            $duration = filter_input(INPUT_POST, "time_$i");
                            if(empty($duration)) $duration = null;
                            
                            if (!$resultItem)
                                $_SESSION['message'] .= "*E" . implode("_", $sql->errorInfo()) . "\n";
                            
                            if ($sql->rowCount() > 0) {
                                $query = $db->prepare("UPDATE `media` SET `filetype`=:filetype,`duration`=:duration, `block`=:block
                                        WHERE `filename`=:filename AND `advert_id` = :advert_id");
                                $query->bindValue(":filename", "'".$_FILES["file_$i"]["name"]."'", PDO::PARAM_STR);
                            }
                            else {
                                $query = $db->prepare("INSERT INTO `media` (`advert_id`, `filename`, `filetype`, `duration`, `block`, `created`)
                                                        VALUES (:advert_id,:filename, :filetype, :duration, :block, NOW())");
                                 
                            }
                                $query->bindValue(":advert_id", $advertID, PDO::PARAM_STR);
                                if ($sql->rowCount() < 1) $query->bindValue(":filename", $_FILES["file_$i"]["name"], PDO::PARAM_STR);
                                $query->bindValue(":filetype", $_FILES["file_$i"]["type"], PDO::PARAM_STR);
                                $query->bindValue(":duration", $duration, PDO::PARAM_STR);
                                $query->bindValue(":block", $block, PDO::PARAM_STR);
                                $result = $query->execute();
                            if (!$result)
                                $_SESSION['message'] .= "*E" . implode("_", $query->errorInfo()) . "\n";
                            else {
                                $databaseInsert = true;
                                $_SESSION['message'] = 'Upload successful';

                            }
                        }
                    } else {
                        $_SESSION['message'] .= 'Upload Error! Invalid file';
                        
                    }
                }
            }
            /*
             * Create updated csv
             */
             $_SESSION['id'] = 1;
             $sql = $db->prepare("SELECT m.*, a.layout FROM `media` m
                                    LEFT JOIN adverts a on m.advert_id = a.id
                                    WHERE a.id = :advert_id AND a.deleted = 'n'");
            $sql->bindValue(":advert_id", $advertID, PDO::PARAM_STR);
            $result = $sql->execute();
            $csvarr = [];
            if (!$result)
                $_SESSION['message'] .= "*E" . implode("_", $query->errorInfo()) . "\n";
            else {
                while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                    //id,advert_id,filename,filetype,duration,block,layout

                    $csvarr[] = array('id'=>$row['id'],'ad'=>$row['advert_id'],'filename'=>$row['filename'],'type'=>$row['filetype'],'duration'=>$row['duration'],'block'=>$row['block'],'layout'=>$row['layout']);
                }

            }
             /*$list = array (
                array('aaa', 'bbb', 'ccc', 'dddd'),
                array('123', '456', '789'),
                array('"aaa"', '"bbb"')
            );*/
            ini_set('auto_detect_line_endings',TRUE);
            header("Content-Type: application/csv");
            
            $fp = fopen($target_dir.'adverts.csv', 'w');
            
            foreach ($csvarr as $fields) {
                 $line = $fields['id'].",".$fields['ad'].",".$fields['filename'].",".$fields['type'].",".
                 $fields['duration'].",".$fields['block'].",".$fields['layout'];
                fputcsv($fp, explode(',',$line));
            }
            
            fclose($fp);
             
        }
    }
    header('Location:http://digitalglass.irsglobal.net/discover.php?folder=' . urlencode($target_dir));

}
