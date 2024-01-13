<?php

include_once('connection.inc.php');
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string) or die('Could not reach database.');
// pg_connect($connection_string) or die('Could not reach database.');

class Db_Class
{
    function getLeads_total()
    {
        $query = "select count(ls.id) as total
        from lead_sf ls";

        return pg_query($query);
    }

    /* #region Location */

    // function totalLocation()
    // {
    //     $query = "select count(ls.location__c) as total
    //     from lead_sf ls 
    //     where  ls.location__c != 'NaN'";

    //     return pg_query($query);
    // }

    function ledsByLocation()
    {
        $query = "select ls.location__c , count(ls.location__c) as Location_name
        from lead_sf ls 
        group by ls.location__c
        order by count(ls.location__c) desc";

        return pg_query($query);
    }

    function percent_location()
    {
        $query = "select ls.location__c as totalname, round(count(ls.location__c)*100.0 / (select count(ls2.location__c) from lead_sf ls2), 2) as percentlocation
        from lead_sf ls
        group by ls.location__c
        order by count(ls.location__c) desc";

        return pg_query($query);
    }

    function percent_city()
    {
        // --Lead by city
        $query = "select lower(ls.city) as cityname, round(count(lower(ls.city))*100.0 / (select count(lower(ls2.city)) from lead_sf ls2) , 2) as citypercent
        from lead_sf ls
        group by lower(ls.city)
        order by count(ls.city) desc
        limit 10";

        return pg_query($query);
    }

    function percent_state()
    {
        // --Lead by State
        $query = "select lower(ls.state) as statename, round(count(lower(ls.state))*100.0 / (select count(lower(ls2.state)) from lead_sf ls2) , 2) as statepercent
        from lead_sf ls
        group by lower(ls.state)
        order by count(ls.state) desc
        limit 10;";

        return pg_query($query);
    }

    function percent_country()
    {
        // --Lead by Conutry
        $query = "select lower(ls.country) as countryname, round(count(lower(ls.country))*100.0 / (select count(lower(ls2.country)) from lead_sf ls2) , 2) as countrypercent
        from lead_sf ls
        group by lower(ls.country)
        order by count(ls.country) desc
        limit 10;";

        return pg_query($query);
    }

    /* #endregion*/

    function lead_source()
    {
        $query = "select ls.leadsource as namesource, round(count(ls.leadsource)*100.0 / (select count(ls2.leadsource) from lead_sf ls2), 2) as sourcepercent
        from lead_sf ls
        group by ls.leadsource
        order by count(ls.leadsource) desc";

        return pg_query($query);
    }

    function marital_status()
    {
        $query = "select ls.marital_status__c as namestatus, round(count(ls.marital_status__c)*100.0 / (select count(ls2.marital_status__c) from lead_sf ls2), 2) as maritalpercent
        from lead_sf ls
        group by ls.marital_status__c
        order by count(ls.marital_status__c) desc";

        return pg_query($query);
    }

    /* #region STATUS (70, 65, 10, 60, 01, 20. 90, 50) */

    function status()
    {
        $query = "select ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        group by ls.status
        order by count(ls.status) desc";

        return pg_query($query);
    }

    // 50-Check In
    function checkIn_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '50-Checked In' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function checkIn_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '50-Checked In' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 90-Unqualified
    function unqualified_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '90-Unqualified' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function unqualified_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '90-Unqualified' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 20-Scheduled
    function scheduled_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '20-Scheduled' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function scheduled_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '20-Scheduled' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 01-New
    function new_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '01-New' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function new_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '01-New' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 60-Missed Consult
    function missed_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '60-Missed Consult' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function missed_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '60-Missed Consult' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 10-Working
    function working_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '10-Working' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function working_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '10-Working' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 65-Cancelled Consult
    function cancelled_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '65-Cancelled Consult' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function cancelled_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '65-Cancelled Consult' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    // 70-Nurturing
    function nurturing_status_2022()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '70-Nurturing' and extract(year from ls.createddate) = 2022
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    function nurturing_status_2023()
    {
        $query = "select concat(extract(year from ls.createddate), ' ', to_char(ls.createddate,'Mon')) as statusdate, ls.status statusname, round(count(ls.status)*100.0 / (select count(ls2.status) from lead_sf ls2), 2) as statuspercent
        from lead_sf ls
        where ls.status = '70-Nurturing' and extract(year from ls.createddate) = 2023
        group by ls.status, to_char(ls.createddate, 'Mon'), extract(year from ls.createddate)
        order by ls.status, to_char(ls.createddate,'Mon') asc";

        return pg_query($query);
    }

    /* #endregion */


    function meeting_type()
    {
        $query = "select ls.client_meeting_type__c as typename, round(count(ls.client_meeting_type__c)*100.0 / (select count(ls2.client_meeting_type__c) from lead_sf ls2), 2) as typepercent
        from lead_sf ls 
        group by ls.client_meeting_type__c
        order by count(ls.client_meeting_type__c) desc;";

        return pg_query($query);
    }

    function language()
    {
        $query = "select ls.language__c as languagename, round(count(ls.language__c)*100.0 / (select count(ls2.language__c) from lead_sf ls2), 2) as languagepercent
        from lead_sf ls
        group by ls.language__c
        order by count(ls.language__c) desc";

        return pg_query($query);
    }

    function unqualified_reason()
    {
        $query = "select ls.reason_unqualified__c as reason, round(count(ls.reason_unqualified__c)*100.0 / (select count(ls2.reason_unqualified__c) from lead_sf ls2), 2) as reasonpercent
        from lead_sf ls 
        group by ls.reason_unqualified__c
        order by count(ls.reason_unqualified__c) desc";

        return pg_query($query);
    }

    /* #region TOTALS */
    function total_status_scheduled_2022()
    {
        $query = "select count(ls.status) as total
        from lead_sf ls
        where ls.status = '20-Scheduled' and extract(year from ls.createddate) = 2022;";

        return pg_query($query);
    }

    function total_status_scheduled_2023()
    {
        $query = "select count(ls.status) as total
        from lead_sf ls
        where ls.status = '20-Scheduled' and extract(year from ls.createddate) = 2023;";

        return pg_query($query);
    }

    /* #endregion */
}
