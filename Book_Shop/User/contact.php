<?php
include 'header.php';
?>
<div class="main1" id="main1">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>

    </head>
    <style>
    .media {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.contact-info {
    margin-bottom: 25px;
}
        .form-control {
    border: 1px solid #e5e6e9;
    border-radius: 0px;
    height: 48px;
    padding-left: 18px;
    font-size: 13px;
    background: transparent;
        }
        .form-contact textarea {
    border-radius: 0px;
    height: 100% !important;
}
textarea.form-control {
    min-height: calc(1.5em + .75rem + 2px);
}
.w-100 {
    width: 100% !important;
}
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
textarea {
    resize: vertical;
}
input, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y)* -1);
    margin-right: calc(var(--bs-gutter-x) / -2);
    margin-left: calc(var(--bs-gutter-x) / -2);
}
h3 {
    display: block;
    font-size: 1.17em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Playfair Display", serif;
    color: #1a1a1a;
    margin-top: 0px;
    font-style: normal;
    font-weight: 500;
    text-transform: normal;
}
@media (min-width: 1200px) {
    .h3, h3 {
        font-size: 1.75rem;
    }
}
.h3, h3 {
    font-size: calc(1.3rem + .6vw);
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.contact-info .media-body h3 {
    font-size: 16px;
    margin-bottom: 0;
    font-size: 16px;
    color: #2a2a2a;
}
.ti-home:before {
    content: "\e69b";
}
.contact-info__icon i, .contact-info__icon span {
    color: #8f9195;
    font-size: 27px;
}
[class^="ti-"], [class*=" ti-"] {
    font-family: 'themify';
    /* speak: none; */
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
i {
    font-style: italic;
}
body {
    font-family: "Roboto", sans-serif;
    font-weight: normal;
    font-style: normal;
    font-size: 16px;
}
    </style>

    <body>
        <div class="container cont">
            <img src="../image/h2_hero2.jpg.webp" alt="Snow">
            <div class="centered">Contact</div>
        </div>

        <br><br><br>


        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                        <div class="gm-err-container">
                            <div class="gm-err-content">
                                <div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;"></div>
                                <div class="gm-err-title">Oops! Something went wrong.</div>
                                <div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="sendmail.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="11" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" name="send" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-home"></i></span>
                        <div class="media-body ms-4">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-tablet"></i></span>
                        <div class="media-body ms-4">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="fa fa-envelope"></i></span>
                        <div class="media-body ms-4">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var messagetext = "<?php echo $_SESSION['status'] ?? ''; ?>"; // Properly echo the session value
    if (messagetext != '') {
        Swal.fire({
            title: "Thank You!",
            text: messagetext,
            icon: "success"
        });

        // Remove the session status after displaying the message
        <?php unset($_SESSION['status']); ?>
    }
</script>

<script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var grayStyles = [{
                                featureType: "all",
                                stylers: [{
                                        saturation: -90
                                    },
                                    {
                                        lightness: 50
                                    }
                                ]
                            },
                            {
                                elementType: 'labels.text.fill',
                                stylers: [{
                                    color: '#ccdee9'
                                }]
                            }
                        ];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: -31.197,
                                lng: 150.744
                            },
                            zoom: 9,
                            styles: grayStyles,
                            scrollwheel: false
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
                </script>
<?php
include 'footer1.php';
?>