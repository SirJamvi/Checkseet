<?php
/**
 * sso_config.php
 * Konfigurasi SSO untuk Aplikasi: CMS (Checksheet Management System)
 */

// 1. URL Pusat UMS (Sama untuk semua aplikasi)
define('SSO_UMS_URL', 'https://intranet2.ssi.asiasharp.com/ams');

// 2. Identitas Aplikasi Ini
define('SSO_SYSTEM_CODE', 'cms'); 
define('SSO_SYSTEM_URL', 'https://intranet2.ssi.asiasharp.com/cms');

// 3. SECRET KEY untuk CMS
// 🔑 GENERATE BARU dari UMS Dashboard -> System Management
define('SSO_JWT_SECRET', 'q4M1TGLjXfOWLn2laxJkTV6FASeSavDzezOj7gvqU6MaSEC5xW3A2eGHWXDJm0gX');
?>