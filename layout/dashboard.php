<?php
include 'navbar.php';
?>
<style>
    h1 {
        font-family: serif;
    }
    body {
        background: url();
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<div class="container text-center">
    <hr>
    <h1 data-aos="fade-down">Welcome</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-4" data-aos="zoom-in">
            <div class="card">
                <img src="/img/private.room.jpg" class="card-img-top" alt="private.room">
                <div class="card-body">
                    <h5 class="card-title">Private Room</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in">
            <div class="card">
                <img src="/img/dining.room.jpg" class="card-img-top" alt="dining.room">
                <div class="card-body">
                    <h5 class="card-title">Main Dining Room</h5>
                    <div class="card-overlay">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in">
            <div class="card">
                <img src="/img/Outdoor.room.jpg" class="card-img-top" alt="Outdoor.room">
                <div class="card-body">
                    <h5 class="card-title">Outdoor Dining Room</h5>
                    <div class="card-overlay">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<?php
include 'footer.php';
?>