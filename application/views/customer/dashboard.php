<!--== SlideshowBg Area Start ==-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <br><br><br>
        </div>
    </div>
</div>
<!--== SlideshowBg Area End ==-->

<!--== Mobile App Area Start ==-->
<br><br>
<div></div>
<section id="mobile-app-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="mobile-app-content">
                    <?php if ($this->session->userdata('nama')) { ?>
                        <h2>BOOK A CAR TODAY!</h2>
                        <p>PLEASE CHOOSE A CAR TO RENT</p>
                        <div class="app-btns">
                            <a href="<?php echo base_url('Customer/Data_mobil') ?>"><i class=""></i> MOBIL</a>

                        </div>
                    <?php } else { ?>
                        <h2>BOOK A CAR TODAY!</h2>
                        <p>PLEASE LOGIN FIRST TO RENT OUR CARS</p>
                        <div class="app-btns">
                            <a href="<?php echo base_url('auth') ?>"><i class=""></i> LOGIN</a>
                            <a href="<?php echo base_url('Register') ?>"><i class=""></i> REGISTER</a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<br>
<!--== Mobile App Area End ==-->