<?php 

// Regex Nom 
define('REGEXP_STR_NO_NUMBER','/^[A-Za-z-éèêëàâäôöûüç\' ]+$/');

// Regex Password
define('REGEX_STR_PASSWORD', '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/');

// Regex Date & Heure
define('REGEXP_DATE_HOUR',"/^\d{4}-\d{2}-\d{1,2}T\d{2}:\d{2}$/");

// Regex Date & Heure
define('REGEXP_ADRESSE',"/^[0-9]{1,6}[A-Za-z0-9-éèêëàâäôöûüç .,-]+$/");
