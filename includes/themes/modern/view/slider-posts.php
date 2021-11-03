<?php

/// get data from database
$token_slider = 59784613256;
$sql_slider = "SELECT * FROM plugins WHERE token = $token_slider";
$result_slider = $conn->query($sql_slider);
if ($result_slider->num_rows > 0) {
    // output data of each row
    while ($row = $result_slider->fetch_assoc()) {
        $status_slider = $row['status'];
        $category_slider = $row['category'];
    }
}

// to check if enabled
$set_status_to_1_slider = 1;
$set_category_to_0_slider = 0;

if ($category_slider == $set_category_to_0_slider) {

    $sliders = getSlidersFromAllPosts($conn);
} else {

    $sliders = getSliders($conn, $category_slider);
}

if ($status_slider == $set_status_to_1_slider) {
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <style>
        .owl-carousel .item {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: clip;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background: #1266f1;
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                lazyLoad: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })
    </script>

    <div class="owl-carousel owl-theme mt-5">
        <?php
        $c = 1;
        foreach ($sliders as $slider) {
            if ($c > 1) {
                $sw = "";
            } else {
                $sw = "active";
            }
        ?>
            <div class="item">
                <a href="<?= $slider['slug'] ?>"><img src="<?php echo _SITE_URL ?>/assets/images/upload/<?= getPostThumb($conn, $slider['id']) ?>" alt="">
                    <h6 maxlength="10"><?= $slider['title'] ?></h6>
                </a>
            </div>
        <?php
            $c++;
        }
        ?>
    </div>

<?php
} else {
}
?>