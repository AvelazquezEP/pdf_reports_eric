<?php
include('header.php');
$inputRadio = pg_fetch_object($obj->getInputRadio());
$getCheck_radio = pg_fetch_object($obj->getCheck_radio());
$getCheck_internet = pg_fetch_object($obj->getCheck_internet());
$getCheck_referral = pg_fetch_object($obj->getCheck_referral());
$getCheck_facebook = pg_fetch_object($obj->getCheck_facebook());
$inputRadio_false = pg_fetch_object($obj->getInputRadio_false());

$getCheck_other = $obj->getCheck_other();
$getStatus_rating = $obj->getStatus_rating();
$star_rating1 = pg_fetch_object($obj->star_rating1());
$star_rating2 = pg_fetch_object($obj->star_rating2());
$star_rating3 = pg_fetch_object($obj->star_rating3());
$star_rating4 = pg_fetch_object($obj->star_rating4());
$star_rating5 = pg_fetch_object($obj->star_rating5());
$getProm_rating = pg_fetch_object($obj->getProm_rating());
?>

<style>
    .formButton {
        margin-top: 4rem;
        margin-left: 80%;
        width: 10%;
        background-color: #0CB5D0;
        padding: 1.5rem 2.4rem;
        border-radius: 0.4rem;
    }

    .formButton:hover {
        background-color: #0899B0;
    }

    .detailButton {
        font-weight: 600;
        color: white;
    }

    .detailButton:hover {
        font-weight: bold;
        color: white;
    }
</style>
<main>
    <div class="container-fluid bg-3 text-center">
        <div class="formButton">
            <a href="customersatisfaction.html" class="detailButton">view form</a>
        </div>
        <h3 class="text-center">Customer Satisfaction</h3>
        <!-- <a href="insert.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-plus-sign"></span> Add</a> -->
        <br>
        <div class="card">
            <p style="font-size: 2rem; font-weight: medium;">1.- Have you ever heard us on the radio?</p>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <th>Yes</th>
                            <th>No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <td><?= $inputRadio->total ?></td>
                            <td><?= $inputRadio_false->radio_false ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <p style="font-size: 2rem; font-weight: medium;">2.- What made you go to our website?</p>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <th>Radio</th>
                            <th>Internet</th>
                            <th>Referral</th>
                            <th>Facebook</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <td><?= $getCheck_radio->c_radio ?></td>
                            <td><?= $getCheck_internet->internet ?></td>
                            <td><?= $getCheck_referral->referral ?></td>
                            <td><?= $getCheck_facebook->facebook ?></td>
                        </tr>
                    </tbody>
                </table>
                <p style="font-size: 2rem; font-weight: medium;">Other</p>
                <div style="display: flex; flex-direction: column; gap: 1rem; overflow: auto; text-align: left; box-shadow: 1px 1px 0.1rem black; border-radius: 0.2rem; height: 80px; margin-bottom: 1rem;">
                    <?php while ($other = pg_fetch_object($getCheck_other)) : ?>
                        <div class="">
                            <p>* <?= $other->check_other ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="card">
            <p style="font-size: 2rem; font-weight: medium;">3.- How do you think it was our service?</p>
            <div style="display: flex; justify-content: center;">
                <div>
                    <p style="font-size: 2rem; font-weight: bold;"><?= $getProm_rating->total ?></p>
                </div>
                <div>
                    <img src="img/star-icon.svg" alt="Star icon" width="25px" height="">
                </div>
            </div>
            <p>average rating</p>
            <div class="container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <th>1 star</th>
                            <th>2 star</th>
                            <th>3 star</th>
                            <th>4 star</th>
                            <th>5 star</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <td><?= $star_rating1->total ?></td>
                            <td><?= $star_rating2->total ?></td>
                            <td><?= $star_rating3->total ?></td>
                            <td><?= $star_rating4->total ?></td>
                            <td><?= $star_rating5->total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</main>

<?php include('footer.php'); ?>