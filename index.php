<?php include 'includes/header.php'; ?>


<div class="main-banner-2">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="main-banner-content-2">
<h2>Amazing Tour In <br>
<span class="element">Aberdeen</span> </h2>
<h3>7 Days, 8 Night Tour</h3>
</div>
</div>
</div>
</div>
</div>


<div class="offer-area pt-120">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="section-head pb-30">
<h5>Special offer</h5>
<h2>Our Most Recent Adventures</h2>
</div>
</div>
</div>
<div class="offer-slider dark-nav owl-carousel">
    <?php 
       // CHECKING FOR STORIES TILES AND MEDIA FROM DATABASE
        $getRecent = $connect2db->prepare("SELECT * FROM tbl_tour_story ORDER BY id DESC LIMIT 0,3");
        $getRecent->execute();
        if ($getRecent->rowcount() < 1) {?>
            <h1>Storys Not Available</h1>
    <?php  
      }else{ 
      	// FETCHING STORIES TILES AND MEDIA FROM DATABASE
        while ($info = $getRecent->fetch()) {
          $getImage = $connect2db->prepare("SELECT media FROM tbl_media_file WHERE story_id = ?");
          $getImage->execute([$info['id']]);
          $img = $getImage->fetch();
        ?>

        <div class="offer-card">
            <div class="offer-thumb">
                <img src="admin/story_files/<?php echo $img['media']?>" alt="" style="height: 500px;" class="img-fluid">
            </div>
            <div class="offer-details">
                <div class="offer-info">
                     <?php// echo substr($info['tour_description'], 0,150). '...'; ?>
                </div>
                <h3><i class="flaticon-arrival"></i>
                <a href="blog-details?id=<?php echo $info['id']?>"><?php echo $info['tour_title']?></a>
                </h3>
                
            </div>
        </div>

    <?php
        } 
      }
    ?>

    

</div>
</div>
</div>
<div class="review-area mt-120">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="section-head pb-40">
<h5>Our Traveller Say</h5>
<h2>What Oue Traveller Say About Us</h2>
</div>
</div>
</div>
    <div class="review-slider owl-carousel">
        <?php 
            $getFeedback = $connect2db->prepare("SELECT * FROM feedbacks WHERE status = ?");
            $getFeedback->execute([0]);
            if ($getFeedback->rowcount()< 1) {?>
                <h1>Feedback Not Available</h1>
        <?php  
          }else{
            while ($fb = $getFeedback->fetch()) { ?>
                <div class="review-card ">
            <div class="reviewer-img">
                <img src="assets/images/reviewer/reviewer-1.png" alt="" class="img-fluid">
            </div>
            <div class="reviewer-info">
                <h3><?php echo $fb['name']?></h3>
                <h5>Traveller</h5>
                <p><?php echo $fb['text']?></p>
            </div>
        </div>
        <?php  
             }
          }
        ?>
    </div>
</div>
</div>







<?php include 'includes/footer.php';?>