<?php
ob_start();
session_start();

$total = 0;
$total_last_week = 0;

/* #region Array per data range */
// 18-23 // 1-6 
// 24-30 // 7-13
$week = [9, 10, 11, 12, 13, 14, 15];
$month = [01, 01];

/* #region Weekly data */

/* #region Percent August */
$p_total_daily = [9.47, -12.68, 13.78, 16.29];
$p_paid_search = [1.5, -12.3, 5.92, 5.52];
$p_direct = [16.06, -22.36, -9.63, -7.44];
$p_organic_search = [24.37, 3.4, 26.36, -25.49];
$p_organic_social = [-14.29, 36.36, 990, 1246.29];
$p_referral = [-25, 0, 0, -20];
/* #endregion */

/* #region Percent September */
$p_total_daily = [-20.61, 1.08, -22.32, -25.22];
$p_paid_search = [-6.49, 7.93, -10.9, -17.85];
$p_direct = [-47.75, -15.23, -27.84, -10.84];
$p_organic_search = [-21.62, -3.29, -19.02, 14.91];
$p_organic_social = [191.67, 146.67, -62.39, -83.77];
$p_referral = [-33.33, 0, 112.5, -8.33];
/* #endregion */

/* #region Percent October */
$p_total_daily = [16.67, 30.32, 86.18, 102.31];
$p_paid_search = [10.73, 67.51, 176.72, 282.4];
$p_direct = [42.38, 15.05, 38.57, 1.96];
$p_organic_search = [9.48, -12.93, -7.58, -23.66];
$p_organic_social = [-31.43, -48.65, -34.15, -29.03];
$p_referral = [125, -54.55, -82.35, -54.55];
/* #endregion */

/* #region Percent November */
$p_total_daily = [79.4, 44.8, -1.03, -1.78];
$p_paid_search = [165.53, 68.97, -1.51, -1.67];
$p_direct = [8.37, 16.03, 8.59, -0.77];
$p_organic_search = [-18.9, -11.72, -20.49, -10];
$p_organic_social = [66.67, 47.37, -18.52, 13.64];
$p_referral = [-100, 20, 66.67, 0];
/* #endregion */

/* #endregion */

/* #region OLD DATE */

/* #region Percent 5 - 11 July */
$p_total_daily = [-39.67, 9.27, 16.95, 65.71, 42.42, 23.49, 79.57];
$p_paid_search = [-26.23, 50, 48.72, 36.36, 300, 34.85, 13.85];
$p_direct = [-61.46, -11.59, -21.05, 114.29, 6.67, 18.64, 194.44];
$p_organic_search = [9.09, 4.17, 35, -18.18, 7.69, -4.35, 288.89];
$p_organic_social = [50, -50, 0, -100, 100, 0, 200];
$p_referral = [-33.33, -50, 50, 100, 0, 0, 0];
/* #endregion */

/* #region Percent 12 - 18 July */
// $p_total_daily = [39.64, -18.18, -30.43, -13.79, -8.51, -18.48, -13.17];
// $p_paid_search = [37.78, -15.38, -24.14, -6.67, -31.25, -22.47, -6.76];
// $p_direct = [43.24, -31.15, -40, -25.33, 31.25, -24.29, -7.55];
// $p_organic_search = [45.83, -16, -22.22, 77.78, -35.71, 13.64, -37.14];
// $p_organic_social = [0, 300, -66.67, 0, -50, 50, 33.33];
// $p_referral = [0, -50, -33.33, -100, 0, -50, -50];
/* #endregion */

/* #region Percent 19 - 25 July */
// $p_total_daily = [10.97, 11.11, 8.33, -10, -6.98, 13.33, 13.79];
// $p_paid_search = [24.19, -10.61, 6.82, -39.29, -18.18, 14.49, -18.84];
// $p_direct = [24.53, 38.1, 48.15, -1.79, -23.81, 9.43, 42.86];
// $p_organic_search = [-37.14, 33.33, -33.33, -6.25, 0, 8, 63.64];
// $p_organic_social = [-33.33, -50, -50, 0, 0, 0, -50];
// $p_referral = [200, -100, 0, 0, 0, 200, 100];
/* #endregion */

