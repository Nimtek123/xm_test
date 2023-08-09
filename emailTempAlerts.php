#!/usr/bin/php
<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");


require('fpdf.php');


                
class PDF extends FPDF
{
    
    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header
        $w = array(30, 36, 38, 50, 36);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        
        // Data
        for($i=0;$i<count($data);$i++)
        {
            //foreach($row as $col)
            
            //$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');
            //else
                $this->Cell($w[$i],6,$data[$i],1);
        }
        $this->Ln();
    }

    
}


date_default_timezone_set('Australia/Melbourne');


 function error_logging($params){
        
        
        
        
        $type = $params['type'];
        

        $subject = $type;
        $txt = "$type Notification ";


        //mail($to, $subject, $txt, $headers);

        
        $msg =[];
        
    
            $msg = array
                    (
                      
                        'body' 	=> $txt,
                        'title'		=> $subject,
                        'subtitle'	=> '',
                        'tickerText'=> '',
                        'android'   => array(
                        'vibrate'	=> 1,
                        'sound'		=> 'default',
                        ),
                        'largeIcon'	=> 'large_icon',
                        'smallIcon'	=> 'small_icon'
                         
                    );
       
        // API access key from Google API's Console
        define( 'API_ACCESS_KEY', 'AAAALL0c2-c:APA91bFxYmPKVB59kUCWpSNTDnbfjBiJ5Rpr3GuZ4Hd1poefVTbvLISUR_yhxjx8pGqJA9Y3X5xMlQb-yMY1B16fFpnrefuxfk9f81hh6q4rfGcqPPdEqAorDb4RQRF-q_pDvT-52iTc' );
        //$registrationIds = array('cZ67yt-OQKg:APA91bGXabYSkZDOKDWKqnl909k-MZrmHMsXYDti8_pcKkbGIC-mxKhPfAL9VawVDQY5Fj4ys6Knsar-ZmrZOoojQQuiTJwGW53fL07Y30R2hMDOj9Pht9VOv2GBuxvtS-AdkAQxCRLi');
        // prep the bundle
        
        $fields = array
        (
        	'to' 	=> "/topics/notify",
        	'data'			=> $msg
        );
        
         
        $fcmheaders = array
        (
        	'Authorization: key=' . API_ACCESS_KEY,
        	'Content-Type: application/json',
        	'topic: notify'
        );
        
        
         
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $fcmheaders );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        echo $result;

    }
    
    function dispatchEmail($recipient, $subject, $message) {
        try {

            $to = $recipient;

            $messageHtml = '
                            <!doctype html>
                            <html>
                              <head>
                                <meta name="viewport" content="width = device-width" />
                                <meta http-equiv="Content-Type" content="text / html;
                                        charset = UTF-8" />
                                <title>Activate Profile</title>
                                <style>
                                  /* -------------------------------------
                                      GLOBAL RESETS
                                  ------------------------------------- */

                                  /*All the styling goes here*/

                                  img {
                                    border: none;
                                    -ms-interpolation-mode: bicubic;
                                    max-width: 100%; 
                                  }
                                  body {
                                    background-color: #f6f6f6;
                                    font-family: sans-serif;
                                    -webkit-font-smoothing: antialiased;
                                    font-size: 14px;
                                    line-height: 1.4;
                                    margin: 0;
                                    padding: 0;
                                    -ms-text-size-adjust: 100%;
                                    -webkit-text-size-adjust: 100%; 
                                  }
                                  table {
                                    border-collapse: separate;
                                    mso-table-lspace: 0pt;
                                    mso-table-rspace: 0pt;
                                    width: 100%; }
                                    table td {
                                      font-family: sans-serif;
                                      font-size: 14px;
                                      vertical-align: top; 
                                  }
                                  /* -------------------------------------
                                      BODY & CONTAINER
                                  ------------------------------------- */
                                  .body {
                                    background-color: #f6f6f6;
                                    width: 100%; 
                                  }
                                  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                                  .container {
                                    display: block;
                                    margin: 0 auto !important;
                                    /* makes it centered */
                                    max-width: 580px;
                                    padding: 10px;
                                    width: 580px; 
                                  }
                                  /* This should also be a block element, so that it will fill 100% of the .container */
                                  .content {
                                    box-sizing: border-box;
                                    display: block;
                                    margin: 0 auto;
                                    max-width: 580px;
                                    padding: 10px; 
                                  }
                                  /* -------------------------------------
                                      HEADER, FOOTER, MAIN
                                  ------------------------------------- */
                                  .main {
                                    background: #ffffff;
                                    border-radius: 3px;
                                    width: 100%; 
                                  }
                                  .wrapper {
                                    box-sizing: border-box;
                                    padding: 20px; 
                                  }
                                  .content-block {
                                    padding-bottom: 10px;
                                    padding-top: 10px;
                                  }
                                  .footer {
                                    clear: both;
                                    margin-top: 10px;
                                    text-align: center;
                                    width: 100%; 
                                  }
                                    .footer td,
                                    .footer p,
                                    .footer span,
                                    .footer a {
                                      color: #999999;
                                      font-size: 12px;
                                      text-align: center; 
                                  }
                                  /* -------------------------------------
                                      TYPOGRAPHY
                                  ------------------------------------- */
                                  h1,
                                  h2,
                                  h3,
                                  h4 {
                                    color: #000000;
                                    font-family: sans-serif;
                                    font-weight: 400;
                                    line-height: 1.4;
                                    margin: 0;
                                    margin-bottom: 30px; 
                                  }
                                  h1 {
                                    font-size: 35px;
                                    font-weight: 300;
                                    text-align: center;
                                    text-transform: capitalize; 
                                  }
                                  p,
                                  ul,
                                  ol {
                                    font-family: sans-serif;
                                    font-size: 14px;
                                    font-weight: normal;
                                    margin: 0;
                                    margin-bottom: 15px; 
                                  }
                                    p li,
                                    ul li,
                                    ol li {
                                      list-style-position: inside;
                                      margin-left: 5px; 
                                  }
                                  a {
                                    color: #3498db;
                                    text-decoration: underline; 
                                  }
                                  /* -------------------------------------
                                      BUTTONS
                                  ------------------------------------- */
                                  .btn {
                                    box-sizing: border-box;
                                    width: 100%; }
                                    .btn > tbody > tr > td {
                                      padding-bottom: 15px; }
                                    .btn table {
                                      width: auto; 
                                  }
                                    .btn table td {
                                      background-color: #ffffff;
                                      border-radius: 5px;
                                      text-align: center; 
                                  }
                                    .btn a {
                                      background-color: #ffffff;
                                      border: solid 1px #3498db;
                                      border-radius: 5px;
                                      box-sizing: border-box;
                                      color: #3498db;
                                      cursor: pointer;
                                      display: inline-block;
                                      font-size: 14px;
                                      font-weight: bold;
                                      margin: 0;
                                      padding: 12px 25px;
                                      text-decoration: none;
                                      text-transform: capitalize; 
                                  }
                                  .btn-primary table td {
                                    background-color: #3498db; 
                                  }
                                  .btn-primary a {
                                    background-color: #3498db;
                                    border-color: #3498db;
                                    color: #ffffff; 
                                  }
                                  /* -------------------------------------
                                      OTHER STYLES THAT MIGHT BE USEFUL
                                  ------------------------------------- */
                                  .last {
                                    margin-bottom: 0; 
                                  }
                                  .first {
                                    margin-top: 0; 
                                  }
                                  .align-center {
                                    text-align: center; 
                                  }
                                  .align-right {
                                    text-align: right; 
                                  }
                                  .align-left {
                                    text-align: left; 
                                  }
                                  .clear {
                                    clear: both; 
                                  }
                                  .mt0 {
                                    margin-top: 0; 
                                  }
                                  .mb0 {
                                    margin-bottom: 0; 
                                  }
                                  .preheader {
                                    color: transparent;
                                    display: none;
                                    height: 0;
                                    max-height: 0;
                                    max-width: 0;
                                    opacity: 0;
                                    overflow: hidden;
                                    mso-hide: all;
                                    visibility: hidden;
                                    width: 0; 
                                  }
                                  .powered-by a {
                                    text-decoration: none; 
                                  }
                                  hr {
                                    border: 0;
                                    border-bottom: 1px solid #f6f6f6;
                                    margin: 20px 0; 
                                  }
                                  /* -------------------------------------
                                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                                  ------------------------------------- */
                                  @media only screen and (max-width: 620px) {
                                    table[class=body] h1 {
                                      font-size: 28px !important;
                                      margin-bottom: 10px !important; 
                                    }
                                    table[class=body] p,
                                    table[class=body] ul,
                                    table[class=body] ol,
                                    table[class=body] td,
                                    table[class=body] span,
                                    table[class=body] a {
                                      font-size: 16px !important; 
                                    }
                                    table[class=body] .wrapper,
                                    table[class=body] .article {
                                      padding: 10px !important; 
                                    }
                                    table[class=body] .content {
                                      padding: 0 !important; 
                                    }
                                    table[class=body] .container {
                                      padding: 0 !important;
                                      width: 100% !important; 
                                    }
                                    table[class=body] .main {
                                      border-left-width: 0 !important;
                                      border-radius: 0 !important;
                                      border-right-width: 0 !important; 
                                    }
                                    table[class=body] .btn table {
                                      width: 100% !important; 
                                    }
                                    table[class=body] .btn a {
                                      width: 100% !important; 
                                    }
                                    table[class=body] .img-responsive {
                                      height: auto !important;
                                      max-width: 100% !important;
                                      width: auto !important; 
                                    }
                                  }
                                  /* -------------------------------------
                                      PRESERVE THESE STYLES IN THE HEAD
                                  ------------------------------------- */
                                  @media all {
                                    .ExternalClass {
                                      width: 100%; 
                                    }
                                    .ExternalClass,
                                    .ExternalClass p,
                                    .ExternalClass span,
                                    .ExternalClass font,
                                    .ExternalClass td,
                                    .ExternalClass div {
                                      line-height: 100%; 
                                    }
                                    .apple-link a {
                                      color: inherit !important;
                                      font-family: inherit !important;
                                      font-size: inherit !important;
                                      font-weight: inherit !important;
                                      line-height: inherit !important;
                                      text-decoration: none !important; 
                                    }
                                    .btn-primary table td:hover {
                                      background-color: #34495e !important; 
                                    }
                                    .btn-primary a:hover {
                                      background-color: #34495e !important;
                                      border-color: #34495e !important; 
                                    } 
                                  }
                                </style>
                              </head>
                              <body class="">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td class="container">
                                      <div class="content">

                                        <!-- START CENTERED WHITE CONTAINER -->
                                        <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                                        <table role="presentation" class="main">

                                          <!-- START MAIN CONTENT AREA -->
                                          <tr>
                                            <td class="wrapper">
                                              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td>
                                                    
                                                    '.$message.'
                                        <p></p>
                                        </td>
                                        </tr>
                                        </table>
                                        </td>
                                        </tr>

                                        <!--END MAIN CONTENT AREA -->
                                        </table>

                                        <!--START FOOTER -->
                                        <div class = "footer">
                                        <table role = "presentation" border = "0" cellpadding = "0" cellspacing = "0">
                                        <tr>
                                        <td class = "content-block">
                                        <span class = "apple-link">Company Inc, 3 Abbey Road, San Francisco CA 94102</span>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td class="content-block powered-by">
                                                Powered by <a href="http://unified-bi.co.za">UBI</a>.
                                              </td>
                                            </tr>
                                          </table>
                                        </div>
                                        <!-- END FOOTER -->

                                      <!-- END CENTERED WHITE CONTAINER -->
                                      </div>
                                    </td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
                              </body>
                            </html>
                        ';

                        // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: no-reply@glamanoz.com' . "\r\n";
           // $headers .= 'Cc: myboss@example . com  ' . "\r\n";

            mail($to, $subject, $message, $headers);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }



    $filename = '';
    $dataArr  = [];

    
    //For no limits
    //ini_set('memory_limit', -1);
    // open IMAP connection
    $mbox = imap_open('{imap.glamanoz.com:143/notls}', 'cricketau@glamanoz.com', 'golive@2019');
    // or, open POP3 connection
    //echo "<h1>Mailboxes</h1>\n";
    $folders = imap_listmailbox($mbox, "{imap.glamanoz.com:143}", "*");
    

    
    //echo "<h1>Headers in INBOX</h1>\n";
    $headers = imap_headers($mbox);
    
    // grab a header object for the last message in the mailbox
    //$last = imap_num_msg($mbox);
    $headers = imap_headers($mbox);
    $header = end($headers);
    
    $count = imap_num_msg($mbox);
    
   
    
for($msgno = 1; $msgno <= $count; $msgno++) {

    $headers_info = imap_headerinfo($mbox, $msgno);

    if($headers_info->Unseen == 'U') {
        
        $temp =  explode(" ",$headers_info->MailDate);

        $maildate = $temp[1];
        
        // pull the plain text for message $n 
        $st = imap_fetchstructure($mbox, $msgno);
        
        $message = imap_fetchbody($mbox,$msgno, 2);
        
        $Devicepos = strpos($message, "Device S/N:");
       
        $ippos = strpos($message, "Ip");
        
        $EventTime = strpos($message, "EventTime:");
        
        $Temperature = strpos($message, "Temperature:");
        
        $Content = strpos($message, "Content-Id:") + 50;
        
        $lastPos = strrpos($message, "--Apple-Mail");
       
        $len1 = $ippos - $Devicepos;
        
        $len2 = $Temperature - $EventTime;
        
        $len3 = $lastPos - $Content;

    
        $device = trim(substr($message, $Devicepos, $len1));
        $deviceArr = explode(":", $device);
        $_POST['deviceName'] = trim($deviceArr[1]);
        
        $EventDateTime =  trim(substr($message, $EventTime, $len2));
        $EventTimeArr = explode(":", $EventDateTime);
        $_POST['dateTime'] = trim($EventTimeArr[1]);
        
        $Temp = trim(substr($message, $Temperature, 20));
        $TempArr = explode(":", $Temp);
        $_POST['currTemperature'] = trim($TempArr[1]);
        
        $_POST['imageData'] =  trim(substr($message, $Content, $len3));

     
        $orgHost = '';
        $orgID = 2;
        $server = $_SERVER['HTTP_HOST'];
    
    
        $newdb= new PDO(
            'mysql:host=localhost;port=3306;dbname=glamanoz_accounts',
            'glamanoz_account',
            'golive2019');
         
        $sql = $newdb->prepare("SELECT * FROM  `ipa_organisations` WHERE `org_host`=:host");
        $sql->bindValue(":host",$server, PDO::PARAM_STR);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        
       $orgfolder = "ackermans-tembisa";
        $upload_path = '';
        if ($sql->rowCount() > 0){
          
            $dbname = $row['org_db'];
            $dbuser = $row['org_db_user'];
            $dbpass = $row['org_db_pass'];
            
            $orgfolder = $row['org_upload_path'];
            $orgHost = $row['org_host'];
            
             $db= new PDO(
                "mysql:host=localhost;port=3306;dbname=$dbname",
                "$dbuser",
                "$dbpass");
        }
       // echo $orgfolder;
       
       
        
        if(isset($_POST['imageData'])){
            
            $eventSerialNo = "email".rand ( 10000 , 99999 );
            
            $img = $_POST['imageData'];
         
            $deviceName = $_POST['deviceName'];
            
            $timeRaw = $_POST['dateTime'];
            $newdate = explode("+", $timeRaw);
            $date = date("Y-m-d H:i:s",strtotime($newdate[0]));
            
            $currTemperature = $_POST['currTemperature'];
            $currTemperature = round($currTemperature, 2);
            
            //$isAbnomalTemperature = $_POST['isAbnomalTemperature'];
            if($currTemperature > 35.5){
                $isAbnomalTemperature == "true";
            }
            else{
                $isAbnomalTemperature == "false";
            }
    
            
             $sql = $db->prepare("INSERT INTO `frc_temperatures` (`tmp_deviceID`, `tmp_eventID`, `tmp_temperature`, `tmp_isAbnomalTemperature`, `tmp_dateCreated`) 
                                VALUES ( :deviceID, :tmp_eventID, :temperature, :tmp_isAbnomalTemperature, :dateCreated)");
            $sql->bindValue(":deviceID",$deviceName, PDO::PARAM_STR);
            $sql->bindValue(":tmp_eventID",$eventSerialNo, PDO::PARAM_STR);
            $sql->bindValue(":temperature",$currTemperature, PDO::PARAM_STR);
            $sql->bindValue(":tmp_isAbnomalTemperature",$isAbnomalTemperature, PDO::PARAM_STR);
    
            $sql->bindValue(":dateCreated",$date, PDO::PARAM_STR);
            $sql->execute();
        
        
            $sql = $db->prepare("INSERT INTO `frd_temperatureImages` (`tmp_eventID`, `tmp_imageData`) VALUES ( :tmp_eventID, :imageData)");
            $sql->bindValue(":tmp_eventID",$eventSerialNo, PDO::PARAM_STR);
            $sql->bindValue(":imageData",$img, PDO::PARAM_STR);
            $sql->execute();
            
           
            
            $sql = $db->prepare("SELECT * FROM frc_temperatures WHERE tmp_eventID = :tmp_eventID");
            $sql->bindValue(":tmp_eventID",$eventSerialNo, PDO::PARAM_STR);
            $sql->execute();
            
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            
            $deviceName = $row['tmp_deviceID'];
            $date = $row['tmp_dateCreated'];
            $eventSerialNo = $row['eventSerialNo'];
            $currTemperature = $row['tmp_temperature'];
            $isAbnomalTemperature = $row['tmp_isAbnomalTemperature'];
            
            $type = "Temp Alert";
            
            
            $recipient = "rene@glamancorp.com,michael@glamancorp.com,nimrod@glamancorp.com";
            $subject = "Temp Alert Cricket AU";
            $message = '<p>Temp Alert</p>
                        <p>A temperature alert has been detected! </p>
                        <table role="presentation" border="1" cellpadding="0" cellspacing="0" class="btn btn-primary">
                        <thead>
                            <tr> 
                                <th class="text-strong" >Location</td>
                                <th class="text-strong" >Alert Type</th>
                                <th class="text-strong" >Source Camera</th>
                                <th class="text-strong" >Date</th>
                                <th class="text-strong" >Temperature</th>
                            </tr>
                        </thead>
                         <tbody >
    
                            <tr>
                                <td>'.$orgfolder.'</td>
                                <td>
                                '. $type.'
                                </td>
                                <td>
                                    '.$deviceName.'
                                </td>
                                <td>
                                    '.$date.'
                                </td>
                                 <td>
                                    '. round($currTemperature,2).'
                                </td>
                            </tr>
                        </tbody>
                    </table>';
                    
                   $pdf = new PDF();
            // Column headings
            $header = array('Location', 'Alert Type', 'Temperature', 'Source Camera','Date');
            // Data loading
            //$data = ["Austria","Vienna","83859","8075"];//$pdf->LoadData('Austria;Vienna;83859;8075');
            $data = [$orgfolder,$type,$currTemperature, $deviceName,$date];
            $pdf->SetFont('Arial','',10);
            $pdf->AddPage();
            $pdf->BasicTable($header,$data);
            
            $pdf->Ln();   
            
            $pdf->Cell(70,6,"Captured Image",1);
            
            $pdf->Ln();  
            $pic = 'data://text/plain;base64,'. $img;
    
            $pdf->Image($pic,10,50,0,50,'JPG');
            
            //$pdf->Image("https://$orgHost/.platform/raw_data/glamanoz/facial_recognition/faces/$img_name.jpg",80,50,0,50,'JPG');
            $pdf->Ln();
                        
            //$pdf->AddPage();
            //$pdf->ImprovedTable($header,$data);
            //$pdf->AddPage();
            //$pdf->FancyTable($header,$data);
            $pdfFile = $date = date("Y-m-d_H-i-s").".pdf";
            $pdf->Output("F","alertDocs/".$pdfFile);
            
            $message .= '<p>Temperature Alert</p>
                        <p>A temperature alert has been detected! </p>
                        <p>Please click link below to view details!</p>
                        <p><a href="https://'.$orgHost.'/facialrecognition/alertDocs/'.$pdfFile.'">View Match Details</a></p>
                        ';
                    
                                
            if($isAbnomalTemperature == "true") dispatchEmail($recipient, $subject, $message);
        }
  
    



        //var_dump($message);
  
        
        //  $attachments = array();
        //       if(isset($st->parts) && count($st->parts)) {
        //          for($i = 0; $i < count($st->parts); $i++) {
        //           $attachments[$i] = array(
        //               'is_attachment' => false,
        //               'filename' => '',
        //               'name' => '',
        //               'date' => $maildate,
        //               'attachment' => '');
        
        //             if($st->parts[$i]->parts) {
        //                 for($j = 0; $j < count($st->parts[$i]->parts); $j++) {

        //                   if($st->parts[$j]->parts[$j]->ifdparameters) {
        //                      foreach($st->parts[$j]->parts[$j]->dparameters as $object) {
        //                       if(strtolower($object->attribute) == 'filename') {
        //                          $attachments[$j]['is_attachment'] = true;
        //                          $attachments[$j]['filename'] = $object->value;
        //                       }
        //                      }
        //                   }
                
        //                   if($st->parts[$j]->parts[$j]->ifparameters) {
        //                      foreach($st->parts[$j]->parts[$j]->parameters as $object) {
        //                       if(strtolower($object->attribute) == 'name') {
        //                          $attachments[$j]['is_attachment'] = true;
        //                          $attachments[$j]['name'] = $object->value;
        //                       }
        //                      }
        //                   }
                        
            
        //                   if($attachments[$j]['is_attachment']) {
        //                      $attachments[$j]['attachment'] = imap_fetchbody($mbox, $msgno, $j+1);
        //                      if($st->parts[$j]->parts[$j]->encoding == 3) { // 3 = BASE64
        //                       $attachments[$j]['attachment'] = base64_decode($attachments[$j]['attachment']);
        //                      }
        //                      elseif($st->parts[$j]->parts[$j]->encoding == 4) { // 4 = QUOTED-PRINTABLE
        //                       $attachments[$j]['attachment'] = quoted_printable_decode($attachments[$j]['attachment']);
        //                      }
        //                   }  
        //                 }
        //             }
        //          } // for($i = 0; $i < count($structure->parts); $i++)
        //       } // if(isset($structure->parts) && count($structure->parts))
               
        //       //var_dump($attachments);
        //       foreach ($attachments as $attachment) {
        //             if ($attachment['is_attachment'] == 1) {
        //                 $filename = $attachment['name'];
                        
        //                 if (empty($filename))
        //                     $filename = $attachment['date'].'_'.$attachment['filename'];
                
        //                 if (empty($filename))
        //                     $filename = time() . ".dat";
                        
                        
        //                 $temp = explode('.',$filename);
        //                 $title = $temp[0];
                        
        //                 $filename = str_replace(" ", "", $filename);
        //                 $ext = strtolower(substr($filename, -3));
                        
        //                 if ($ext == 'jpeg') {
                    
        //                     $fp = fopen("$upload_path/csv_uploads/$filename", "w+");
        //                     fwrite($fp, $attachment['attachment']);
        //                     fclose($fp);
        //                 }
                        
                      
        //             }
        //         }
    
              
    }
   
}


/*
if ($handle = opendir("$upload_path/email_uploads")) {
    //echo "Directory handle: $handle\n";
    //echo "Entries:\n";

    // This is the correct way to loop over the directory. 
    while (false !== ($entry = readdir($handle))) {
        $temp = explode(".",$entry);
		if(isset($temp[1]))$ext = $temp[1];
		if($ext == "jpeg") {
			//echo "$entry<br>";
				
		$file = $entry;

	
							
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
*/


imap_close($mbox);


?>
