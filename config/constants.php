<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Asia/Dhaka');

/*==================================== MI SESSION STARTS =======================================*/
define('MI_SESSION', true);
/*==================================== MI SESSION ENDS =======================================*/

/*==================================== MI BASE URL =========================================*/

define('MI_BASE_URL', 'http://localhost/git/lawyer/');

/*==================================== MI BASE URL END =========================================*/


/*==================================== MI DB CONFIGURATION ======================================*/
define('MI_DB_HOST', 'localhost');
define('MI_DB_NAME', 'lawyer_management_system');
define('MI_DB_USER', 'root');
define('MI_DB_PASS', '');
/*==================================== MI DB CONFIGURATION END ==================================*/

/*==================================== MI SMTP MAIL CONFIGURATION ======================================*/
define('MI_MAIL_HOST', 'smtp.gmail.com');
define('MI_MAIL_USER', 'islamrakib361@gmail.com');
define('MI_MAIL_PASS', '950235178');
define('MI_MAIL_LAYER', 'tls');
define('MI_MAIL_LAYER_CODE', '587');
define('MI_MAIL_FROM_NAME', 'Soft minion');
define('MI_MAIL_FROM_EMAIL', 'islamrakib361@gmail.com');
/*==================================== MI SMTP MAIL CONFIGURATION END ==================================*/
