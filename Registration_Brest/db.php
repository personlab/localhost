<?php

require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=registration_brest',
        'root', '' ); //for both mysql or mariaDB

session_start();
print_r(session_id());
