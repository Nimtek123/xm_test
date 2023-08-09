#!/usr/bin/php
<?php


    $filename = '';
    $dataArr  = [];

    
    //For no limits
    //ini_set('memory_limit', -1);
    // open IMAP connection
    $mbox = imap_open('{imap.unified-bi.co.za:143/notls}', 'ackermans.tembisa@unified-bi.co.za', 'golive2018');
    // or, open POP3 connection
    //echo "<h1>Mailboxes</h1>\n";
    $folders = imap_listmailbox($mbox, "{imap.unified-bi.co.za:143}", "*");
    

    
    //echo "<h1>Headers in INBOX</h1>\n";
    $headers = imap_headers($mbox);
    
    // grab a header object for the last message in the mailbox
    //$last = imap_num_msg($mbox);
    $headers = imap_headers($mbox);
    $header = end($headers);
    
    $count = imap_num_msg($mbox);
    
    /*
    *DB connection
    */
    
    $maindb= new PDO(
        'mysql:host=localhost;port=3306;dbname=unifiedb_platform_accounts',
        'unifiedb_account',
        'golive3000');
    $server = $_SERVER['HTTP_HOST'];
       
    $sql = $maindb->prepare("SELECT * FROM `ipa_organisations` WHERE `org_host`=:host");
    $sql->bindValue(":host",$server, PDO::PARAM_STR);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $orgfolder = $row['org_upload_path'];

   
    if (sizeof($row) > 0) {
        
        $dbname = $row['org_db'];
        $dbuser = $row['org_db_user'];
        $dbpass = $row['org_db_pass'];
        $orgfolder = $row['org_upload_path'];
       
        $db= new PDO(
        "mysql:host=localhost;port=3306;dbname=$dbname",
        "$dbuser",
        "$dbpass");
        
        // provision for other vhosts
        
    }
    
    
    
    $upload_path = "../.ump_platform/raw_data/$orgfolder/pos_data";

    
    	if(!is_dir("$upload_path/csv_uploads")) {
			mkdir("$upload_path/csv_uploads", 0777, true);
			chmod("$upload_path/csv_uploads", 0777); 
		}
    
for($msgno = 1; $msgno <= $count; $msgno++) {

    $headers_info = imap_headerinfo($mbox, $msgno);
    if($headers_info->Unseen == 'U') {
        
        $temp =  explode(" ",$headers_info->MailDate);

        $maildate = $temp[1];
        
      // pull the plain text for message $n 
        $st = imap_fetchstructure($mbox, $msgno);
        
         $attachments = array();
               if(isset($st->parts) && count($st->parts)) {
                 for($i = 0; $i < count($st->parts); $i++) {
                   $attachments[$i] = array(
                      'is_attachment' => false,
                      'filename' => '',
                      'name' => '',
                      'date' => $maildate,
                      'attachment' => '');
        
                   if($st->parts[$i]->ifdparameters) {
                     foreach($st->parts[$i]->dparameters as $object) {
                       if(strtolower($object->attribute) == 'filename') {
                         $attachments[$i]['is_attachment'] = true;
                         $attachments[$i]['filename'] = $object->value;
                       }
                     }
                   }
        
                   if($st->parts[$i]->ifparameters) {
                     foreach($st->parts[$i]->parameters as $object) {
                       if(strtolower($object->attribute) == 'name') {
                         $attachments[$i]['is_attachment'] = true;
                         $attachments[$i]['name'] = $object->value;
                       }
                     }
                   }
        
                   if($attachments[$i]['is_attachment']) {
                     $attachments[$i]['attachment'] = imap_fetchbody($mbox, $msgno, $i+1);
                     if($st->parts[$i]->encoding == 3) { // 3 = BASE64
                       $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                     }
                     elseif($st->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                       $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                     }
                   }             
                 } // for($i = 0; $i < count($structure->parts); $i++)
               } // if(isset($structure->parts) && count($structure->parts))
               
               foreach ($attachments as $attachment) {
    if ($attachment['is_attachment'] == 1) {
        $filename = $attachment['name'];
        
        if (empty($filename))
            $filename = $attachment['date'].'_'.$attachment['filename'];

        if (empty($filename))
            $filename = time() . ".dat";
        
        
        $temp = explode('.',$filename);
        $title = $temp[0];
        
        $filename = str_replace(" ", "", $filename);
        $ext = strtolower(substr($filename, -3));
        
        if ($ext != 'csv') {
        
            $fp = fopen("$orgfolder/".$excelfolder.'/'.$filename, "w+");
            fwrite($fp, $attachment['attachment']);
            fclose($fp);
            
            require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
            if (!file_exists("$orgfolder/$excelfolder/$filename")) {
            	exit("Please run 05featuredemo.php first." . EOL);
            }
            $filetoname = "$orgfolder/$excelfolder/$filename";
            $destfolder = "$orgfolder/csv_uploads/$filename";
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($filetoname);
    
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV')->setDelimiter(',')
                                                                      ->setEnclosure('"')
                                                                      ->setSheetIndex(0)
                                                                      ->save(str_replace('.xlsx', '.csv', $destfolder));
        }
        else {
            $fp = fopen("$upload_path/csv_uploads/$filename", "w+");
            fwrite($fp, $attachment['attachment']);
            fclose($fp);
        }
        
      
    }
}
    
              
    }
   
}



