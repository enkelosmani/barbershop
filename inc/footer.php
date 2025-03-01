<footer class="footer1">
                <div class="ff">
                    <img id="img3" src="images/tweed-logo-footer.png" alt="tweed logo" width="129" height="113">
                    <p id="p4">1313 Washington St </br>
                        Boston, MA 02118 </br>
                        hello@tweedbarbers.com </br>
                        (617) 753-9990</p>
                    <div class="ff2">
                    <h3>HOURS:</h3> 
                    <p>Mon-Thurs 10AM-9PM</br>
                        Fri 10AM-7PM </br>
                        Sat 8AM-6PM  </br>
                        Sun 9AM-5PM</p>
                    </div>
                </div>
            </footer>
    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            fjalekalimi: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            fjalekalimi: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please provide an email",
                email: "Please enter a valid email address"
            }
        }
    });
    $('.slider').slick({
        dots: true,
        // infinite: false,
        // speed: 300,
        nextArrow: false,
        prevArrow: false,
        slidesToShow: 3,
    });
    $('#dalja').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=dalja',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $("#mesazhi").fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=mesazhi',
        });
    });
    </script>    
       </body>
</html>