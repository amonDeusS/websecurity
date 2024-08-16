<?php
    try {
        $vt=new pdo("mysql:host=127.0.0.1;dbname=proje1;charset=utf8;","root","");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>