/* #region Percent 26 july - 01 August */
// $p_total_daily = [-11.05, -29.33, 10.58, -25.56, -12.5, 6.47, -8.48];
// $p_paid_search = [-10.39, -32.2, -12.77, -5.88, 44.44, 13.92, -14.29];
// $p_direct = [-9.09, -34.48, -12.5, -38.18, -43.75, 1.72, 4.29];
// $p_organic_search = [-22.73, -7.14, 142.86, 0, 33.33, 18.52, -19.44];
// $p_organic_social = [150, -50, 200, 0, 100, -66.67, 0];
// $p_referral = [-66.67, -66.67, 0, -66.67, -100, -100, -100];
/* #endregion */

/* #region Percent 02 - 08 August */
// $p_total_daily = [1.96, 9.43, -5.22, 20.9, -28.57, 3.31, 9.93];
// $p_paid_search = [4.35, 25, 36.59, 68.75, -46.15, -6.67, 10.42];
// $p_direct = [-6.67, -10.53, -25.71, 20.59, 0, 13.56, -39.73];
// $p_organic_search = [64.71, 7.69, -23.53, -40, -33.33, 0, 24.14];
// $p_organic_social = [-80, 200, -33.33, 200, -50, 200, -50];
// $p_referral = [-100, 100, -50, 100, 0, 0, 0];
/* #endregion */

/* #region Percent 09 - 15 August */
// $p_total_daily = [-7.05, -1.72, -16.51, 17.28, 36, -15.51, 31.62];
// $p_paid_search = [-18.06, 4, -16.07, -14.81, -14.29, 8.33, 39.62];
// $p_direct = [-10.71, -8.82, -26.92, 39.02, 66.67, -38.21, 50];
// $p_organic_search = [10.71, 3.57, -23.08, 33.33, 37.5, -25, -8.33];
// $p_organic_social = [300, -66.67, 50, -33.33, 0, 0, 400];
// $p_referral = [0, 0, 100, -50, 0, 0, -33.33];
/* #endregion */

/* #region Percent 16-22 August */
// $p_total_daily = [-0.73, 58.42, 15.66, -7.06, -15.63, 60.13, -18.44];
// $p_paid_search = [0, 47.83, 12.77, -23.08, 50, -1.1, -43.24];
// $p_direct = [-2.08, 46.43, 66.67, 15, -62.5, 43.9, -65.15];
// $p_organic_search = [-3.85, 48, -29.41, 20, 400, 2366.67, -48.48];
// $p_organic_social = [50, 1100, 66.67, 100, -33.33, 12.5, 660];
// $p_referral = [-100, 100, 0, -100, -100, 200, -50];
/* #endregion */

/* #region Percent 23-29 August */
// $p_total_daily = [-4.58, -34.5, -10.28, -26.97, -37.93, -68.38, -55.74];
// $p_paid_search = [-8.33, -30.99, -33.98, -76, -60, -65.56, -12.12];
// $p_direct = [5.45, -14.89, 20.69, 0, 0, -71.19, -46.58];
// $p_organic_search = [-13.33, -62.5, -18.75, -43.75, -58.33, -51.85, -3.85];
// $p_organic_social = [0, -27.27, 20, 50, -60, -98.65, -96.88];
// $p_referral = [0, -50, 400, -100, 0, -100, 50];
/* #endregion */

/* #region Percent 30-05 September */
// $p_total_daily = [-6.85, 3.57, 5.21, -32.31, -57.58, -44.52, -15.82];
// $p_paid_search = [12.73, -4.08, 21.62, 166.67, 0, -24.36, -37.93];
// $p_direct = [-29.31, -22.5, -20, -81.82, -100, -72.5, 23.08];
// $p_organic_search = [7.69, 106.67, 84.62, 66.67, -33.33, -59.09, 8];
// $p_organic_social = [0, -50, -33.33, -33.33, -80, -50, -40];
// $p_referral = [-100, 200, -100, 0, -100, 0, -66.67];
/* #endregion */

/* #region Percent 06-12 September */
// $p_total_daily = [91.52, 27.66];
// $p_paid_search = [31.58, 27.49];
// $p_direct = [111.57, 52.94];
// $p_organic_search = [22.11, 6.48];
// $p_organic_social = [769.43, 30];
// $p_referral = [133.33, 200];
/* #endregion */

