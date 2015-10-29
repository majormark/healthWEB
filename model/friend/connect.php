<?php
class MyDB extends SQLite3
{
    function __construct($db_path)
    {
        $this->open($db_path);
    }
}

?>