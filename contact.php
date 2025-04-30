<?php
include("admin/config.php");

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Collect and sanitize form inputs
    $f_name = htmlspecialchars(trim($_POST["First-Name"]));
    $l_name = htmlspecialchars(trim($_POST["Last-Name"]));
    $email = htmlspecialchars(trim($_POST["email-2"]));
    $phone = htmlspecialchars(trim($_POST["Phone"]));
    $location = htmlspecialchars(trim($_POST["Location"]));
    $p_name = htmlspecialchars(trim($_POST["Product"]));
    $message = htmlspecialchars(trim($_POST["Message"]));

    // Prepare the SQL query
    $query = "INSERT INTO contact_master (f_name, l_name, email_id, phone_no, location, p_name, msg, req_date_time, status) 
              VALUES (?, ?, ?, ?, ?,?,?, NOW(), 1)";

    if ($stmt = $con->prepare($query)) {
        // Bind parameters to the query
        $stmt->bind_param("sssssss", $f_name, $l_name, $email, $phone, $location,$p_name, $message);

        // Execute the query
        if ($stmt->execute()) {
                echo "<script>alert('Thank you! Your submission has been received!');</script>";
        } 
        else {
                echo "<script>alert('Thank you! Your submission has been received!');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        $feedback_message = '
            <div class="error-message w-form-fail">
                <div class="error-text-block">Database error: Unable to prepare the statement.</div>
            </div>';
    }
}
?>