/* #region 13-19 September */
// $p_total_daily = [-56.52, 2.27, 6.54, -10.42, -34.29, -48.09, -52.14];
// $p_paid_search = [-70.59, 1.43, 29.79, 24.14, -45.45, -73.53, -67.19];
// $p_direct = [-44.83, 0, -34.38, -38.78, -50, -51.85, -54.29];
// $p_organic_search = [-66.67, 18.18, 5, -31.25, -50, -57.14, -48.48];
// $p_organic_social = [-85.71, -28.57, 12.5, 150, -100, -83.33, -75];
// $p_referral = [-80, 100, 0, 300, 0, 50, -100];
/* #endregion */

/* #region 20-26 September */
// $p_total_daily = [11.27, -50.37, -11.4, 2.33, -71.43, -27.82, -28.3];
// $p_paid_search = [-8.96, -69.01, -21.31, -47.22, -100, -56.52, -66.67];
// $p_direct = [45.24, -46.88, 28.57, 60, -68.75, -32.35, -33.33];
// $p_organic_search = [34.78, -46.15, 0, -47.22, -28.57, -40.91, -26.09];
// $p_organic_social = [-12.5, -80, -55.56, -40, -100, 0, -60];
// $p_referral = [-100, -100, 0, -100, -100, -66.67, 0];
/* #endregion */

/* #region 26 September - 02 October*/
// $p_total_daily = [9.43, -18.99, -40.16, -6.3, 6.82, 36.84, -53.02];
// $p_paid_search = [-28.57, -26.23, -61.67, -14.58, 94.74, 100, -100];
// $p_direct = [58.33, -21.31, -36.67, -33.33, -16.66, 0, -63.27];
// $p_organic_search = [-8.7, -22.58, -29.17, 23.81, -16.67, 11.11, 50];
// $p_organic_social = [40, 14.29, -85.71, 50, -33.33, 200, -83.33];
// $p_referral = [0, 0, 0, 200, 0, 0, -66.67];
/* #endregion */

/* #region 26 September - 02 October*/
// $p_total_daily = [18.97, -42.19, -34.68, 39.36, -8.51, 42.11, 8.11];
// $p_paid_search = [133.33, -95.56, -98.18, 70.73, -21.62, -100, -96.49];
// $p_direct = [-28.07, -54.17, -53.66, 72.22, -2.5, -28.57, -38.89];
// $p_organic_search = [4.76, 45.83, 91.3, -15.38, 13.33, 77.78, 300];
// $p_organic_social = [-28.57, -100, 150, -33.33, -50, 100, -50];
// $p_referral = [-100, -100, -50, 0, 0, 0, -100];
/* #endregion */

/* #region 10 October - 16 October*/
// $p_total_daily = [-21.01, -21.17, -17.69, 17.56, 24.42, -43.48, -31.31];
// $p_paid_search = [-98.57, -98.44, -98.36, 15.71, 48.28, -96.55, -100];
// $p_direct = [-53.66, 2.33, 26.32, 35.48, 15.38, 22.22, 78.38];
// $p_organic_search = [154.55, 39.29, 47.62, 18.18, 5.88, 40, 52];
// $p_organic_social = [-100, -100, -100, -25, 100, -66.67, 0];
// $p_referral = [0, 0, 0, -33, -100, 0, 0];
/* #endregion */

/* #region 17 October - 23 October*/
// $p_total_daily = [-32.56, -23.53, -14.12, 43.51, 22.43, -45.65, -38.2];
// $p_paid_search = [-81.13, -83.18, -78.64, 122.22, 44.19, -71.43, -64.33];
// $p_direct = [-14.29, 21.95, 30, -35.71, 17.78, 0, 19.3];
// $p_organic_search = [21.05, 21.05, 48, -42.31, -27.78, -20, -74.19];
// $p_organic_social = [-100, -50, 0, -66.67, 50, -100, -87.5];
// $p_referral = [0, 0, 0, -100, 0, 0, -100];
/* #endregion */

