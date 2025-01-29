<?php 
$api_url_slider = $apiurl . 'events/';
$result_slider = fetchDataFromApis($api_url_slider);
?> 

<div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php  foreach ($result_slider as $slider) { ?>
        <div class="swiper-slide">
            <div class="slide_image">
                <a href="event.php?id_event=<?php echo $slider['id_event'] ?>">
                    <img src="<?php echo $slider['image'] ?>" alt="">
                </a>
            </div>
        </div>
        <?php  } ?>
    </div>
    <div class="swiper-pagination"></div>
</div> 