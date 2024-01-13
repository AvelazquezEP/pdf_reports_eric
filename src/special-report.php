<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Array per data range */
// 18-23 // 1-6 
// 24-30 // 7-13
$week = ['total'];

/* #region After July  */
$call_rail = [545, 701.5];
$leads_salesforce = [817, 525];
$appointment_set = [528, 341];
$dnr = [4, 21];
$no_show = [60, 68];
$ltfu_nurturing = [0, 0];
$cancelled = [0, 1];
$fu_set = [11, 0];
/* #endregion */

// $bg_color = '#e2e2e2';
$bg_color = '#fff';
// $cell_red = "#ff8f8f";
// $cell_green = "#beecb9";

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

    <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Data report</h1>
    <p style="font-size: 1.5rem; text-align: center;"><b>Leadsource: EP-LA-Radio.Viva</b></p>
    <p style="font-size: 1.5rem; text-align: center;"><b>July</b> - <b>October</b></p>

    <section style="margin-top: 2rem;">

        <section>
            <!-- CALL RAIL -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>CALLRAIL (leads): </strong></p>
                <!-- <small><?= $actual_date ?></small> -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($call_rail as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- SALESFORCE LEAD -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong> SALESFORCE LEADS: </strong></p>
                <p><b>5094</b> Leads created since July. <b>5%</b> are from Ep-la-Radio.viva</p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($leads_salesforce as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Appointment_set -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>APPOINTMENT SET: </strong></p>
                <p>All these belong to Leadsource <b>EP-LA-Radio.Viva</b></p>
                <p><b>20-Scheduled: 69</b></p>
                <p>50-Checked In: 203</p>
                <p>60-Missed Consult: 68</p>
                <p>65-Cancelled Consult: 1</p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($appointment_set as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- DNR -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>DNR: </strong></p>
                <p>Only 4 of this DNR they belong to <b>EP-LA-Radio.Viva</b></p>
                <ul>
                    <li>
                        <a href="https://greencardla.lightning.force.com/lightning/r/Account/001Rg000001rvNpIAI/view">Lead 1 - </a>
                        <a href="https://greencardla.lightning.force.com/lightning/r/Account/0015f00001nsatUAAQ/view">Lead 2 - </a>
                        <a href="https://greencardla.lightning.force.com/lightning/r/Account/0015f00001vslamAAA/view">Lead 3 - </a>
                        <a href="https://greencardla.lightning.force.com/lightning/r/Account/001Rg000000ThJJIA0/view">Lead 4</a>
                    </li>
                </ul>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($dnr as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br>
            <br>
            <br>

            <!-- NO SHOW -->
            <div style="background-color: <?= $bg_color ?>">
                <p> <strong>NO SHOW: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($no_show as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- LTFU NURTURING -->
            <div style="background-color: <?= $bg_color ?>">
                <p><strong>LTFU NURTURING: </strong></p>
                <p>There are no lead created with the Leadsource: <b>ep-la-radio.viva </b> and be of July</p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($ltfu_nurturing as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?> %</th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- CANCELLED -->
            <div style="background-color: <?= $bg_color ?>">
                <p><strong>CANCELLED </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($cancelled as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- FU Set  -->
            <div style="background-color: <?= $bg_color ?>">
                <p><strong>FU SET:</strong></p>
                <p>The following are taken into account:</p>
                <ul>
                    <li>Follow UP Scheduled (Additional Contract, Employment based, Initial Consult)</li>
                </ul>
                <ul>
                    <li>Follow UP Missed Cancelled</li>
                </ul>
                <p>Only 3 of this FU SET are from <b>EP-LA-Radio.Viva</b></p>
                <ul>
                    <li>
                        <a target="_blank" href="https://greencardla.lightning.force.com/lightning/r/Opportunity/006Rg000000Wb7iIAC/view">Opportunity 1 - </a>
                        <a target="_blank" href="https://greencardla.lightning.force.com/lightning/r/Opportunity/006Rg000001LlOPIA0/view">Opportunity 2 - </a>
                        <a target="_blank" href="https://greencardla.lightning.force.com/lightning/r/Opportunity/0065f00000NY9ScAAL/view">Opportunity 3</a>
                    </li>
                </ul>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $day ?></th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($fu_set  as $record) : ?>
                                <?php if ($record < -40) : ?>
                                    <th style="background-color: <?= $cell_red ?>; color:white;"><?= $record ?></th>
                                <?php elseif ($record > 50) : ?>
                                    <th style="background-color: <?= $cell_green ?>"><?= $record ?></th>
                                <?php else : ?>
                                    <th><?= $record ?></th>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
        <br>

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