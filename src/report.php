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


/* #region Totals */

$total_status_scheduled_2022 = pg_fetch_object($obj->total_status_scheduled_2022());
$total_status_scheduled_2023 = pg_fetch_object($obj->total_status_scheduled_2023());

/*  */
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

<body style="font-size: 1.5rem;">
    <!-- <h1 style="text-align: center;">Survey report</h1> -->
    <!-- <p style="color: black; text-align: center; font-weight: 600">(English)</p> -->

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Leads Report</h1>
    <p><b>**Before explaining the Status section, it should be noted that the data shown here are a combination of new data together with the migration of April 2022.</b></p>
    <br>
    <small><b>NaN</b>= There are no registered data</small>
    <br>
    <br>
    <p style="font-size: 1.8rem; text-align: center;"><b>Total leads: <?= $getLeads_total->total ?></b></p>
    <p style="font-size: 1.5rem; text-align: center;">Used data: <b>11/11/2022</b> - <b>06-07-2033</b></p>
    <section style="margin-top: 2rem;">
        <p>Our clients are divided into two languages, where Spanish is superior to English</p>
        <?php while ($status = pg_fetch_object($language_name)) : ?>
            <p><?= $status->languagename; ?>: <b><?= $status->languagepercent; ?>%</b></p>
        <?php endwhile; ?>
    </section>
    <br>
    <section>
        <p>We have many leads in different locations, but our largest number of leads concentrates on:
            <br>
            <b> Los Angeles, National and Orange County</b>
        </p>
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
        <p>With this you can take a strategy to give more priority to a certain location from which more customers are needed</p>
    </section>
    <br>
    <section>
        <p>We have several registered cities.There are many leads that have not registered a city</p>
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
        <hr>
        <p>something very similar to states</p>
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

    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    <section>
        <p>Within Salesforce we use different status to differentiate the process in which the client is located</p>
        <p>It can be reviewed that 70% of our cases are completed and that 21% do not qualify to start the process</p>
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

    <p>We can monitor each of our status per month to know what happens with our clients</p>
    <p>With the percentages of each month we can compare our activity with last year and if necessary take certain actions to improve these numbers</p>
    <small><b>**Remember that the month of April 2022 was the migration of data so it is well above all the others</b></small>
    <br>
    <section>
        <p><b>50-Checked In</b></p>

        <p><b>2022</b></p>
        <p>Total: 22026</p>
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

        <p><b>2023</b></p>
        <p>Total: 4135</p>
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
        <p>In general, the numbers of this half of the year are only a little further down compared to last year</p>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- 90-Unqualified -->
    <section>
        <p><b>90-Unqualified</b></p>

        <p><b>2022</b></p>
        <p>Total: 5941</p>
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

        <p><b>2023</b></p>
        <p>Total: 1922</p>
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
        <p>During the month of May 2023 we have had a slight increase in customers who do not qualify to have a process with us</p>
    </section>

    <br>

    <!-- 20-Scheduled -->
    <section>
        <p><b>20-Scheduled</b></p>

        <p><b>2022</b></p>
        <p>Total: <?= $total_status_scheduled_2022->total ?></p>
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

        <p><b>2023</b></p>
        <p>Total: <?= $total_status_scheduled_2023->total ?></p>
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
        <p>During the month of May 2023 we have had a slight increase in customers who do not qualify to have a process with us</p>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- 01-New -->
    <section>
        <p><b>01-New</b></p>

        <p><b>2022</b></p>
        <p>Total: 1</p>
        <p>0% means that all Lead passed to any of the other status, so everyone was given continuing</p>

        <p><b>2023</b></p>
        <p>Total: 1922</p>
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
        <p>In the year 2023 in May it has been where the most new leads have registered and they still do not change the New Status</p>
    </section>

    <br>

    <!-- 60-Missed Consult -->
    <section>
        <p><b>60-Missed Consult</b></p>

        <p><b>2022</b></p>
        <p>Total: 6</p>

        <p>
            0% means that all Lead passed to any of the other status, so everyone was given continuing</p>
        </p>

        <p><b>2023</b></p>
        <p>Total: 442</p>
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
        <p>During this year there has been an increase in Missed Consult, especially during the month of May</p>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- 10-Working -->
    <section>
        <p><b>10-Working</b></p>

        <p><b>2022</b></p>
        <p>Total: 1</p>

        <p>
            0% means that all Lead passed to any of the other status, so everyone was given continuing</p>
        </p>

        <p><b>2023</b></p>
        <p>Total: 283</p>
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
        <p>These leads are what were reviewed and can be a potential client to hire some of our services.</p>
    </section>

    <br>

    <!-- 65-Cancelled Consult -->
    <section>
        <p><b>65-Cancelled Consult</b></p>

        <p><b>2022</b></p>
        <p>Total: 1</p>

        <p>
            0% means that all Lead passed to any of the other status, so everyone was given continuing</p>
        </p>

        <p><b>2023</b></p>
        <p>Total: 11</p>
        <p>These Leads canceled their consultation, so far this year, this does not mean that they are the only ones, rather they were continued to have another consultation</p>
    </section>

    <br>
    <hr>

    <!-- Meeting Type -->
    <section>
        <p><b>Meeting Type</b></p>
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
        <p>Our highest number of quotes are virtual, exceed 50% of the total appointments</p>
        <p>On the other hand, appointments in person barely reach 30% while another one still has no appointment scheduled or already ends its process</p>
        <p>With this in mind you can create a strategy to obtain more appointments in person if so I will require</p>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    <!-- Unqualified Reason -->
    <section>
        <p><b>Unqualified Reasons</b></p>
        <table class="table">
            <tbody>
                <?php while ($status = pg_fetch_object($reason_name)) : ?>
                    <tr>
                        <td><?= $status->reason; ?></td>
                        <td><b><?= $status->reasonpercent; ?>%</b></td>
                        <!-- <td>2</td>
                        <td>3</td> -->
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p>Much of the leads are not registered a reason, This may be because they are leads with some process or they have finished the process</p>
        <p>while the two main reasons when they are a unqualified leads are:</p>
        <p><b>Could not Reach</b> and <b>Requested no Contact</b></p>
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
    'enable_remote' => true
]);


$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

$dompdf->render();
$dompdf->stream('leads_report.pdf', [
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
/* #endregion */
?>