if ($handle = opendir("$upload_path/csv_uploads")) {
    //echo "Directory handle: $handle\n";
    //echo "Entries:\n";

    // This is the correct way to loop over the directory. 
    while (false !== ($entry = readdir($handle))) {
        $temp = explode(".",$entry);
		if(isset($temp[1]))$ext = $temp[1];
		if($ext == "csv") {
			//echo "$entry<br>";
				
		$file = $entry;

		$row = 1;
		$flag = true;
		//Canal Walk,08-JAN-18,13,8738,CS,259.95,BOYS TOUGHEES YTHS TOUGHEES
		if (($csvhandle = fopen("$upload_path/csv_uploads/$file", "r")) !== FALSE) {
			while (($data = fgetcsv($csvhandle, 1000, ",")) !== FALSE) {
				if($flag) { $flag = false; continue; }
				if(!empty($data[6])){
				    $str= $data[1];
				    $pos = strpos($str, "/");
				    if ($pos == true){
				        $temp = explode(" ",$str);
                        $date = $temp[0];
                        $time = $temp[1];
                        $temp = explode("/",$date);
                        $temp[1] = ucwords($temp[1]);
                        $newdate = $temp[2]."-".$temp[1]."-".$temp[0];
                        $newdate = date("Y-m-d",strtotime($newdate));
				    }
				    else {
				        $temp = explode("-",$str);
				        $time = "08:00:00";
				        $temp[1] = ucwords($temp[1]);
				        if (strlen($temp[2]) < 3) $year = "20".$temp[2];
				        else $year = $temp[2];
				        
                        $newdate = $year."-".$temp[1]."-".$temp[0];
                        $newdate = date("Y-m-d",strtotime($newdate));
				    }
                    
                    
                   
				    $dataArr[] = array("transactionID"=>$data[3], "amount"=>$data[5], "till"=>$data[2],"item"=>$data[6],"qty"=>1,
									"date"=>$newdate,"time"=>$time);
				}
			}
			fclose($csvhandle);
		}
		
	
		
							
		$sql_new = $db->prepare("INSERT INTO `frd_pos_data` (`pd_salenum`, `pd_amount`, `pd_till`, `pd_item`, `pd_qty`, `pd_date`)
							VALUES (:salenum, :amount,:till,:item,:qty,:date)");

		foreach ($dataArr as $key => $value) {
		    
		    var_dump($value);
		    
		    $time = $value["time"];
			$date = $value["date"];
			$datetime = date("$date $time");
			//new DB update
			$sql_new->bindValue(":salenum",$value["transactionID"], PDO::PARAM_STR);
            $sql_new->bindValue(":amount",$value["amount"], PDO::PARAM_STR);
			$sql_new->bindValue(":till",$value["till"], PDO::PARAM_STR);
			$sql_new->bindValue(":item", $value["item"], PDO::PARAM_STR);
			$sql_new->bindValue(":qty", $value["qty"], PDO::PARAM_STR);
			$sql_new->bindValue(":date", $datetime, PDO::PARAM_STR);
			$sql_new->execute();
			
		}
		if(!is_dir("$upload_path/csv_archive")) {
			mkdir("$upload_path/csv_archive", 0777, true);
			chmod("$upload_path/csv_archive", 0777); 
		}
		//unlink("csv_uploads/".$file);
		$date = date("Y-m-d");
		rename("$upload_path/csv_uploads/$file", "$upload_path/csv_archive/$date.$file");
		//echo "success";
		}
    }


    closedir($handle);
}



imap_close($mbox);


?>