/* #region 24 October - 30 October*/
// $p_total_daily = [-35.68, -45.33, -65.56, 22.78, 3.82, -15.79, -56.83];
// $p_paid_search = [-66.05, -81.05, -90.61, 33.33, 37.1, -45.45, -87.37];
// $p_direct = [6.67, -12.77, -46.97, -6.9, 37.1, 42.86, 25.49];
// $p_organic_search = [-50, -23.53, -33.33, 25, -30.77, -71.43, -57.89];
// $p_organic_social = [-33.33, -100, 0, -80, 0, -50, -66.67];
// $p_referral = [-100, 0, 0, 0, 0, 0, 0];
/* #endregion */

/* #region 31 October - 06 November*/
// $p_total_daily = [-68.49, -49.8, -24.26, 1.67, -37.5, -41.94, -38.13];
// $p_paid_search = [-86.19, -75.16, -66.98, -0.74, -52.94, -87.5, -70.21];
// $p_direct = [-59.09, -45.31, -26.83, 3.45, -27.03, 11.76, 10];
// $p_organic_search = [-79.17, -39.13, -58.82, 16.67, 33.33, -50, -33.33];
// $p_organic_social = [-100, -60, -25, -20, 66.67, 0, 100];
// $p_referral = [-50, -100, -100, 0, -100, 0, -100];
/* #endregion */

/* #region 07 October - 13 November*/
// $p_total_daily = [-46.61, 33.33, -45.02, 7.1, 36.47, -36.21, -55.39];
// $p_paid_search = [-81.51, 38.13, -80, 13.43, 35, -66.67, -86.26];
// $p_direct = [-10.53, 31.58, 21.05, -16.67, 66.67, -22.22, 46.51];
// $p_organic_search = [-56.52, 9.09, -52.38, 14.29, -16.67, 20, -52.38];
// $p_organic_social = [0, 0, 0, -25, -20, -50, -80];
// $p_referral = [-100, 0, 0, 0, 0, 0];
/* #endregion */

/* #region 07 October - 13 November*/
// $p_total_daily = [-39.61, -11.76, -43.17, -5.61, 35.34, 42.03, -55.09];
// $p_paid_search = [-82.18, -25, -48.95, -11.84, 66.67, 92.11, -84];
// $p_direct = [-7.14, 34, 20.93, 52, -4.44, -5.56, -18.75];
// $p_organic_search = [-41.18, 4.17, -78.26, -18.75, 100, -27.27, 30];
// $p_organic_social = [-88.89, -20, -88.89, -100, 25, -100, 33.33];
// $p_referral = [0, 0, 0, 0, 0, 0, 0];
/* #endregion */

/* #region 21 November - 27 November*/
// $p_total_daily = [-65.02, -42.92, -52.68, -2.16, -31.85, -75.51, -37.6];
// $p_paid_search = [-80.69, -75, -75.68, 11.94, -11.11, -89.04, -83.15];
// $p_direct = [-55.22, -11.94, -41.38, -55.26, -53.49, -58.82, 46.3];
// $p_organic_search = [-72, -76, -69.23, -15.38, -70, -62.5, -36.84];
// $p_organic_social = [-80, -25, -33.33, 0, -80, 0, -25];
// $p_referral = [-66.67, -100, -100, 0, 0, -100, 0];
/* #endregion */

/* #region 28 November - 04 December*/
// $p_total_daily = [-42.56, -49.17, -52.11, 15.47, 16.82, -18.37, -56.89];
// $p_paid_search = [-78.88, -89.16, -80.25, 0.67, 1.25, -56, -90.63];
// $p_direct = [-5, 15.09, 26.32, 117.65, 45, 42.86, 47.06];
// $p_organic_search = [23.08, -25, 120, 9.09, 116.67, -75, -50];
// $p_organic_social = [-42.86, -80, -75, 150, 0, -100, -83.33];
// $p_referral = [0, -100, 0, 200, 0, 0, 100];
/* #endregion */

/* #region 05 December - 11 December */
// $p_total_daily = [-54.49, -53.16, -34.15, -12.92, 0.8, -65.52, -56.05];
// $p_paid_search = [-79.31, -85.81, -52.5, -8.61, -17.28, -94.03, -81.3];
// $p_direct = [-34.07, -3.77, -5.88, -5.41, 55.17, 45.45, -7.55];
// $p_organic_search = [-61.54, -65, -82.05, -50, -15.38, -87.5, -20];
// $p_organic_social = [-62.5, -88.89, -85.71, -80, 200, 0, -50];
// $p_referral = [0, 0, -100, -66.67, -50, -100, -100];
/* #endregion */

