<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InputModel;
use App\Models\StartupModel;
use App\Models\ProductionModel;
use App\Models\ForegoingModel;
use App\Models\EmpModel;
use CodeIgniter\CodeIgniter;
use PhpOffice\PhpSpreadsheet\IOFactory;

class History extends BaseController
{
    protected $session;
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->InputModel = new InputModel();
        $this->ProductionModel = new ProductionModel();
        $this->StartupModel = new StartupModel();
        $this->ForegoingModel = new ForegoingModel();
        $this->EmpModel = new EmpModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index(): string
    {
        $data = [
            'title' => 'History | Startup Management',
        ];
        return view('history', $data);
    }
    
    public function dataForegoing()
    {
        $data = [
            'title' => 'History | Startup Management',
            'alldata' => $this->ForegoingModel->getAll($_GET['dateStart'],$_GET['dateEnd'],$_GET['device'],$_GET['process'])
        ];

        return view("/layout/".$_GET['device']."/history/foregoing/".$_GET['process'],$data);
    }
    
    public function foregoingByNumber($number)
    {
        $data = [
            'alldata' => $this->ForegoingModel->getByNumber($number)
        ];

        return view("/layout/".$data['alldata'][0]['device']."/history/foregoing/".$data['alldata'][0]['process'],$data); 
    }

    public function exportFF_D2_001()
    {
        $process   = $this->request->getGet('process');
        $dateStart = $this->request->getGet('dateStart');
        $dateEnd   = $this->request->getGet('dateEnd');
        $model     = $this->request->getGet('model'); 
        $lotno     = $this->request->getGet('lotno'); 
        $machno    = $this->request->getGet('machno'); 
        
        $templatePath = FCPATH . 'templates/FF-D2-001.xlsx';
        
        if (!file_exists($templatePath)) {
            die("Template Excel tidak ditemukan di folder public/templates/");
        }

        $spreadsheet = IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // =========================================================================
        // 1. MENGGAMBAR KOP SURAT DI POJOK KANAN ATAS (KOLOM Y - AA)
        // =========================================================================
        
        // Baris 1: No Dok
        $sheet->setCellValue('Y1', 'No. Dok');
        $sheet->setCellValue('Z1', ': FF-D2-001');
        $sheet->mergeCells('Z1:AA1'); // Gabung cell Z dan AA agar panjang
        
        // Baris 2: Revisi
        $sheet->setCellValue('Y2', 'Revisi');
        $sheet->setCellValue('Z2', ': 12');
        $sheet->mergeCells('Z2:AA2');
        
        // Baris 3: Berlaku
        $sheet->setCellValue('Y3', 'Berlaku');
        $sheet->setCellValue('Z3', ': ' . date('d M Y')); // Dibuat dinamis hari ini
        $sheet->mergeCells('Z3:AA3');

        // Baris 4 & Bawah: Checked
        $sheet->setCellValue('Y4', 'Checked');
        $sheet->mergeCells('Y4:AA4');
        // Membuat teks "Checked" berada di tengah (Center)
        $sheet->getStyle('Y4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Memberikan garis batas (Borders) pada kotak dokumen
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        // Terapkan garis dari Y1 sampai AA6 (agar ada ruang kosong untuk tanda tangan)
        $sheet->getStyle('Y1:AA6')->applyFromArray($styleArray);

        // =========================================================================
        // 2. AMBIL DATA DARI DATABASE & ISI TABEL
        // =========================================================================
        $dataList = $this->ProductionModel->getAll($dateStart, $dateEnd, $process, $model, $lotno, $machno);

        $row = 15; // Baris mulai tabel
        
        if (!empty($dataList)) {
            foreach ($dataList as $index => $item) {
                // Formatting Jam
                $timeIn  = !empty($item['par008']) ? date('H:i', strtotime($item['par008'])) : '';
                $timeOut = !empty($item['par009']) ? date('H:i', strtotime($item['par009'])) : '';

                // Kolom Dasar
                $sheet->setCellValue('A' . $row, $index + 1);
                $sheet->setCellValue('B' . $row, date('d/m/Y', strtotime($item['created_at']))); 
                $sheet->setCellValue('C' . $row, $item['shift'] . ' / ' . $item['group'] . ' / ' . $item['name']); 
                $sheet->setCellValue('D' . $row, $item['model']); 
                $sheet->setCellValue('E' . $row, $item['lotno']); 

                // Kolom Quantity
                $sheet->setCellValue('F' . $row, $item['par013'] ?? ''); 
                $sheet->setCellValue('G' . $row, $item['par014'] ?? ''); 
                $sheet->setCellValue('H' . $row, $item['par015'] ?? ''); 
                
                // Kolom Time
                $sheet->setCellValue('I' . $row, $timeIn); 
                $sheet->setCellValue('J' . $row, $timeOut); 
                
                // Kolom Foregoing Result
                $sheet->setCellValue('K' . $row, $item['par035'] ?? ''); 
                $sheet->setCellValue('L' . $row, $item['par036'] ?? ''); 
                $sheet->setCellValue('M' . $row, $item['par037'] ?? ''); 
                $sheet->setCellValue('N' . $row, $item['par038'] ?? ''); 
                $sheet->setCellValue('O' . $row, $item['par039'] ?? ''); 
                $sheet->setCellValue('P' . $row, $item['par040'] ?? ''); 
                
                // Kolom Check 1st & 2nd
                $sheet->setCellValue('Q' . $row, $item['par017'] ?? ''); 
                $sheet->setCellValue('R' . $row, $item['par018'] ?? ''); 
                $sheet->setCellValue('S' . $row, $item['par041'] ?? ''); 
                $sheet->setCellValue('T' . $row, $item['par042'] ?? ''); 
                $sheet->setCellValue('U' . $row, $item['par043'] ?? ''); 
                $sheet->setCellValue('V' . $row, $item['par002'] ?? ''); 
                $sheet->setCellValue('W' . $row, $item['par003'] ?? ''); 
                $sheet->setCellValue('X' . $row, $item['par004'] ?? ''); 
                
                // Kolom Mesin
                $sheet->setCellValue('Y' . $row, $item['par005'] ?? ''); 
                $sheet->setCellValue('Z' . $row, $item['par006'] ?? ''); 
                $sheet->setCellValue('AA'. $row, $item['par007'] ?? ''); 
                
                $row++; 
            }
        }

        // =========================================================================
        // MENGATUR LEBAR KOLOM DAN TAMPILAN HALAMAN
        // =========================================================================

        // 1. Mengubah ukuran lebar kolom (Bisa Anda sesuaikan angkanya)
        $sheet->getColumnDimension('C')->setWidth(30); // Melebarkan Shift/Group/Operator
        $sheet->getColumnDimension('D')->setWidth(30); // Melebarkan Model Name
        $sheet->getColumnDimension('E')->setWidth(15); // Menyempitkan Lot No.

        // Opsional: Jika teks di kolom C kepanjangan, kita buat agar otomatis turun ke bawah (Wrap Text)
        $sheet->getStyle('C15:C' . ($row - 1))->getAlignment()->setWrapText(true);

        // 2. Menghilangkan watermark "Page 1" dengan memaksa tampilan ke mode Normal
        $sheet->getSheetView()->setView(\PhpOffice\PhpSpreadsheet\Worksheet\SheetView::SHEETVIEW_NORMAL);

        // =========================================================================
        // 3. PROSES DOWNLOAD
        // =========================================================================
        $fileName = 'LD_Die_Bonding_2_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }

}