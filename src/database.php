<?php

$myjson = <<<JSON
[
    {
        "quote": "quote1",
        "author": "aut1"
    },
    {
        "quote": "quote2",
        "author": "aut2"
    }
]
JSON;

$json = "Current Json data";
$json = json_decode($myjson);
// $json = $json[0]->data;

foreach ($json as $key => $value) {
    echo $value;
    echo "<br/>";
}
