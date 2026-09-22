<?php

namespace App\Controllers;

class Cleansing extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // 1. Tarik Kamus Suci (Semua mesin master dari database)
        $masterMachines = $db->table('machine_list')->get()->getResult();
        
        // 2. Tiga tabel yang akan dieksekusi sekaligus
        $tables = ['startup', 'production', 'foregoing'];
        
        $html = "<html><head><title>Preview 3 Tabel Cleansing</title>";
        $html .= "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'></head>";
        $html .= "<body class='p-4'>";
        $html .= "<h3 class='mb-3'>Mode Simulasi: Penyelarasan GLOBAL 3 Tabel Utama</h3>";
        $html .= "<p>Sistem ini mencocokkan otomatis seluruh anomali <b>machno</b> dari tabel <b>STARTUP, PRODUCTION, dan FOREGOING</b> dengan tabel master <b>machine_list</b>. Data di bawah ini BELUM diubah di database.</p>";
        
        $html .= "<table class='table table-bordered table-sm table-striped'><thead><tr class='table-warning'>";
        $html .= "<th>Tabel</th><th>ID Data</th><th>Process</th><th>Machno (Data Mentah)</th><th>Machno (Akan Diselaraskan)</th>";
        $html .= "</tr></thead><tbody>";
        
        $count = 0;

        foreach ($tables as $table) {
            // Tarik seluruh data di tabel masing-masing
            $query = $db->table($table)->get();
            
            foreach ($query->getResult() as $row) {
                $original = $row->machno;
                
                // Ekstrak nama device dari kolom process (Contoh: "fl18-s-db2" -> dapet "fl18")
                $device = '';
                $processParts = explode('-', $row->process);
                if (count($processParts) > 0) {
                    $device = $processParts[0];
                }
                
                // Cocokkan data asli dengan kamus master
                $cleaned = $this->matchMachine($original, $device, $masterMachines);
                
                // Jika hasil pembersihan berbeda dengan data asli, tampilkan di tabel
                if ($original !== $cleaned) {
                    $count++;
                    $html .= "<tr>";
                    $html .= "<td><span class='badge badge-dark'>" . strtoupper($table) . "</span></td>";
                    $html .= "<td>{$row->id}</td>";
                    $html .= "<td>{$row->process}</td>";
                    $html .= "<td class='text-danger'>'{$original}'</td>";
                    $html .= "<td class='text-success font-weight-bold'>'{$cleaned}'</td>";
                    $html .= "</tr>";
                }
            }
        }
        
        $html .= "</tbody></table>";
        
        if ($count > 0) {
            $html .= "<div class='mt-4 p-3 bg-light border rounded'>";
            $html .= "<form method='post' action='" . base_url('cleansing/execute') . "'>";
            $html .= "<h5>Pola Global Terdeteksi!</h5>";
            $html .= "<p>Klik tombol di bawah untuk menyelaraskan <b>{$count} data</b> secara permanen ke database.</p>";
            $html .= "<button type='submit' class='btn btn-danger btn-lg' onclick=\"return confirm('Yakin eksekusi {$count} data ke database?');\">EKSEKUSI UPDATE KE 3 TABEL SEKALIGUS</button>";
            $html .= "</form></div>";
        } else {
            $html .= "<div class='alert alert-success mt-4'>Luar Biasa! Seluruh machno di 3 tabel utama (Startup, Production, Foregoing) sudah selaras 100% dengan machine_list.</div>";
        }
        
        $html .= "</body></html>";
        
        return $html;
    }

    public function execute()
    {
        $db = \Config\Database::connect();
        $masterMachines = $db->table('machine_list')->get()->getResult();
        $tables = ['startup', 'production', 'foregoing'];
        $count = 0;

        foreach ($tables as $table) {
            $query = $db->table($table)->get();
            
            foreach ($query->getResult() as $row) {
                $original = $row->machno;
                
                $device = '';
                $processParts = explode('-', $row->process);
                if (count($processParts) > 0) {
                    $device = $processParts[0];
                }
                
                $cleaned = $this->matchMachine($original, $device, $masterMachines);
                
                if ($original !== $cleaned) {
                    // Tembak update langsung ke database (Sesuai tabel yang sedang dilooping)
                    $db->table($table)->where('id', $row->id)->update(['machno' => $cleaned]);
                    $count++;
                }
            }
        }

        $html = "<html><head><title>Sukses Eksekusi</title>";
        $html .= "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css'></head>";
        $html .= "<body class='p-5 text-center'>";
        $html .= "<h1 class='text-success'>EKSEKUSI GLOBAL SELESAI!</h1>";
        $html .= "<h4><b>{$count} data anomali di tabel STARTUP, PRODUCTION, dan FOREGOING</b> berhasil diselaraskan.</h4>";
        $html .= "<a href='" . base_url('cleansing') . "' class='btn btn-primary mt-3'>Cek Ulang Data</a>";
        $html .= "</body></html>";

        return $html;
    }

    // FUNGSI PINTAR DYNAMIC FUZZY MATCHING
    private function matchMachine($raw, $device, $masterMachines) 
    {
        if (empty($raw) || $raw === '-' || $raw === 'null') return $raw;

        $rawClean = strtoupper(preg_replace('/[^A-Z0-9]/', '', $raw));
        
        preg_match_all('/\d+/', $raw, $rawMatches);
        $rawNums = implode('', $rawMatches[0]);

        $candidates = [];

        foreach ($masterMachines as $master) {
            $masterDevice = explode('-', $master->process_code)[0];
            if (strtolower($masterDevice) !== strtolower($device)) {
                continue;
            }

            $masterName = $master->machine_name;
            $masterClean = strtoupper(preg_replace('/[^A-Z0-9]/', '', $masterName));
            
            preg_match_all('/\d+/', $masterName, $masterMatches);
            $masterNums = implode('', $masterMatches[0]);

            if ($rawClean === $masterClean) {
                return $masterName;
            }

            if (strlen($rawClean) >= 3 && strpos($masterClean, $rawClean) !== false) {
                return $masterName;
            }

            if ($rawNums !== '' && $rawNums === $masterNums) {
                $candidates[] = $masterName;
            }
        }

        if (count($candidates) === 1) {
            return $candidates[0];
        }

        return $raw;
    }
}