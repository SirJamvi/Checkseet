<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpModel;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $session;
    protected $EmpModel;
    protected $AdminModel;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->EmpModel = new EmpModel();
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        // ✅ CASE 1: Ada JWT dari UMS
        $jwt = $this->request->getGet('jwt');
        
        if ($jwt) {
            $userData = $this->validateJWT($jwt);
            
            if ($userData) {
                // Set CI4 session langsung
                $this->session->set([
                    'empid'      => $userData['iduser'],
                    'username'   => $userData['username'],
                    'name'       => $userData['name'],
                    'email'      => $userData['email'],
                    'role_id'    => $userData['role_id'],
                    'state'      => $userData['state'],
                    'level'      => $userData['level'] ?? 0,
                    'section'    => $userData['section'] ?? '',
                    'department' => $userData['department'] ?? '',
                    'sso_login'  => true,
                ]);

                if (($userData['state'] ?? '') === 'Admin' || ($userData['level'] ?? 1) == 0) {
                    $this->session->set('isadmin', true);
                }

                return redirect()->to(base_url('home'));
            }
            
            // JWT tidak valid → log dan redirect ke UMS
            log_message('error', 'SSO: JWT invalid, redirecting to UMS');
            return $this->redirectToUMS();
        }
        
        // ✅ CASE 2: Sudah ada CI4 session
        if ($this->session->has('empid')) {
            return redirect()->to(base_url('home'));
        }
        
        // ✅ CASE 3: Tidak ada apapun → ke UMS
        return $this->redirectToUMS();
    }
    
    /**
     * Validasi JWT langsung tanpa SSO library
     * (Menghindari konflik session PHP native vs CI4)
     */
    private function validateJWT($jwt)
    {
        try {
            $configFile = ROOTPATH . 'sso_config.php';
            if (!file_exists($configFile)) return null;
            require_once $configFile;
            
            $secret     = SSO_JWT_SECRET;
            $systemCode = SSO_SYSTEM_CODE;
            
            $parts = explode('.', $jwt);
            if (count($parts) !== 3) return null;
            
            [$header64, $payload64, $signature64] = $parts;
            
            // Verify signature
            $expectedSig = rtrim(strtr(base64_encode(
                hash_hmac('sha256', "$header64.$payload64", $secret, true)
            ), '+/', '-_'), '=');
            
            if (!hash_equals($signature64, $expectedSig)) {
                log_message('error', 'SSO: Signature mismatch');
                return null;
            }
            
            // Decode payload
            $payload = json_decode(base64_decode(strtr($payload64, '-_', '+/')), true);
            if (!$payload) return null;
            
            // Cek expired (toleransi 60 detik)
            if (isset($payload['exp']) && ($payload['exp'] + 60) < time()) {
                log_message('error', 'SSO: Token expired at ' . date('Y-m-d H:i:s', $payload['exp']));
                return null;
            }
            
            // Cek system code
            if (isset($payload['data']['system_code']) && $payload['data']['system_code'] !== $systemCode) {
                log_message('error', 'SSO: System code mismatch - expected ' . $systemCode . ', got ' . $payload['data']['system_code']);
                return null;
            }
            
            return $payload['data'] ?? null;
            
        } catch (\Exception $e) {
            log_message('error', 'SSO JWT error: ' . $e->getMessage());
            return null;
        }
    }

    private function redirectToUMS()
    {
        $configFile = ROOTPATH . 'sso_config.php';
        if (file_exists($configFile)) require_once $configFile;
        
        $umsUrl    = rtrim(SSO_UMS_URL, '/');
        $returnUrl = urlencode(SSO_SYSTEM_URL . '/index.php');
        $sysCode   = urlencode(SSO_SYSTEM_CODE);
        
        return redirect()->to("$umsUrl/login?return_url=$returnUrl&system=$sysCode");
    }
    
    public function legacyLogin()
    {
        if ($this->session->has('empid')) {
            return redirect()->to('/home');
        }
        
        $empid    = $this->request->getVar('empid');
        $password = $this->request->getVar('password');
        
        if (!$empid || !$password) {
            return redirect()->to(base_url('login'))
                ->with('message', 'Employee ID and Password required');
        }
        
        $result = $this->EmpModel->login($empid, $password);
        
        if ($result) {
            $isAdmin = $this->AdminModel->getById($empid);
            if ($isAdmin) $result['isadmin'] = $isAdmin;
            $this->session->set($result);
            return redirect()->to('/home');
        }
        
        return redirect()->to(base_url('login'))
            ->with('message', 'Invalid credentials');
    }
    
    public function logout()
    {
        $this->session->destroy();
        
        $configFile = ROOTPATH . 'sso_config.php';
        if (file_exists($configFile)) require_once $configFile;
        
        $umsUrl     = rtrim(SSO_UMS_URL, '/');
        $returnTo   = urlencode(SSO_SYSTEM_URL);
        $systemName = urlencode(ucfirst(SSO_SYSTEM_CODE));
        $sysCode    = urlencode(SSO_SYSTEM_CODE);
        
        return redirect()->to("$umsUrl/logout-options?return_to=$returnTo&system_name=$systemName&system_code=$sysCode");
    }
}