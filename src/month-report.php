<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Array per data range */
$week_1 = ['October', 'November'];

$p_total_daily = [71.2, 16.01];
$p_paid_search = [145.17, 23.46];
$p_direct = [28.09, 3.88];
$p_organic_search = [-7.41, -10.47];
$p_organic_social = [-37.09, 34.74];
$p_referral = [-46.67, -16.67];

/* #region October - November*/
// october
$p_total_daily = [16.67, 30.32, 86.18, 102.31];
$p_paid_search = [10.73, 67.51, 176.72, 282.4];
$p_direct = [42.38, 15.05, 38.57, 1.96];
$p_organic_search = [9.48, -12.93, -7.58, -23.66];
$p_organic_social = [-31.43, -48.65, -34.15, -29.03];
$p_referral = [125, -54.55, -82.35, -54.55];

// november
$p_total_daily = [79.4, 44.8, -1.03, -1.78];
$p_paid_search = [165.53, 68.97, -1.51, -1.67];
$p_direct = [8.37, 16.03, 8.59, -0.77];
$p_organic_search = [-18.9, -11.72, -20.49, -10];
$p_organic_social = [66.67, 47.37, -18.52, 13.64];
$p_referral = [-100, 20, 66.67, 0];
/* #endregion */

/* #region FUNCTIONS */

/* #region function to daily record */
function records_daily($main_array)
{
    $data_array = array();
    for ($i = 0; $i < count($main_array); $i++) {
        $i_plus = $i + 1;
        if ($i_plus < count($main_array)) {
            $day = $main_array[$i + 1] - $main_array[$i];
            array_push($data_array, $day);
        }
    }

    return $data_array;
}
/* #endregion */

/* #region function to weekly record */
function record_weekly($array_week, $array_lweek)
{
    $data_prom = array();
    for ($i = 0; $i < count($array_week); $i++) {
        for ($j = 0; $j < count($array_lweek); $j++) {
            if ($i == $j) {
                $prom = $array_week[$i] - $array_lweek[$j];
                array_push($data_prom, $prom);
            }
        }
    }

    return $data_prom;
}
/* #endregion */

/* #region function to get the max and min total of records */
function get_max_min($acquisition_data_array)
{
    $new_data_array = array();
    for ($i = 0; $i < count($acquisition_data_array); $i++) {
        if ($acquisition_data_array[$i] < 0) {
            array_push($new_data_array, $acquisition_data_array[$i]);
        } elseif ($acquisition_data_array[$i] > 50) {
            array_push($new_data_array, $acquisition_data_array[$i]);
        }
    }

    return $new_data_array;
}
/* #endregion */

/* #endregion */

/* #region DATA LIST */

/* #region data list (weekly) - 8/16/2023 */

// $week = [16, 17, 18, 19, 20, 21, 22];
$total_week = 498;

$total_daily = [136, 160, 96, 79, 11, 1, 1];
$paid_search = [58, 68, 53, 23, 2, 1, 1];
$direct = [47, 41, 25, 40, 6, 1, 1];
$organic_search = [25, 37, 12, 12, 6, 1, 1];
$organic_social = [6, 12, 5, 4, 3, 1, 1];
$referral = [0, 2, 1, 0, 0, 1, 1];

/* #endregion */

/* #region data list (last week) */
$last_week = [9, 10, 11, 12, 13, 14, 15];
$total_lastWeek = 588;

$l_total_daily = [137, 101, 83, 85, 32, 150, 167];
$l_paid_search = [58, 46, 47, 20, 6, 89, 70];
$l_direct = [48, 28, 15, 52, 16, 36, 63];
$l_organic_search = [26, 25, 17, 10, 8, 21, 28];
$l_organic_social = [4, 1, 3, 2, 1, 3, 5];
$l_referral = [1, 1, 1, 1, 1, 1, 1];

/* #endregion */

/* #region create the final array */
$daily_record = records_daily($total_daily);
$paid_search_data = records_daily($paid_search);
$direct_data = records_daily($direct);
$organic_search_data = records_daily($organic_search);
$organic_social_data = records_daily($organic_social);
$referral_data = records_daily($referral);

$l_daily_record = records_daily($l_total_daily);
$l_paid_search_data = records_daily($l_paid_search);
$l_direct_data = records_daily($l_direct);
$l_organic_search_data = records_daily($l_organic_search);
$l_organic_social_data = records_daily($l_organic_social);
$l_referral_data = records_daily($l_referral);
/* #endregion */

/* #endregion */

// $bg_color = '#e2e2e2';
$bg_color = '#fff';
$cell_red = "#ff8f8f";
$cell_green = "#beecb9";
$actual_date = "08/16/2023 - 08/22/2023";
$last_date = "08/09/2023 - 08/14/2023";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <title>User acquisition - Report</title>
</head>

<body style="font-size: 1.5rem;">

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">User acquisition</h1>
    <p style="font-size: 1.5rem; text-align: center;"><b>Monthly report</b></p>
    <p style="font-size: 1.5rem; text-align: center;"><b>August</b> - <b>September</b></p>    
    <div>
        <div style="width: 12px; height: 12px; background: <?= $cell_green ?>;"></div>
        <p>More than 50% (positive)</p>

    </div>
    <div>
        <div style="width: 12px; height: 12px; background: <?= $cell_red ?>;"></div>
        <p>less than -40% (negative)</p>
    </div>

    <section style="margin-top: 2rem;">

        <section>
            <!-- User acquisition - Total users -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>Total weekly: </strong></p>                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week_1 as $day) : ?>
                                <th><?= $day ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_total_daily as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Paid Search -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Paid Search: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week_1 as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_paid_search as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Direct -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Direct: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week_1 as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_direct as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Organic Search -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Organic search: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week_1 as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_organic_search as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- User acquisition - Organic Social -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> Organic Social: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week_1 as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_organic_social as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?> %</th>
                                <?php else : ?>
                                    <th><?= $record ?> %</th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
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
$dompdf->stream('user_acquisition.pdf', [
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