<?php include 'header.php'; ?>
<section class="section banner-medium">
            <div class="w-layout-blockcontainer base-container w-container">
                <div class="full-width">
                    <div class="banner-wrapper-center">
                        <h1 data-w-id="3f4159ed-1f73-2a57-7667-d43f2f85e7f6"  class="h1-style-medium text-white-bottom-space">Contact&nbspUs</h1>
                        <p data-w-id="3f4159ed-1f73-2a57-7667-d43f2f85e7f8"  class="text-color-white">We're here to help you</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="main-section" style="padding:10px">
        <div class="w-layout-blockcontainer base-container w-container">
                <div class="div-block-3">
                    <div data-w-id="25c36ab2-dc92-6c42-65f7-d28db70b0ee4" class="large-block with-bg-opacity">
                        <h2 class="desktop-margin-left-small margin-bottom-medium text-color-dark">How to Reach Us</h2>
                        <div class="negative-card-wrapper">
                            <div data-w-id="25c36ab2-dc92-6c42-65f7-d28db70b0ee8" class="negative-card-item">
                                <div class="display-flex-horizontal small-gap-center">                             
                                    <h4 class="card-title-width">Customer Support</h4>
                                </div>
                                <p>Our customer support team is ready to assist you with any queries or concerns.</p>
                                <a href="mailto:causewayexim@gmail.com" class="link-all-caps">causewayexim@gmail.com</a>
                            </div>
                            <div data-w-id="25c36ab2-dc92-6c42-65f7-d28db70b0ef0" class="negative-card-item">
                                <div class="display-flex-horizontal small-gap-center">
                                   
                                    <h4 class="card-title-width">Phone Support</h4>
                                </div>
                                <p>If you prefer speaking with us directly, our support hotline is available during business hours.</p>
                                <a href="tel:+12124258617" class="link-all-caps">+919503216573</a>
                            </div>
                            <div data-w-id="25c36ab2-dc92-6c42-65f7-d28db70b0ef8" class="negative-card-item">
                                <div class="display-flex-horizontal small-gap-center">
                                    
                                    <h4 class="card-title-width">Visit Our Office</h4>
                                </div>
                                <p>Please note that visits are by appointment only. To schedule a visit, kindly contact us in advance.</p>
                                <a href="https://www.google.com/maps/place/1-6+Washington+Square+North,+5+Washington+Square+N,+New+York,+NY+10003,+%D0%A1%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D1%96+%D0%A8%D1%82%D0%B0%D1%82%D0%B8+%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8/@40.7311579,-73.9958811,17z/data=!3m1!4b1!4m6!3m5!1s0x89c25990be771c29:0x2767dae5525847b2!8m2!3d40.7311579!4d-73.9958811!16s%2Fg%2F11h_c7rqhg?entry=ttu" target="_blank" class="link-all-caps">Killol Apartment, Pune</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-box" style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3751.721923954497!2d75.32655237428!3d19.893960581486393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdb99db36c5df5d%3A0x42b35cdbd96ec21!2sAurangabad%20Smart%20City%20Development%20Corporation%20Pvt%20Ltd.!5e0!3m2!1sen!2sin!4v1731149709269!5m2!1sen!2sin"
                    width="80%"
                    height="500"
                    style="border: 0; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); max-width: 100%;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="w-layout-blockcontainer base-container w-container">
                <div class="map-holder spacing">
                    <div class="contacts-wrapper">
                        <div data-w-id="66e64b10-ddaf-41f1-e621-5af172c529ad" class="contacts-content-wrapper">
                            <div class="contacts-title">
                                <p class="all-caps-text">Get in touch</p>
                                <h2>Connect with Us Today</h2>
                            </div>
                            <p>Ready to take your logistics to the next level? Contact us today to discover how our tailored solutions and industry expertise can transform your supply chain.</p>
                        </div>
                        <div data-w-id="92a8d9be-2b86-6361-2ecb-849b408b23c7" class="contacts-form-wrapper" id="contact-form">
                            <h3>Send us a message</h3>
                            <div class="form-block-contacts w-form">
                                <form id="email-form" name="email-form" data-name="Email Form" method="Post" class="form-contacts" action="contact.php" data-wf-page-id="670bbbeaca382e5aab533d63" data-wf-element-id="ea41af14-8b87-8ae8-ae5d-f8373dc8aafa">
                                    <div class="div-block-2">
                                        <input class="contacts-input w-input" maxlength="256" name="First-Name" data-name="First Name" placeholder="First Name" type="text" id="First-Name" required=""/>
                                        <input class="contacts-input w-input" maxlength="256" name="Last-Name" data-name="Last Name" placeholder="Last Name" type="text" id="Last-Name" required=""/>
                                    </div>
                                    <div class="div-block-2">
                                        <input class="contacts-input w-input" maxlength="256" name="Phone" data-name="Phone" placeholder="Phone" type="tel" id="Phone" required=""/>
                                        <input class="contacts-input w-input" maxlength="256" name="email-2" data-name="Email 2" placeholder="Email" type="email" id="email-2" required=""/>
                                    </div>
                                    <div class="div-block-2">
                                        <input class="contacts-input w-input" maxlength="256" name="Location" data-name="Location" placeholder="Location" type="text" id="Location" required=""/>
                                        <input class="contacts-input w-input" maxlength="256" name="Product" data-name="Product" placeholder="Product Name" type="text" id="Product" required=""/>
                                    </div>
                                    <textarea placeholder="Message" maxlength="5000" id="Message" name="Message" data-name="Message" required="" class="contacts-textarea w-input"></textarea>
                                    <input type="submit" data-wait="Please wait..." class="primary-button contact-us-button w-button" name="submit" value="Submit"/>
                                </form>
                                
                                <!-- <div class="success-message w-form-done">
                                    <div class="success-text-block">Thank you! Your submission has been received!</div>
                                </div>
                                <div class="error-message w-form-fail">
                                    <div class="error-text-block">Oops! Something went wrong while submitting the form.</div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
    <!-- <section class="section black-bg-bottom-space-small">
            <div class="w-layout-blockcontainer base-container w-container">
                <div class="margin-bottom-medium desktop-large">
                    <h2 data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd1464" class="text-color-white gradient-title-white">The most common questions</h2>
                </div>
                <div class="faq-wrapper-large">
                    <div class="faq-wrapper-medium">
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd1468" class="dropdown-item medium-space w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">What services do you offer?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">We provide a wide range of services including accounting, bookkeeping, tax preparation, financial planning, and consulting for businesses and individuals.</p>
                            </nav>
                        </div>
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd1471"  class="dropdown-item medium-space w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">How do your services benefit?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">Our services ensure accurate financial records, tax compliance, and strategic financial planning, ultimately improving your business &#x27;s financial efficiency and profitability.</p>
                            </nav>
                        </div>
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd147a" class="dropdown-item last-item w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">Are your services customizable to fit my specific needs?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">Are your services customizable to fit my specific needs?Absolutely, our services are tailored to meet your unique requirements. We work closely with clients to understand their needs and customize our solutions accordingly.</p>
                            </nav>
                        </div>
                    </div>
                    <div class="faq-wrapper-medium">
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd1484" class="dropdown-item medium-space w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">What is your pricing structure?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">
                                    Our pricing is competitive and transparent. We offer flexible packages based on the services you require, ensuring affordability and value for your investment.<br/>
                                </p>
                            </nav>
                        </div>
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd148e" class="dropdown-item medium-space w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">Can you assist with tax planning ?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">Yes, we specialize in tax planning, preparation, and filing for businesses and individuals. We stay updated with tax laws and regulations to maximize your tax savings while ensuring compliance.</p>
                            </nav>
                        </div>
                        <div data-hover="false" data-delay="0" data-w-id="6853e56c-18ac-b6af-67a3-4b29d6dd1497" class="dropdown-item last-item w-dropdown">
                            <div class="accordion-toggle-medium w-dropdown-toggle">
                                <h4 style="color:rgb(255,255,255)" class="accordion-title-medium">What sets your company apart from other accounting firms?</h4>
                                <div style="color:rgb(255,255,255);border-color:rgb(255,255,255);-webkit-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(1, 1, 1) rotateX(null) rotateY(null) rotateZ(0deg) skew(0, 0);transform-style:preserve-3d" class="accordion-icon-small"></div>
                            </div>
                            <nav style="height:0px" class="accordion-list-medium w-dropdown-list">
                                <p class="accordion-list-content-medium">We distinguish ourselves through our personalized approach, commitment to accuracy, proactive financial guidance, and dedication to client satisfaction. Our focus is on building long-lasting relationships and delivering exceptional services tailored to your needs.</p>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <script>
    document.querySelectorAll('.accordion-toggle-medium').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const nav = this.nextElementSibling; // Get the adjacent nav element
            const isOpen = nav.style.height && nav.style.height !== '0px';

            // Reset other open dropdowns
            document.querySelectorAll('.accordion-list-medium').forEach(otherNav => {
                if (otherNav !== nav) {
                    otherNav.style.height = '0px';
                }
            });

            // Toggle the clicked dropdown
            nav.style.height = isOpen ? '0px' : `${nav.scrollHeight}px`;
        });
    });

    // Initialize all dropdowns to be closed
    window.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.accordion-list-medium').forEach(nav => {
            nav.style.height = '0px';
        });
    });
</script>
<?php include 'footer.php'; ?>