<?php
ob_start();

/* #region DATABASE */
session_start();
// require('db_class.php');

$total_users = 767;

$country_values = [692, 37, 11, 4, 4, 3];
$city_values = [266, 44, 43, 28, 19, 9];
$traffic_acquisition = [319, 267, 160, 14, 10, 1];
$operating_system = [377, 254, 83, 32, 20, 1];
$device_category = [631, 134, 2];
$browser = [338, 337, 36, 26, 20, 7, 3];

/* #region Prom Country */
$prom_country1 = number_format(($country_values[0] * 100) / $total_users, 2) . "%";
$prom_country2 = number_format(($country_values[1] * 100) / $total_users, 2) . "%";
$prom_country3 = number_format(($country_values[2] * 100) / $total_users, 2) . "%";
$prom_country4 = number_format(($country_values[3] * 100) / $total_users, 2) . "%";
$prom_country5 = number_format(($country_values[4] * 100) / $total_users, 2) . "%";
$prom_country6 = number_format(($country_values[5] * 100) / $total_users, 2) . "%";
/* #endregion */

/* #region Prom City*/
$prom_city1 = number_format(($city_values[0] * 100) / $total_users, 2) . "%";
$prom_city2 = number_format(($city_values[1] * 100) / $total_users, 2) . "%";
$prom_city3 = number_format(($city_values[2] * 100) / $total_users, 2) . "%";
$prom_city4 = number_format(($city_values[3] * 100) / $total_users, 2) . "%";
$prom_city5 = number_format(($city_values[4] * 100) / $total_users, 2) . "%";
$prom_city6 = number_format(($city_values[5] * 100) / $total_users, 2) . "%";
/* #endregion */

/* #region Prom Traffic */
$prom_paid_search = number_format(($traffic_acquisition[0] * 100) / $total_users, 2) . "%";
$prom_direct = number_format(($traffic_acquisition[1] * 100) / $total_users, 2) . "%";
$prom_organic_search = number_format(($traffic_acquisition[2] * 100) / $total_users, 2) . "%";
$prom_organic_social = number_format(($traffic_acquisition[3] * 100) / $total_users, 2) . "%";
$prom_referral = number_format(($traffic_acquisition[4] * 100) / $total_users, 2) . "%";
$prom_unassigned = number_format(($traffic_acquisition[5] * 100) / $total_users, 2) . "%";
/* #endregion */

/* #region Prom Operating System */
$prom_ios = number_format(($operating_system[0] * 100) / $total_users, 2) . "%";
$prom_android = number_format(($operating_system[1] * 100) / $total_users, 2) . "%";
$prom_windows = number_format(($operating_system[2] * 100) / $total_users, 2) . "%";
$prom_macintosh = number_format(($operating_system[3] * 100) / $total_users, 2) . "%";
$prom_chome_os = number_format(($operating_system[4] * 100) / $total_users, 2) . "%";
$prom_linux = number_format(($operating_system[5] * 100) / $total_users, 2) . "%";
/* #endregion */

/* #region Prom Device category */
$prom_mobile = number_format(($device_category[0] * 100) / $total_users, 2) . "%";
$prom_desktop = number_format(($device_category[1] * 100) / $total_users, 2) . "%";
$prom_tablet = number_format(($device_category[2] * 100) / $total_users, 2) . "%";
/* #endregion */

/* #region Prom Browser */
$prom_safari = number_format(($browser[0] * 100) / $total_users, 2) . "%";
$prom_chrome = number_format(($browser[1] * 100) / $total_users, 2) . "%";
$prom_safari_app = number_format(($browser[2] * 100) / $total_users, 2) . "%";
$prom_samsung_internet = number_format(($browser[3] * 100) / $total_users, 2) . "%";
$prom_edge = number_format(($browser[4] * 100) / $total_users, 2) . "%";
$prom_android_webview = number_format(($browser[5] * 100) / $total_users, 2) . "%";
$prom_firefox = number_format(($browser[6] * 100) / $total_users, 2) . "%";

