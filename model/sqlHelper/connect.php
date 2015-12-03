<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('F:/Apache/wamp/www/healthWEB/model/sqlHelper/test.db');
    }
}

?>