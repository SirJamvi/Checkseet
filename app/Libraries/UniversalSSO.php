<?php

namespace App\Libraries;

/**
 * UNIVERSAL SSO LIBRARY - CI4 VERSION
 * Compatible with CodeIgniter 4
 */

class UniversalSSO {
    
    private $umsUrl;
    private $systemCode;
    private $systemUrl;
    private $jwtSecret;
    private $loginUrl;
    private $logoutUrl;
    private $callbackUrl;

    // Konfigurasi Timeout (Detik)
    private $idleTimeout = 3600;         // 60 menit
    private $maxSessionDuration = 28800; // 8 Jam
    private $warningTime = 300;          // 5 Menit
    
    public function __construct() {
        // Load config dari root folder
        $configFile = ROOTPATH . 'sso_config.php';

        if (file_exists($configFile)) {
            require_once $configFile;
        } else {
            die('<h3>SSO Error: Config Missing</h3>
                 <p>File <code>sso_config.php</code> tidak ditemukan.</p>
                 <p>Path: ' . ROOTPATH . '</p>
                 <p>Buat file sso_config.php di /var/www/cms/sso_config.php</p>');
        }

        // Validasi konstanta
        if (!defined('SSO_JWT_SECRET')) {
            die('<h3>SSO Error: Invalid Config</h3>
                 <p>Konstanta SSO_JWT_SECRET belum didefinisikan.</p>
                 <p>Periksa file sso_config.php</p>');
        }

        // Load settings
        $this->umsUrl      = rtrim(SSO_UMS_URL, '/');
        $this->systemCode  = SSO_SYSTEM_CODE;
        $this->systemUrl   = rtrim(SSO_SYSTEM_URL, '/');
        $this->jwtSecret   = SSO_JWT_SECRET;

        // URL UMS
        $this->loginUrl    = $this->umsUrl . '/login';
        $this->logoutUrl   = $this->umsUrl . '/logout'; 
        
        // Callback URL
        $this->callbackUrl = $this->systemUrl . '/index.php';

        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public function authenticate() {
        // 1. Cek Timeout
        $this->checkSessionTimeout();
    
        // 2. Cek Session Lokal (Sudah Login?)
        if (isset($_SESSION['sso_user']) && isset($_SESSION['sso_authenticated']) && $_SESSION['sso_authenticated'] === true) {
            $_SESSION['sso_last_activity'] = time();
            return $_SESSION['sso_user'];
        }
        
        // 3. Cek Token dari URL (support both 'jwt' and 'token' parameters)
        $token = $_GET['jwt'] ?? $_GET['token'] ?? null;
        
        if ($token) {
            $userData = $this->validateJWT($token);
            
            if ($userData) {
                // Set Session PHP Native
                $_SESSION['sso_authenticated'] = true;
                $_SESSION['sso_user'] = $userData;
                $_SESSION['sso_login_time'] = time();
                $_SESSION['sso_last_activity'] = time();
                
                // Map ke session legacy
                $this->mapToLegacySession($userData);
                
                // JANGAN redirect di sini, return data user
                return $userData;
            } else {
                // Token invalid -> Redirect ulang ke UMS
                $this->redirectToUMS();
            }
        }
        
        // 4. Belum Login sama sekali -> Lempar ke UMS
        $this->redirectToUMS();
    }
    
    private function validateJWT($jwt) {
        try {
            $parts = explode('.', $jwt);
            if (count($parts) !== 3) return false;
            
            list($header64, $payload64, $signature64) = $parts;
            
            $signatureCheck = $this->base64UrlEncode(
                hash_hmac('sha256', "$header64.$payload64", $this->jwtSecret, true)
            );
            
            if (!hash_equals($signature64, $signatureCheck)) return false;
            
            $payload = json_decode($this->base64UrlDecode($payload64), true);
            if (!$payload) return false;
            
            // Validasi expired
            if (isset($payload['exp']) && ($payload['exp'] + 60) < time()) return false;

            // Validasi system code
            if (isset($payload['data']['system_code']) && 
                $payload['data']['system_code'] !== $this->systemCode) {
                return false;
            }
            
            return $payload['data'];
            
        } catch (\Exception $e) { 
            return false; 
        }
    }
    
    private function mapToLegacySession($userData) {
        $_SESSION['iduser']     = $userData['iduser'];
        $_SESSION['empid']      = $userData['iduser'];
        $_SESSION['username']   = $userData['username'];
        $_SESSION['name']       = $userData['name'];
        $_SESSION['email']      = $userData['email'];
        $_SESSION['role_id']    = $userData['role_id'];
        $_SESSION['state']      = $userData['state'];
        $_SESSION['level']      = $userData['level'];
        $_SESSION['section']    = $userData['section'];
        $_SESSION['department'] = $userData['department'] ?? '';
        $_SESSION['user_authentication'] = "valid"; 
    }
    
    public function getLoginUrl() {
        $returnUrl = urlencode($this->systemUrl . '/index.php'); 
        $sysCode = urlencode($this->systemCode);
        
        return $this->loginUrl . "?return_url=$returnUrl&system=$sysCode";
    }

    private function redirectToUMS() {
        header("Location: " . $this->getLoginUrl());
        exit();
    }

    public function logout($fullLogout = true) {
        session_unset();
        session_destroy();

        $returnTo   = urlencode($this->systemUrl);
        $systemName = urlencode(ucfirst($this->systemCode));
        $sysCode    = urlencode($this->systemCode);

        header("Location: " . $this->umsUrl . "/logout-options?return_to=$returnTo&system_name=$systemName&system_code=$sysCode");
        exit();
    }

    private function checkSessionTimeout() {
        if (!isset($_SESSION['sso_authenticated'])) return;

        $time = time();
        if (isset($_SESSION['sso_last_activity']) && ($time - $_SESSION['sso_last_activity'] > $this->idleTimeout)) {
            $this->logout();
        }
        
        $remaining = $this->idleTimeout - ($time - $_SESSION['sso_last_activity']);
        if ($remaining <= $this->warningTime && $remaining > 0) {
            $min = ceil($remaining/60);
            echo "<script>
                if(!sessionStorage.getItem('to_warn')){
                    sessionStorage.setItem('to_warn', '1');
                    if(confirm('⚠️ Sesi akan habis dalam $min menit. Klik OK untuk perpanjang.')){
                        window.location.reload();
                    }
                }
            </script>";
        }
    }
    
    private function base64UrlEncode($data) { 
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    }
    
    private function base64UrlDecode($data) { 
        return base64_decode(strtr($data, '-_', '+/')); 
    }
}