/* #region 12 December - 18 December */
// $p_total_daily = [-54.37, -57.92, -48.13, -9.89, -6.35, -62.86, -58.82];
// $p_paid_search = [-86.11, -87.5, -90.98, -23.91, 14.93, -88.57, -88.65];
// $p_direct = [11.54, -21.57, 35.71, -14.29, -44.44, -42.86, 59.57];
// $p_organic_search = [-34.78, -50, 50, 283.33, 45.45, -60, -72.73];
// $p_organic_social = [-83.33, -57.14, -80, 500, -100, -100, -80];
// $p_referral = [-100, -50, 0, 0, -100, 0, -100];
/* #endregion */

/* #region 19 December - 25 December */
// $p_total_daily = [-49.01, -45.87, 14.36, -3.66, -5.08, -40.91, -14.98];
// $p_paid_search = [-85, -81.7, 9.36, 25.71, 20.78, -24.24, 7.81];
// $p_direct = [5, 40, 40.54, -50, -76, -75, -80.85];
// $p_organic_search = [-57.14, -25, 4.76, -56.52, -37.5, -25, -65.22];
// $p_organic_social = [-100, -87.5, 0, -83.33, 0, -50, -60];
// $p_referral = [0, 0, -25, -100, 0, 100, 0];
/* #endregion */

/* #region 19 December - 25 December */
// $p_total_daily = [-10.3, -48.23, -10.39, 63.23, 74.11, 128.21, -52.86];
// $p_paid_search = [23.88, -87.23, -4.73, 52.27, 92.47, 228, -93.72];
// $p_direct = [-67.95, 1.56, -11.54, 166.67, 50, 0, 744.44];
// $p_organic_search = [-10.53, -37.5, -27.27, 30, -40, -100, -50];
// $p_organic_social = [0, 0, -66.67, 300, -100, -50, -100];
// $p_referral = [-100, -100, -33.33, 0, -50, -50, 0];
/* #endregion */

/* #region 02 January - 08 January */
// $p_total_daily = [-23.92, -39.82, -40.01, -13.95, -15.9, -46.07, -64.16];
// $p_paid_search = [-83.73, -81.61, -77.3, -21.89, -51.4, -68.29, -91.5];
// $p_direct = [272, 173.91, 43.48, -5, 555.56, 160, 231.25];
// $p_organic_search = [-17.65, -61.9, -18.75, 53.85, 0, 0, 114.29];
// $p_organic_social = [-100, -100, -50, 25, 100, 100, -50];
// $p_referral = [0, 0, 0, 0, -100, -100, 100];
/* #endregion */
/* #endregion */

/* #region 09 January - 15 January */
$p_total_daily = [-60.59, -58.81, -43.01];
$p_paid_search = [-81.19, -90.91, -79.08];
$p_direct = [-20.55, 3.17, 42];
$p_organic_search = [-53.57, -35, -48.28];
$p_organic_social = [100, -100, -100];
$p_referral = [-100, -100, 0];
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
    <p style="font-size: 1.5rem; text-align: center;"><b><?= $week[0] ?>/<?= $month[0] ?>/2023</b> - <b><?= $week[6] ?>/<?= $month[1] ?>/2023</b></p>
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
                <p> <strong>Total Daily: </strong></p>
                <!-- <small><?= $actual_date ?></small> -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?>/<?= $day ?>/2023</th>
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
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?>/<?= $day ?>/2023</th>
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
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?><?= $day ?>/2023</th>
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
                <p> <strong> Organic Search: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?><?= $day ?>/2023</th>
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
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?>/<?= $day ?>/2023</th>
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

            <!-- User acquisition - Referral -->
            <div style="background-color: <?= $bg_color ?>">
                <p><strong> Referral: </strong></p>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="active">
                            <?php foreach ($week as $day) : ?>
                                <th><?= $month[0] ?>/<?= $day ?>/2023</th>
                                <!-- <th><?= $day ?></th> -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="left">
                            <?php foreach ($p_referral as $record) : ?>
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