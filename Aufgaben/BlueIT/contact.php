<main>
                            <h3>Email versenden</h3>
                            <form action="contact.php" method="post" >
                                <div class="form-group">
                                    
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Freie Stellen</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Produktreklamation</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Produktneuheiten</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-md-1">
                                        <label>Anrede</label>
                                    </div>
                                    <div class="radio col-sm-4 col-md-4" style="margin-top:0px;">
                                        <label><input type="radio" name="r">Frau</label>
                               
                                        <label><input type="radio" name="r">Herr</label>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="text" class="col-sm-1 col-md-1">Vorname*:</label>
                                    <div class="col-sm-5 col-md-5">
                                        <input type="text" class="form-control" name="fn"  required>
                                    </div>
                                
                                    <label for="text" class="col-sm-1 col-md-1">Nachname*:</label>
                                    <div class="col-sm-5 col-md-5">
                                        <input type="text" class="form-control" name="ln"  required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-1 col-md-1">Email Adresse:</label>
                                    <div class="col-sm-5 col-md-5">
                                        <input type="email" class="form-control" name="em" required>
                                    </div>

                                    <label for="text" class="col-sm-1 col-md-1">Betreff:</label>
                                    <div class="col-sm-5 col-md-5">
                                        <input type="text" class="form-control" name="su"  required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-sm-1 col-md-1">Land*:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" class="form-control" name="land"  required>
                                    </div>
                                    <label for="text" class="col-sm-1 col-md-1">Ort*:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" class="form-control" name="vil"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-sm-1 col-md-1">Plz*:</label>
                                    <div class="col-md-5 col-sm-5">
                                        <input type="text" class="form-control" name="dn"  required>
                                    </div>
                                        <label for="text" class="col-sm-1 col-md-1">Straße*:</label>
                                    <div class="col-md-5 col-sm-5">
                                    <input type="text" class="form-control" name="st"  required>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Nachricht*:</label>
                                    <textarea style="resize:vertical;" class="form-control" rows="5" id="comment" name="cm"  required></textarea>
                                </div>

                                <button type="submit" class="btn btn-default" name="submit">Senden</button>
                            </form>
                            </main>



<?php
if(isset($_POST["submit"])) {
    require '/vendor/autoload.php';
//Create a new PHPMailer instance
    $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
    $mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
    $mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';//@TODO
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587; //@TODO
//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls'; //@TODO
//Whether to use SMTP authentication
    $mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "pcc.camerloher@gmail.com";//@TODO
//Password to use for SMTP authentication
    $mail->Password = "luap0200"; //@TODO
//Set who the message is to be sent from
    $mail->setFrom($_POST["em"], 'Server');
//Set an alternative reply-to address
    $mail->addReplyTo('paul.camerloher@gmail.com', 'Paul Camerloher');
//Set who the message is to be sent to
    $mail->addAddress('paul.camerloher@gmail.com', 'Mr. X');
//Set the subject line
    $mail->Subject = $_POST["su"];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->Body = $_POST["cm"];
//Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}
?>
