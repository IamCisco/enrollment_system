<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
         $to = "jhnfranciscabral@gmail.com";
         $subject = "This is subject";
         
         $message = "<b>This is HTML message.</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:jhnfranciscabral@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         try {
            $retval = mail ($to,$subject,$message,$header);
            echo "Message sent successfully...";
         } catch (\Exception $th) {
             echo $th->getMessage();
         }
         
      
      ?>
      
   </body>
</html>