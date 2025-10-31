
<main id="main">

<section style="
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    padding: 120px 0;
    min-height: 70vh;
    position: relative;
">
    <!-- Background Texture -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.03;
        background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%231E4D82\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        pointer-events: none;
    "></div>

    <section id="subhero" class="subhero" style="">
        <div class="container">
            <div class="row d-flex align-items-center investmenrow ">
                <div class="col-lg-5 d-flex justify-content-center">
                    <div class="block-head"><span class="fw-bold text-uppercase"><?= $get->title ?></span>
                        <h2 class="block-title"> <span class="block-primary" style="color: #E74C3C !important; font-size: 30px;">Contact Us</span>
                        </h2>
                        <h2>
                            <p class="fs-8">
                               We remain open to any inquiries or questions you might have. Please submit a query in the fields below, and our support team will promptly respond to it. 
                            </p>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-7  mt-5">
                    <img src="./assets/img/NewTemp/contactus/contatcus.png" class="img-fluid" alt="Responsive image">
                </div>

            </div>
        </div>
    </section>
    <?php

require("./php/PHPMailer/PHPMailerAutoload.php");

if ($_POST) {

    $result_message = array();

    // ADD your Email and Name
    $recipientEmail = $get->recipient_email;
    //  $recipientEmail = 'ecem.s@mblhightech.com';
    $recipientName = $get->recipient_name;

    //collect the posted variables into local variables before calling $mail = new mailer

    $senderName = $_POST['contact-name'];
    $senderEmail = $_POST['contact-email'];
    $senderPhone = $_POST['contact-phone'];
    $senderMessage = $_POST['contact-message'];
    $senderSubject =  $get->title . '- New Message From ' . $senderName;
    if (!$senderEmail || !$senderName || !$senderMessage) {
        $result_message['status'] = 'error';
        $result_message['message'] = 'Please fill in all the fields';
        echo json_encode($result_message);
        die();
    }

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Mailer = "smtp";
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $get->user_name;                     //SMTP username
    $mail->Password   = $get->password;                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;


    //Set who the message is to be sent from
    $mail->setFrom($recipientEmail, $recipientName);
    //Set an alternative reply-to address
    $mail->addReplyTo($senderEmail, $senderName);
    //Set who the message is to be sent to
    $mail->addAddress($senderEmail, $senderName);
    //Set the subject line
    $mail->Subject = $senderSubject;

    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }


    $user_ip = getUserIP();



    $message = '<html><body>';
    $message .= '<table rules="all" style="border:1px solid #666;width:300px;" cellpadding="10">';
    $message .= ($senderName) ? "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $senderName . "</td></tr>" : '';
    $message .= ($senderEmail) ? "<tr><td><strong>Email:</strong> </td><td>" . $senderEmail . "</td></tr>" : '';
    $message .= ($senderPhone) ? "<tr><td><strong>Phone:</strong> </td><td>" . $senderPhone . "</td></tr>" : '';
    $message .= ($senderMessage) ? "<tr><td><strong>Message:</strong> </td><td>" . $senderMessage . "</td></tr>" : '';
    $message .= "<tr><td><strong>IP:</strong> </td><td>" .  $user_ip . "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    $mail->Body = $message;

    $mail->MsgHTML($message);
    $mail->AddAddress($recipientEmail, $recipientName);



    if (!$mail->Send()) {
        $result_message['status'] = 'error';
        $result_message['message'] = 'Error';
        // echo json_encode($result_message);
    } else {
        $result_message['status'] = 'success';
        $result_message['message'] = 'Message sent successfully. Thank you. We will contact you shortly.';
        // echo json_encode($result_message);
    }
}
?>

    <!-- ======= About Section ======= -->
    <section class="contactus" id="contactus" style="">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12" style=" background-color: #0A1F44; padding-bottom: 50px; border-radius:15px;">
                    <div class="row">
                        <div class="col-lg-9 m-auto mt-5">
                            <form class="align-self-center sendmessageform" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">

                                        <label class="label  mb-4 text-white" for="contact-name">Name</label>

                                        <input type="text" class="form-control" id="contact-name" name="contact-name" style="width:100%; border:1px solid #E74C3C !important; border-radius:6px; padding:10px; outline:none;">
                                    </div>

                                    <div class=" col-lg-4 mb-4">
                                        <label for="contact-email" class="label  mb-4 text-white">E-mail </label>
                                        <input type="email" class="form-control" id="contact-email" name="contact-email" aria-describedby="emailHelp" style="width:100%; border:1px solid #E74C3C !important; border-radius:6px; padding:10px; outline:none;">
                                    </div>

                                    <div class=" col-lg-4 mb-4">
                                        <label for="contact-phone" class="label  mb-4 text-white"> Phone</label>
                                        <input type="tel" class="form-control" id="contact-phone" name="contact-phone" style="width:100%; border:1px solid #E74C3C !important; border-radius:6px; padding:10px; outline:none;">
                                    </div>

                                    <div class=" col-lg-12 mb-4">
                                        <label for="contact-message" class="label  mb-4" style="display:block; font-weight:600; color: white;"> Message</label>

                                        <textarea class="form-control" id="contact-message" name="contact-message" style="width:100%; border:1px solid #E74C3C !important; border-radius:6px; padding:10px; outline:none;" rows="5"></textarea>

                                    </div>
                                    <div class="mb-4">
                                        <?php
                                        if ($_POST) {
                                            if ($result_message["status"] == 'success') {
                                                echo '<div class="alert alert-success" role="alert">' . $result_message["message"] . '</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">' . $result_message["message"] . '</div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-get-started sendButton" style="background-color:#E74C3C !important; color:#fff !important; padding:12px 20px; font-size:16px; border:none; border-radius:6px; cursor:pointer; transition:background-color 0.3s ease;">Send Message</button>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
                                    </section>

<!-- Ultra-Modern CTA Section -->
<section style="
    background: #0a0e27;
    padding: 0;
    position: relative;
    overflow: hidden;
    border-radius: 40px 40px 0 0;
">
    <!-- Animated Mesh Gradient Background -->
    <div style="
        position: absolute;
        inset: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(30, 77, 130, 0.4) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 140, 0, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(211, 146, 102, 0.2) 0%, transparent 70%);
        animation: meshMove 15s ease infinite;
    "></div>
    
    <!-- Grid Pattern -->
    <div style="
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        opacity: 0.5;
    "></div>
    
    <!-- Glowing Orbs -->
    <div style="
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 140, 0, 0.15), transparent 70%);
        border-radius: 50%;
        top: -150px;
        right: -150px;
        filter: blur(60px);
        animation: pulse 8s ease infinite;
    "></div>
    
    <div style="
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(30, 77, 130, 0.2), transparent 70%);
        border-radius: 50%;
        bottom: -100px;
        left: -100px;
        filter: blur(60px);
        animation: pulse 10s ease infinite reverse;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2; padding: 120px 15px;">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 text-center">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    background: rgba(255, 140, 0, 0.1);
                    border: 1px solid rgba(255, 140, 0, 0.3);
                    color: #e61a38;
                    padding: 8px 20px;
                    border-radius: 30px;
                    font-size: 13px;
                    font-weight: 600;
                    letter-spacing: 1px;
                    margin-bottom: 30px;
                    text-transform: uppercase;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.2s;
                ">
                    Start Your Journey
                </div>
                
                <h2 style="
                    color: white;
                    font-size: clamp(32px, 5vw, 56px);
                    font-weight: 800;
                    margin-bottom: 24px;
                    line-height: 1.2;
                    letter-spacing: -1px;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.3s;
                ">
                    Get Started With <span style="
                        background: linear-gradient(135deg, #e61a38, #d39266);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">TraderTok</span>
                </h2>
                
                <p style="
                    color: rgba(255, 255, 255, 0.8);
                    font-size: 19px;
                    margin-bottom: 45px;
                    font-weight: 300;
                    line-height: 1.7;
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.4s;
                ">
                    Choose your account, deposit funds, and begin trading today.
                </p>
                
                <!-- CTA Button with Micro-interaction -->
                <div style="opacity: 0; animation: fadeInUp 0.8s ease forwards; animation-delay: 0.5s;">
                    <a href="#" style="
                        display: inline-flex;
                        align-items: center;
                        gap: 12px;
                        background: linear-gradient(135deg, #e61a38, #d39266);
                        color: white;
                        padding: 18px 45px;
                        border-radius: 50px;
                        font-weight: 600;
                        font-size: 17px;
                        text-decoration: none;
                        box-shadow: 
                            0 0 0 0 rgba(255, 140, 0, 0.4),
                            0 20px 40px rgba(255, 140, 0, 0.3);
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        position: relative;
                        overflow: hidden;
                    " onmouseover="
                        this.style.transform='translateY(-3px)';
                        this.style.boxShadow='0 0 0 8px rgba(255, 140, 0, 0.2), 0 25px 50px rgba(255, 140, 0, 0.4)';
                    " onmouseout="
                        this.style.transform='translateY(0)';
                        this.style.boxShadow='0 0 0 0 rgba(255, 140, 0, 0.4), 0 20px 40px rgba(255, 140, 0, 0.3)';
                    ">
                        <span>Open Trading Account</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="transition: transform 0.3s ease;">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div style="
                    margin-top: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 40px;
                    flex-wrap: wrap;
                    opacity: 0;
                    animation: fadeIn 0.8s ease forwards;
                    animation-delay: 0.7s;
                ">
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" style="color: #e61a38;">
                            <path d="M10 2L12.39 7.26L18 8.27L14 12.14L15.18 18L10 15.27L4.82 18L6 12.14L2 8.27L7.61 7.26L10 2Z"/>
                        </svg>
                        <span>Trusted Platform</span>
                    </div>
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" style="color: #e61a38;">
                            <path d="M10 1L3 6V10C3 14.55 6.84 18.74 10 19C13.16 18.74 17 14.55 17 10V6L10 1Z" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 10L9 12L13 8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Secure Trading</span>
                    </div>
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" style="color: #e61a38;">
                            <circle cx="10" cy="10" r="8" stroke-linecap="round"/>
                            <path d="M10 6V10L13 13" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>