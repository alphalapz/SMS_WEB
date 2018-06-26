<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ALPHA PHPMailer</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <br />
    <div class="inner contact">
        <!-- Form Area -->
        <div class="contact-form">
            <h1 align="center">ALPHA</h1>
            <h2 align="center">ALPHA PHPMailer</h2>
            <hr>
            <!-- Form -->
            <form action="mail.php" method="post">
                <!-- Left Inputs -->
                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">

                    <h3>Ingrese su correo y contraseña</h3>
                    <!--<p>Before using your Gmail ID and Password check whether your <a href="https://support.google.com/accounts/answer/6010255?hl=en" target="_blank">Gmail less secure apps</a> is <b>on</b> or <b>not</b>.</p> -->
                    <input type="text" name="email" required class="form" placeholder="Email ID" />

                    <input type="password" name="password" required class="form" placeholder="Password" />

                </div>
                <!-- End Left Inputs -->

                <!-- Right Inputs -->
                <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">

                    <h3>Datos de destino</h3>

                    <input type="email" name="toid" required class="form" placeholder="Para : Email Id " />

                    <input type="text" name="subject" required class="form" placeholder="Asunto" />

                    <textarea name="message" class="form textarea" placeholder="Mensaje"></textarea>
                </div>
                <!-- End Right Inputs -->

                <!--  Submit -->
                    <button type="submit" id="submit" name="send" class="form-btn semibold">Enviar correo</button>
                <!-- End Submit -->
                <!-- Clear -->
                <div class="clear"></div>
            </form>

        </div>
        <!-- End Contact Form Area -->
    </div>
</body>

</html>