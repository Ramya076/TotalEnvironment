<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="homepage">

    <!-- Hero Section -->

    <div class="hero-section">
        <?= $this->render('/partials/header.php') ?>

        <div class="row align-items-center">
            <!-- Hero Content Section -->
            <div class="col-lg-6 col-md-12 hero-content m-auto">
                <h6 class="hero-title">IS THAT QUITE EARTH</h6>

                <p>Avalahalli Main Road, Off Hennur Road, North Bangalore</p>
                <p class="text-center">3, 4 BHK | 1,431 - 3,188 sq.ft*</p>

                <a href="#book" class="btn hero-cta-btn m-auto">Starting From 3.85 Cr*</a>
                <ul class="dotted-border">
                    <li><span><img src="<?= Url::to('@web/web/assets/images/icons/Star.png'); ?>"></span> 50,000 sq. ft. Clubhouse</li>
                    <li><span><img src="<?= Url::to('@web/web/assets/images/icons/Star.png'); ?>"></span> Treetop Walkway</li>
                    <li><span><img src="<?= Url::to('@web/web/assets/images/icons/Star.png'); ?>"></span> 3 BHK earth-sheltered villas</li>
                    <li><span><img src="<?= Url::to('@web/web/assets/images/icons/Star.png'); ?>"></span> Lush Landscape with scenic views</li>
                    <li><span><img src="<?= Url::to('@web/web/assets/images/icons/Star.png'); ?>"></span> State-of-the-art 24/7 security</li>
                </ul>
            </div>

            <!-- Appointment Form Section -->
            <div class="col-lg-6 col-md-12 appointment-form" id="book">
                <!-- Close Button -->

                <h2>Book an Appointment</h2>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'project')->dropDownList([
                    'In That Quiet Earth' => 'In That Quiet Earth',
                    'Pursuit of a Radical Rhapsody' => 'Pursuit of a Radical Rhapsody',
                ], ['prompt' => 'Choose Project'])->label(false) ?>

                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name'])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your Email'])->label(false) ?>
                <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Your Phone Number'])->label(false) ?>
                <?= $form->field($model, 'message')->textarea(['rows' => 4, 'placeholder' => 'Message'])->label(false) ?>
                <div class="form-group form-check col-md-12 d-flex">
                    <input type="checkbox" id="consent-checkbox" required>
                    <label for="consent-checkbox">
                        <small>I authorize Company representative to Call, SMS, Email, or Whatsapp me about the products and offers. This consent overrides any registration for DNC/NDNC.</small>
                    </label>
                </div>


                <div class="form-group">
                    <?= Html::submitButton('Submit Now', ['class' => 'btn btn-block']) ?>
                </div>

                <?php ActiveForm::end(); ?>
                <button class="close-btn" onclick="closeForm()">✖</button>

            </div>

        </div>

    </div>



    <!-- overview section -->
    <section class="overview-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side: Content and Enquiry Button -->
                <div class="col-lg-6 col-md-12 overview-content">
                    <h6 class="section-title">OVERVIEW</h6>
                    <h2 class="section-heading">In That Quiet Earth</h2>
                    <p>In the fast-growing North Bangalore region, In That Quiet Earth by Total Environment is a lavish
                        housing development situated on Avalahalli Main Road, near Hennur Road. The expansion provides
                        large 2, 3, and 4 BHK residences ranging from 1,431 to 3,188 sq. ft., with pricing beginning at
                        INR 1.94 Cr*. These homes are designed with today's families in mind and have earth-sheltered
                        houses, L-shaped designs, and spacious living areas that lead out to landscaped terrace gardens.
                    </p>
                    <p>In That Quiet Earth's residents have access to special features like a 50,000 sq. ft. clubhouse,
                        a treetop walkway, and beautiful scenic views. The site has easy access to prestigious schools,
                        hospitals, shopping centers, and provides convenient proximity to the airport. Moreover, the
                        project offers personalised home choices via the eDesign platform, guaranteeing that each home
                        mirrors the unique preferences of its residents.</p>
                    <a href="#enquiry" class="btn btn-enquiry">Enquire Now</a>
                </div>

                <!-- Right Side: Card with 4 Images -->
                <div class="col-lg-6 col-md-12 overview-images">
                    <div class="image-card">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="<?= Url::to('@web/web/assets/images/overview/image1.png'); ?>" alt="Image 1"
                                    class="overview-img">
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= Url::to('@web/web/assets/images/overview/image2.png'); ?>" alt="Image 2"
                                    class="overview-img">
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= Url::to('@web/web/assets/images/overview/image3.png'); ?>" alt="Image 3"
                                    class="overview-img">
                            </div>
                            <div class="col-sm-6">
                                <img src="<?= Url::to('@web/web/assets/images/overview/image4.png'); ?>" alt="Image 4"
                                    class="overview-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="values-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side: Image -->
                <div class="col-lg-6 col-md-12 values-image">
                    <img src="<?= Url::to('@web/web/assets/images/highlight/image1.png'); ?>" alt="Intelligent Living"
                        class="img-fluid">
                </div>

                <!-- Right Side: Heading and Points -->
                <div class="col-lg-6 col-md-12 values-content">
                    <h6 class="section-title">HIGHLIGHTS</h6>
                    <h2 class="section-heading">VALUES OF INTELLIGENT LIVING IN OUR HOMES</h2>

                    <div class="values-list">
                        <!-- Each point with icon -->
                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/office.png'); ?>"
                                alt="Smart Design Icon" class="value-icon">
                            <p>4 Apartments Per Floor with Green Lobby</p>
                        </div>

                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/night-club.png'); ?>"
                                alt="Energy Efficiency Icon" class="value-icon">
                            <p>Rooftop Clubhouse with Infinity Pool + Ground Floor Clubhouse G+2</p>
                        </div>

                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/floor.png'); ?>"
                                alt="Green Living Icon" class="value-icon">
                            <p>Wooden Floor and Italian Marble Tiles</p>
                        </div>

                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/window.png'); ?>"
                                alt="Home Automation Icon" class="value-icon">
                            <p>Double Glass Window Soundproof Apartment</p>
                        </div>
                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/bath-towel.png'); ?>"
                                alt="Home Automation Icon" class="value-icon">
                            <p>35+ Luxury Amenities</p>
                        </div>
                        <div class="value-item">
                            <img src="<?= Url::to('@web/web/assets/images/highlight/icons/terrace.png'); ?>"
                                alt="Home Automation Icon" class="value-icon">
                            <p>Terrace Amenities</p>
                        </div>
                        <a href="#enquiry" class="btn btn-enquiry">Enquire Now</a>

                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="quality-budget">
        <div class="container">
            <!-- Section Title -->
            <h6 class="section-title text-center">PRICE LIST</h6>
            <h2 class="section-heading text-center">QUALITY THAT FITS YOUR BUDGET</h2>

            <div class="row">
                <!-- Apartment Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="apartment-card">
                        <h3 class="card-title">Apartments</h3>
                        <div class="points-container p-3">
                            <div class="row">
                                <div class="col-6">
                                    <p class="points">Configuration</p>
                                </div>
                                <div class="col-6">
                                    <p class="points">Size: 3 BHK | 2300 Sq.Ft</p>
                                </div>
                            </div>
                            <p class="points">Price Start From: 7.85 Cr*</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="#enquire" class="btn btn-primary enquire-btn">Enquire Now</a>
                            <div class="card-number">01</div>
                        </div>
                    </div>
                </div>

                <!-- Apartment Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="apartment-card">
                        <h3 class="card-title">Apartments</h3>
                        <div class="points-container p-3">
                            <div class="row">
                                <div class="col-6">
                                    <p class="points">Configuration</p>
                                </div>
                                <div class="col-6">
                                    <p class="points">Size: 3.5 BHK | 2750 Sq.Ft</p>
                                </div>
                            </div>
                            <p class="points">Price Start From: 8.25 Cr*</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="#enquire" class="btn btn-primary enquire-btn">Enquire Now</a>
                            <div class="card-number">02</div>
                        </div>
                    </div>
                </div>

                <!-- Apartment Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="apartment-card p-3">
                        <h3 class="card-title">Apartments</h3>
                        <div class="points-container">
                            <div class="row">
                                <div class="col-6">
                                    <p class="points">Configuration</p>
                                </div>
                                <div class="col-6">
                                    <p class="points">Size: 4 BHK | 3100 Sq.Ft</p>
                                </div>
                            </div>
                            <p class="points">Price Start From: 9.35 Cr*</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="#enquire" class="btn btn-primary enquire-btn">Enquire Now</a>
                            <div class="card-number">03</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="properties" class="py-5">
        <div class="container">
            <h6 class="section-title text-center">OUR PLAN</h6>
            <h2 class="section-heading text-center">PRIME RESIDENCES PLANS</h2>

            <div class="row">
                <!-- Plan 1 -->
                <div class="col-md-3 plan-container">
                    <div class="plan-item">
                        <h5>3 BHK Apartment</h5>
                        <div class="plan-image-wrapper">
                            <img src="<?= Url::to('@web/web/assets/images/plan/ITQE.png'); ?>" alt="Plan 1" class="img-fluid">
                            <a href="#" class="btn btn-secondary plan-btn">Download Floor Plan</a>
                        </div>
                    </div>
                </div>

                <!-- Plan 2 -->
                <div class="col-md-3 plan-container">
                    <div class="plan-item">
                        <h5>3.5 BHK Apartment</h5>
                        <div class="plan-image-wrapper">
                            <img src="<?= Url::to('@web/web/assets/images/plan/Floorplan.png'); ?>" alt="Plan 2" class="img-fluid">
                            <a href="#" class="btn btn-secondary plan-btn">Download Floor Plan</a>
                        </div>
                    </div>
                </div>

                <!-- Plan 3 -->
                <div class="col-md-3 plan-container">
                    <div class="plan-item">
                        <h5>4 BHK Apartment</h5>
                        <div class="plan-image-wrapper">
                            <img src="<?= Url::to('@web/web/assets/images/plan/Floorplan.png'); ?>" alt="Plan 3" class="img-fluid">
                            <a href="#" class="btn btn-secondary plan-btn">Download Floor Plan</a>
                        </div>
                    </div>
                </div>

                <!-- Plan 4 -->
                <div class="col-md-3 plan-container">
                    <div class="plan-item">
                        <h5>4 BHK Apartment</h5>
                        <div class="plan-image-wrapper">
                            <img src="<?= Url::to('@web/web/assets/images/plan/Floorplan.png'); ?>" alt="Plan 4" class="img-fluid">
                            <a href="#" class="btn btn-secondary plan-btn">Download Floor Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="luxury-residences">
        <div class="container">
            <h6 class="section-title text-center">Amenities</h6>
            <h2 class="section-heading text-center">STUNNING LUXURY PRIME RESIDENCES, DESIGNED FOR LIFE</h2>

            <!-- Cards Container -->
            <div class="residence-slider">
                <div class="residence-card-wrapper">
                    <!-- Card 1 -->
                    <div class="residence-card col-md-3">
                        <div class='icon-container'>

                            <img src="<?= Url::to('@web/web/assets/images/amenities/icons/book.png'); ?>" alt="Icon 1"
                                class="residence-icon">
                        </div>
                        <div class="residence-info">
                            <h3>Children’s Library</h3>
                            <p class="description">Spark young imaginations with a wealth of books and resources in the
                                inviting children's library</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="residence-card col-md-3">
                        <div class='icon-container'>

                            <img src="<?= Url::to('@web/web/assets/images/amenities/icons/tower.png'); ?>" alt="Icon 2"
                                class="residence-icon">
                        </div>
                        <div class="residence-info">
                            <h3>Tree Museum</h3>
                            <p class="description">The Tree Museum is an enchanting area that honours the extensive
                                variety of trees, understanding their history and classification</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="residence-card col-md-3">
                        <div class='icon-container'>

                            <img src="<?= Url::to('@web/web/assets/images/amenities/icons/amphitheatre.png'); ?>"
                                alt="Icon 3" class="residence-icon">
                        </div>
                        <div class="residence-info">
                            <h3>Amphitheatre</h3>
                            <p class="description">Witness unforgettable performances at the amphitheatre while enjoying
                                comfortable gallery seating</p>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="residence-card col-md-3">
                        <div class='icon-container'>
                            <img src="<?= Url::to('@web/web/assets/images/amenities/icons/swimming-pool.png'); ?>"
                                alt="Icon 4" class="residence-icon">
                        </div>

                        <div class="residence-info">
                            <h3>Heated Pool</h3>
                            <p class="description">Dive into comfort with the heated pool, offering a luxurious swim
                                experience regardless of the weather</p>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="residence-card col-md-3">
                        <div class='icon-container'>

                            <img src="<?= Url::to('@web/web/assets/images/amenities/icons/meditation.png'); ?>" alt="Icon 5"
                                class="residence-icon">
                        </div>
                        <div class="residence-info">
                            <h3>Yoga Deck</h3>
                            <p class="description">Seek tranquillity on the yoga lawn and immerse yourself in the
                                soothing atmosphere of the peaceful surroundings</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="arrow-container">
                <span class="arrow left-arrow" data-direction="left">&#10094;</span> <!-- Left Arrow -->
                <span class="arrow right-arrow" data-direction="right">&#10095;</span> <!-- Right Arrow -->
            </div>
        </div>
    </section>

    <section class="gallery-section">
        <div class="container">
            <h6 class="section-title text-center">GALLERY</h6>
            <h2 class="section-heading text-center">ONCE IN A LIFETIME EXPERIENCE</h2>

            <!-- Image Carousel Container -->
            <div class="gallery-slider">
                <div class="gallery-wrapper">
                    <!-- Gallery Image 1 -->
                    <div class="gallery-image">
                        <img src="<?= Url::to('@web/web/assets/images/gallery/image1.png'); ?>" alt="Gallery Image 1">
                    </div>

                    <!-- Gallery Image 2 -->
                    <div class="gallery-image">
                        <img src="<?= Url::to('@web/web/assets/images/gallery/image2.png'); ?>" alt="Gallery Image 2">
                    </div>

                    <!-- Gallery Image 3 -->
                    <div class="gallery-image">
                        <img src="<?= Url::to('@web/web/assets/images/gallery/image3.png'); ?>" alt="Gallery Image 3">
                    </div>

                    <!-- Gallery Image 4 -->
                    <div class="gallery-image">
                        <img src="<?= Url::to('@web/web/assets/images/gallery/image4.png'); ?>" alt="Gallery Image 4">
                    </div>

                    <!-- Gallery Image 5 -->
                    <div class="gallery-image">
                        <img src="<?= Url::to('@web/web/assets/images/gallery/image5.png'); ?>" alt="Gallery Image 5">
                    </div>
                </div>
            </div>
            <div class="arrow-container">
                <span class="arrow left-arrow" data-direction="left">&#10094;</span> <!-- Left Arrow -->
                <span class="arrow right-arrow" data-direction="right">&#10095;</span> <!-- Right Arrow -->
            </div>
        </div>
    </section>
    <section class="location-advantage">
        <div class="container">
            <div class="row d-flex align-items-stretch">
                <!-- Left Side: Map -->
                <div class="col-lg-6 col-md-12 d-flex">
                    <div class="map-container flex-fill">
                        <img src="<?= Url::to('@web/web/assets/images/map.png'); ?>" alt="Map Image" class="map-image">
                    </div>
                </div>

                <!-- Right Side: Title, Points, and Enquiry Button -->
                <div class="col-lg-6 col-md-12 location-info d-flex flex-column justify-content-between">
                    <div>
                        <h6 class="section-title text-center">LOCATION ADVANTAGE</h6>
                        <h2 class="section-heading text-center">STAY CONNECTED, COMFORTABLE AND CONVENIENT</h2>

                        <div class="location-points">
                            <div class="point">
                                <span class="point-number p-3">01</span>
                                <p>Located next to NH 75 in Yeshwanthpur, West Bangalore, offering excellent connectivity.</p>
                            </div>

                            <div class="point">
                                <span class="point-number p-3">02</span>
                                <p>Just a 2-minute stroll to Goraguntepalya metro station.</p>
                            </div>

                            <div class="point">
                                <span class="point-number p-3">03</span>
                                <p>Only four apartments per floor with enhanced privacy and exclusivity.</p>
                            </div>

                            <div class="point">
                                <span class="point-number p-3">04</span>
                                <p>Located next to the landmark People Tree Hospitals, offering medical services at your
                                    disposal without the worry of travel or city traffic.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Enquiry Button -->
                    <a href="#enquiry" class="btn enquiry-btn">Enquire Now</a>
                </div>
            </div>
        </div>
    </section>



    <section id="schedule-visit" class="schedule-visit py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="section-heading">Schedule a site visit tour</h2>
                    <p>Nothing compares to experiencing a home in person, especially when it's about finding your dream
                        residence. A visit to In That Quiet Earth gives you the chance to fully appreciate the quality
                        of construction and discover the remarkable amenities, such as open-air theater, Heated Swimming
                        Pool, Billiards, Table Tennis, Pet Park, Gymnasium, Multipurpose Hall, and others. The elegance,
                        lush surroundings, and captivating views will truly impress you. Don’t miss out—schedule your
                        site visit today by calling +916361417731 and take the first step toward luxury living.</p>
                    <!--  Button -->
                    <a href="#" class="btn enquiry-btn">Schedule A Site Visit</a>
                </div>

                <div class="col-md-6">
                    <img src="<?= Url::to('@web/web/assets/images/enquire.png'); ?>" alt="Enquire" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <section class="about-builder py-5 text-white">
        <div class="container about-container p-5">
            <h6 class="section-title text-center">BUILDER</h6>
            <h3 class="section-heading text-center text-white">ABOUT BUILDER</h3>
            <p class="lead text-justify">
                Total Environment has been a real estate and design leader for more than twenty years, committed to
                producing outstanding spaces that elevate residential and commercial settings. Their goal is to create
                environments that promote a sense of satisfaction and efficiency by combining professional knowledge,
                advanced technology, and creative approaches. Total Environment incorporates a collaborative strategy,
                combining the skills of architects, artisans, designers, and interior decorators to guarantee each
                project
                showcases high quality and innovation. This team-focused attitude ensures that every space is carefully
                planned to improve the quality of life, enhancing the comfort and enjoyment of living and working
                experiences. </p>
        </div>
    </section>
    <!-- Enquire Section -->

    <section class="enquiry-section py-5">
        <div class="container">


            <div class="row mb-5">


                <div class="col-md-6">
                    <?= $this->render('enquiry.php', ['enquiry' => $enquiry]) ?>


                </div>

                <div class="col-md-6">
                    <!-- Map Section -->
                    <h5>Location Map</h5>
                    <div id="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=YOUR_MAP_EMBED_CODE" width="100%" height="250"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>



</script>