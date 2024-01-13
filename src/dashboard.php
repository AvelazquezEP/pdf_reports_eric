<?php
include('header.php');
$getTotal_en = pg_fetch_object($obj->getTotal_en());
$getTotal_es = pg_fetch_object($obj->getTotal_es());
?>

<style>
    .containerItem {
        margin: 0 auto;
        margin-top: 8rem;
        max-width: 90%;
    }

    .table_row {
        padding: 2rem 0;
    }

    .language {
        color: #A9A9A9;
    }

    .button {
        /* background-color: #22ADEE; */
        /* background-color: #ora; */
        padding: .7rem .9rem;
        border-radius: 0.4rem;
        color: #545151;
        font-weight: 400;
        text-decoration: underline;
    }

    /* .button:hover {
        scale: 1.1;
        color: black;
    } */
</style>

<!-- DATA TABLE -->
<section class="containerItem">
    <table class="table surveyTable">
        <thead>
            <tr class="active">
                <th>Survey</th>
                <th>Answers</th>
                <th>Details</th>
                <th>Export</th>
            </tr>
        </thead>
        <tbody>
            <tr align="left" class="table_row">
                <td>
                    Atención al cliente
                    <br>
                    <small class="language">Spanish</small>
                </td>
                <td><?= $getTotal_es->total ?></td>
                <td><a class="button" href="atencion-cliente.php">view</a></td>
                <td>
                    <a target="_blank" href="pdf_es.php">
                        <img src="img/pdf-icon.svg" alt="Star icon" width="35px" height="">
                    </a>
                </td>
            </tr>
            <tr align="left" class="table_row">
                <td>
                    Customer Satisfaction
                    <br>
                    <small class="language">English</small>
                </td>
                <td><?= $getTotal_en->total ?></td>
                <td><a class="button" href="customer-satisfaction.php">view</a></td>
                <td>
                    <a target="_blank" href="pdf_en.php">
                        <img src="img/pdf-icon.svg" alt="Star icon" width="35px" height="">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<?php include('footer.php'); ?>