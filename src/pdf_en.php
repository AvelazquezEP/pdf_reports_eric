<?php
ob_start();

/* #region DATABASE */
session_start();
require('db_class.php');
$obj = new Db_Class();

$getLeads_total = pg_fetch_object($obj->getLeads_total()); //<-- total leads - +37k
// $totalLocation = pg_fetch_object($obj->totalLocation());
$percent_location_name = $obj->percent_location();
$percent_location_percent = $obj->percent_location();

$percent_city_name = $obj->percent_city();
$percent_city_percent = $obj->percent_city();

$percent_state_name = $obj->percent_state();
$percent_state_percent = $obj->percent_state();

$percent_country_name = $obj->percent_country();
$percent_country_percent = $obj->percent_country();

$marital_name = $obj->marital_status();
$marital_percent = $obj->marital_status();

/* #region STATUS by Month */

$status_name = $obj->status();
$status_percent = $obj->status();

$checkIn_status_2022_date = $obj->checkIn_status_2022();
$checkIn_status_2022_percent = $obj->checkIn_status_2022();
$checkIn_status_2023_date = $obj->checkIn_status_2023();
$checkIn_status_2023_percent = $obj->checkIn_status_2023();

$unqualified_status_2022_date = $obj->unqualified_status_2022();
$unqualified_status_2022_percent = $obj->unqualified_status_2022();
$unqualified_status_2023_date = $obj->unqualified_status_2023();
$unqualified_status_2023_percent = $obj->unqualified_status_2023();

$scheduled_status_2022_date = $obj->scheduled_status_2022();
$scheduled_status_2022_percent = $obj->scheduled_status_2022();
$scheduled_status_2023_date = $obj->scheduled_status_2023();
$scheduled_status_2023_percent = $obj->scheduled_status_2023();

$new_status_2022_date = $obj->new_status_2022();
$new_status_2022_percent = $obj->new_status_2022();
$new_status_2023_date = $obj->new_status_2023();
$new_status_2023_percent = $obj->new_status_2023();

$missed_status_2022_date = $obj->missed_status_2022();
$missed_status_2022_percent = $obj->missed_status_2022();
$missed_status_2023_date = $obj->missed_status_2023();
$missed_status_2023_percent = $obj->missed_status_2023();

$working_status_2022_date = $obj->working_status_2022();
$working_status_2022_percent = $obj->working_status_2022();
$working_status_2023_date = $obj->working_status_2023();
$working_status_2023_percent = $obj->working_status_2023();

$cancelled_status_2022_date = $obj->cancelled_status_2022();
$cancelled_status_2022_percent = $obj->cancelled_status_2022();
$cancelled_status_2023_date = $obj->cancelled_status_2023();
$cancelled_status_2023_percent = $obj->cancelled_status_2023();

$nurturing_status_2022_date = $obj->nurturing_status_2022();
$nurturing_status_2022_percent = $obj->nurturing_status_2022();
$nurturing_status_2023_date = $obj->nurturing_status_2023();
$nurturing_status_2023_percent = $obj->nurturing_status_2023();

/* #endregion  */

$meeting_type_name = $obj->meeting_type();
$meeting_type_percent = $obj->meeting_type();

$language_name = $obj->language();
$language_percent = $obj->language();

