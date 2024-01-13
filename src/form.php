<?php

try {

    $radio_input = $_POST['radio_input'];
    $check_radio = $_POST['check_radio'];
    $check_internet = $_POST['check_internet'];
    $check_referral = $_POST['check_referral'];
    $check_facebook = $_POST['check_facebook'];
    $check_other = $_POST['check_other'];
    $status_rating = $_POST['statusRating'];
    $language = $_POST['languagesurvey'];

    /* #region VARIABLES */

    /* #endregion */

    $save_db = save($radio_input, $check_radio, $check_internet, $check_referral, $check_facebook, $check_other, $status_rating, $language);
    echo 'Saved';

    // if ($save_db) {
    //     $newURL = 'https://abogadoericprice.com/thanks.html';
    //     header('Location: ' . $newURL);
    //     // echo 'Saved';
    // }
} catch (Exception $ex) {
}

function save($radio_input, $check_radio, $check_internet, $check_referral, $check_facebook, $check_other, $status_rating, $language)
{
    $host = "abogadoericprice.com";
    $port = "5432";
    $dbname = "dbezl1uquldojv";
    $user = "uhgpgzxv2hhak";
    $password = "700Flower!";

    // $host = "ericp137.sg-host.com";
    // $port = "5432";
    // $dbname = "dbuiptud7sshku";
    // $user = "uggvu5x152osn";
    // $password = "700Flower!";

    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
    $dbconn = pg_connect($connection_string) or die('Could not reach database.');

    /* #region CONDITIONS */

    // if (empty($radio_input) || $radio_input == null) {
    //     $radio_input = false;
    // } else if (empty($check_radio) || $check_radio == null) {
    //     $check_radio = false;
    // } else if (empty($check_internet) || $check_internet == null) {
    //     $check_internet = false;
    // } else if (empty($check_referral) || $check_referral == null) {
    //     $check_referral = false;
    // } else if (empty($check_facebook) || $check_facebook == null) {
    //     $check_facebook = false;
    // } else if (empty($check_other) || $check_other == null) {
    //     $check_other = "N-";
    // } else if (empty($status_rating) || $status_rating == null) {
    //     $status_rating = '0';
    // }

    /* #ENDREGION */

    $sql = "INSERT INTO surveys(radio_input, check_radio, check_internet, check_referral, check_facebook, check_other, status_rating, languagesurvey) " . "VALUES('" . $radio_input . "','" . $check_radio . "','" . $check_internet . "','" . $check_referral . "','" . $check_facebook . "','" . cleanData($check_other) . "','" . cleanData($status_rating) .  "','" . $language . "')";
    return pg_affected_rows(pg_query($sql));
}

function cleanData($val)
{
    return pg_escape_string($val);
}