/* #endregion */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Google Analytics - Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <h1 style="text-align: center;">Google Analytics</h1>
    <p style="color: black; text-align: center; font-weight: 600">07/08/2023 - 13/08/2023</p>

    <div>
        <p>total users: <b><?= $total_users ?></b></p>
    </div>

    <h2 style="font-size: 2rem; text-align: center;"><strong>Demographic details</strong></h2>
    <!-- #Users by Country -->
    <section>
        <p>Demographic details - Country</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">United States</th>
                    <th style="text-align: center;">México</th>
                    <th style="text-align: center;">Poland</th>
                    <th style="text-align: center;">Not Set</th>
                    <th style="text-align: center;">India</th>
                    <th style="text-align: center;">South Korea</th>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $country_values[0] ?> (<?= $prom_country1 ?>)</th>
                    <th style="text-align: center;"><?= $country_values[1] ?> (<?= $prom_country2 ?>)</th>
                    <th style="text-align: center;"><?= $country_values[2] ?> (<?= $prom_country3 ?>)</th>
                    <th style="text-align: center;"><?= $country_values[3] ?> (<?= $prom_country4 ?>)</th>
                    <th style="text-align: center;"><?= $country_values[4] ?> (<?= $prom_country5 ?>)</th>
                    <th style="text-align: center;"><?= $country_values[5] ?> (<?= $prom_country6 ?>)</th>
                    <!-- <th style="text-align: center;">1 (<b>0.22%</b>)</th> -->
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Users by City -->
    <section>
        <p>Demographic details - City</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">Los Angeles</th>
                    <th style="text-align: center;">Not set</th>
                    <th style="text-align: center;">Chicago</th>
                    <th style="text-align: center;">San Diego</th>
                    <th style="text-align: center;">Mexicali</th>
                    <th style="text-align: center;">Krakow</th>
                </tr>
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $city_values[0] ?> (<?= $prom_city1 ?>)</th>
                    <th style="text-align: center;"><?= $city_values[1] ?> (<?= $prom_city2 ?>)</th>
                    <th style="text-align: center;"><?= $city_values[2] ?> (<?= $prom_city3 ?>)</th>
                    <th style="text-align: center;"><?= $city_values[3] ?> (<?= $prom_city4 ?>)</th>
                    <th style="text-align: center;"><?= $city_values[4] ?> (<?= $prom_city5 ?>)</th>
                    <th style="text-align: center;"><?= $city_values[5] ?> (<?= $prom_city6 ?>)</th>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #User Acquisition -->
    <section>
        <p>User acquisition</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">Paid Search</th>
                    <th style="text-align: center;">Direct</th>
                    <th style="text-align: center;">Organic Search</th>
                    <th style="text-align: center;">Organic Social</th>
                    <th style="text-align: center;">Referral</th>
                    <th style="text-align: center;">Unassigned</th>
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $traffic_acquisition[0] ?> (<?= $prom_paid_search ?>)</th>
                    <th style="text-align: center;"><?= $traffic_acquisition[1] ?> (<?= $prom_direct ?>)</th>
                    <th style="text-align: center;"><?= $traffic_acquisition[2] ?> (<?= $prom_organic_search ?>)</th>
                    <th style="text-align: center;"><?= $traffic_acquisition[3] ?> (<?= $prom_organic_social ?>)</th>
                    <th style="text-align: center;"><?= $traffic_acquisition[4] ?> (<?= $prom_referral ?>)</th>
                    <th style="text-align: center;"><?= $traffic_acquisition[5] ?> (<?= $prom_unassigned ?>)</th>
                </tr>
            </tbody>
        </table>
    </section>

    <br>
    <h2 style="font-size: 2rem; text-align: center;"><strong>Tech overview</strong></h2>

    <!-- #Users by Operating System -->
    <section>
        <p>Tech overview - Operating System</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">IOS</th>
                    <th style="text-align: center;">Android</th>
                    <th style="text-align: center;">Windows</th>
                    <th style="text-align: center;">Macintosh</th>
                    <th style="text-align: center;">Chrome OS</th>
                    <th style="text-align: center;">Linux</th>
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $operating_system[0] ?> (<?= $prom_ios ?>)</th>
                    <th style="text-align: center;"><?= $operating_system[1] ?> (<?= $prom_android ?>)</th>
                    <th style="text-align: center;"><?= $operating_system[2] ?> (<?= $prom_windows ?>)</th>
                    <th style="text-align: center;"><?= $operating_system[3] ?> (<?= $prom_macintosh ?>)</th>
                    <th style="text-align: center;"><?= $operating_system[4] ?> (<?= $prom_chome_os ?>)</th>
                    <th style="text-align: center;"><?= $operating_system[5] ?> (<?= $prom_linux ?>)</th>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- #Users by Device -->
    <section>
        <p>Tech overview - Device</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">Mobile</th>
                    <th style="text-align: center;">Desktop</th>
                    <th style="text-align: center;">Tablet</th>
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $device_category[0] ?> (<?= $prom_mobile ?>)</th>
                    <th style="text-align: center;"><?= $device_category[1] ?> (<?= $prom_desktop ?>)</th>
                    <th style="text-align: center;"><?= $device_category[2] ?> (<?= $prom_tablet ?>)</th>
                </tr>
            </tbody>
        </table>
    </section>


    <!-- #Users by Browser -->
    <section>
        <p>Tech overview - Browser</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="active">
                    <th style="text-align: center;">Safari</th>
                    <th style="text-align: center;">Chrome</th>
                    <th style="text-align: center;">Safari (in-app)</th>
                    <th style="text-align: center;">Samsung Internet</th>
                    <th style="text-align: center;">Edge</th>
                    <th style="text-align: center;">Android Webview</th>
                    <!-- <th style="text-align: center;">Firefox</th> -->
            </thead>
            <tbody>
                <tr align="left">
                    <th style="text-align: center;"><?= $browser[0] ?> (<?= $prom_safari ?>)</th>
                    <th style="text-align: center;"><?= $browser[1] ?> (<?= $prom_chrome ?>)</th>
                    <th style="text-align: center;"><?= $browser[2] ?> (<?= $prom_safari_app ?>)</th>
                    <th style="text-align: center;"><?= $browser[3] ?> (<?= $prom_samsung_internet ?>)</th>
                    <th style="text-align: center;"><?= $browser[4] ?> (<?= $prom_edge ?>)</th>
                    <th style="text-align: center;"><?= $browser[5] ?> (<?= $prom_android_webview ?>)</th>
                    <!-- <th style="text-align: center;"><?= $browser[6] ?> (<?= $prom_firefox ?>)</th> -->
                </tr>
            </tbody>
        </table>
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
$dompdf->stream('google_analytics.pdf', [
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