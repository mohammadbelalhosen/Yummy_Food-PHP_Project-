<?php

//*all data deleted in session

session_start();
session_unset();
session_destroy();
  
//* session delete and redirect to index

header("location: ../index.php");