$reason_name = $obj->unqualified_reason();
$reason_percent = $obj->unqualified_reason();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Leads - Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <!-- <h1 style="text-align: center;">Survey report</h1> -->
    <!-- <p style="color: black; text-align: center; font-weight: 600">(English)</p> -->

    <div>
        <p><b>total leads: <?= $getLeads_total->total ?></b></p>
        <?php while ($status = pg_fetch_object($language_name)) : ?>
            <p><b><?= $status->languagename; ?>: <?= $status->languagepercent; ?>%</b></p>
        <?php endwhile; ?>
    </div>
    <!-- #Leads by Location -->
    <section>
        <p>Leads by Location</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($location = pg_fetch_object($percent_location_name)) : ?>
                        <th style="text-align: center;"><?= $location->totalname ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($location = pg_fetch_object($percent_location_percent)) : ?>
                        <th style="text-align: center;"><?= $location->percentlocation ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Leads by City -->
    <section>
        <p>Leads by City (first 10)</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($location = pg_fetch_object($percent_city_name)) : ?>
                        <th style="text-align: center;"><?= $location->cityname ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($location = pg_fetch_object($percent_city_percent)) : ?>
                        <th style="text-align: center;"><?= $location->citypercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Leads by State -->
    <section>
        <p>Leads by State (first 10)</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($location = pg_fetch_object($percent_state_name)) : ?>
                        <th style="text-align: center;"><?= $location->statename ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($location = pg_fetch_object($percent_state_percent)) : ?>
                        <th style="text-align: center;"><?= $location->statepercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Leads by Country -->
    <section>
        <p>Leads by Country (first 10)</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($location = pg_fetch_object($percent_country_name)) : ?>
                        <th style="text-align: center;"><?= $location->countryname ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($location = pg_fetch_object($percent_country_percent)) : ?>
                        <th style="text-align: center;"><?= $location->countrypercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Leads by Marital Status -->
    <section>
        <p>Leads by Marital Status</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($marital = pg_fetch_object($marital_name)) : ?>
                        <th style="text-align: center;"><?= $marital->namestatus ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($marital = pg_fetch_object($marital_percent)) : ?>
                        <th style="text-align: center;"><?= $marital->maritalpercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Leads by STATUS -->
    <section>
        <p>Leads by STATUS</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($status_name)) : ?>
                        <th style="text-align: center;"><?= $status->statusname ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($status_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- #Status: Check In -->
    <section>
        <p>Status: Check In</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($checkIn_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($checkIn_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($checkIn_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($checkIn_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 90-Unqualified -->
    <section>
        <p>Status: 90-Unqualified</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($unqualified_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($unqualified_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($unqualified_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($unqualified_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 20-Scheduled -->
    <section>
        <p>Status: 20-Scheduled</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($scheduled_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($scheduled_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($scheduled_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($scheduled_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 01-New -->
    <section>
        <p>Status: 01-New</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($new_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($new_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($new_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($new_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- #Status: 60-Missed Consult -->
    <section>
        <p>Status: 60-Missed Consult</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($missed_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($missed_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($missed_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($missed_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 10-Working -->
    <section>
        <p>Status: 10-Working</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($working_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($working_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($working_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($working_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 65-Cancelled Consult -->
    <section>
        <p>Status: 65-Cancelled Consult</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($cancelled_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($cancelled_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($cancelled_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($cancelled_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Status: 70-Nurturing -->
    <section>
        <p>Status: 70-Nurturing</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($nurturing_status_2022_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($nurturing_status_2022_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($nurturing_status_2023_date)) : ?>
                        <th style="text-align: center;"><?= $status->statusdate ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($nurturing_status_2023_percent)) : ?>
                        <th style="text-align: center;"><?= $status->statuspercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Meeting Type -->
    <section>
        <p>Meeting Type</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($meeting_type_name)) : ?>
                        <th style="text-align: center;"><?= $status->typename ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($meeting_type_percent)) : ?>
                        <th style="text-align: center;"><?= $status->typepercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Unqualified Reason -->
    <section>
        <p>Unqualified Reason</p>
        <div>
            <?php while ($status = pg_fetch_object($reason_name)) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-*-*">
                            <p><b><?= $status->reason; ?></b></p>
                        </div>
                        <div class="col-*-*">
                            <p><b><?= $status->reasonpercent; ?>%</b></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <?php while ($status = pg_fetch_object($reason_name)) : ?>
                        <th style="text-align: center;"><?= $status->reason ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <?php while ($status = pg_fetch_object($reason_percent)) : ?>
                        <th style="text-align: center;"><?= $status->reasonpercent ?>%</th>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table> -->
    </section>

</body>

</html>

<?php

/* #region DOMPDF */
require 'vendor/autoload.php';

use \Dompdf\Dompdf;

$tmp = sys_get_temp_dir();

$dompdf = new Dompdf([
    'logOutputFile' => '',
    // authorize DomPdf to download fonts and other Internet assets
    'isRemoteEnabled' => true,
    // all directories must exist and not end with /
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
]);

$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream('survey_report_english.pdf', [
    'compress' => true,
    'Attachment' => false,
]);

// To render in Browser
$f;
$l;
if (headers_sent($f, $l)) {
    echo $f, '<br/>', $l, '<br/>';
    die('now detect line');
}

?>