<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Visitor;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $isId = App::getLocale() == 'id';
        $projects = [
            [
                'title' => $isId ? 'Sistem Laporan Harian' : 'Daily Report System',
                'category' => 'Operational',
                'tech' => 'C# • Reporting',
                'desc' => $isId
                    ? 'Membuat laporan stok berjalan, produksi, invoice gantung, penjualan harian, dan piutang.'
                    : 'Generating reports for stock on hand, production, pending invoices, daily sales, and accounts receivable.'
            ],
            [
                'title' => $isId ? 'Sistem Manajemen Gudang' : 'Warehouse Management System',
                'category' => 'Operational',
                'tech' => 'Laravel • Barcode',
                'desc' => $isId
                    ? 'Melacak keluar-masuk barang di gudang secara real-time.'
                    : 'Tracking goods in and out of the warehouse real-time.'
            ],
            [
                'title' => $isId ? 'Sistem Stok Opname' : 'Stock Opname System',
                'category' => 'Operational',
                'tech' => 'Mobile App • Java • Barcode',
                'desc' => $isId
                    ? 'Melakukan proses stok opname inventaris secara efisien dan digital.'
                    : 'Conducting inventory stock-taking processes efficiently.'
            ],
            [
                'title' => $isId ? 'Sistem Informasi Pasar Beras' : 'Rice Market Information System',
                'category' => 'Market Intelligence',
                'tech' => 'PHP • REST API',
                'desc' => $isId
                    ? 'Menyediakan data real-time stok, harga, pengiriman, dan penerimaan beras di pasar.'
                    : 'Providing real-time data on stock, prices, deliveries, and rice receipts in the market.'
            ],

            [
                'title' => $isId ? 'Sistem E-Office' : 'E-Office System',
                'category' => 'Management',
                'tech' => 'PHP • Digital Signature • Codeigniter',
                'desc' => $isId
                    ? 'Digitalisasi proses internal kantor, surat-menyurat, dan dokumentasi.'
                    : 'Digitalizing internal office processes, correspondence, and documentation.'
            ],
            [
                'title' => $isId ? 'Sistem Booking Ruang Rapat' : 'Meeting Room Booking System',
                'category' => 'General Affair',
                'tech' => 'Codeigniter • General Affair',
                'desc' => $isId
                    ? 'Mengelola reservasi dan jadwal penggunaan ruang rapat.'
                    : 'Managing reservations and schedules for meeting rooms.'
            ],
            [
                'title' => $isId ? 'Peminjaman Kendaraan Dinas' : 'Company Vehicle Booking',
                'category' => 'General Affair',
                'tech' => 'Codeigniter • General Affair',
                'desc' => $isId
                    ? 'Menangani pemesanan dan jadwal penggunaan kendaraan operasional kantor.'
                    : 'Handling bookings and schedules for office inventory vehicles.'
            ],
            [
                'title' => $isId ? 'Sistem Permintaan ATK' : 'Stationery Request System (ATK)',
                'category' => 'General Affair',
                'tech' => 'Java • General Affair',
                'desc' => $isId
                    ? 'Mengelola permintaan dan alur persetujuan alat tulis kantor.'
                    : 'Managing requests and approval workflow for office supplies.'
            ],
            [
                'title' => $isId ? 'Agenda Direksi & Komisaris' : 'Director & Commissioner Agenda',
                'category' => 'Management',
                'tech' => 'Codeigniter • Calendar API',
                'desc' => $isId
                    ? 'Mengelola dan menjadwalkan agenda untuk jajaran eksekutif perusahaan.'
                    : 'Managing and scheduling agendas for high-level executives.'
            ],

            [
                'title' => $isId ? 'Sistem E-Procurement' : 'E-Procurement System',
                'category' => 'Finance',
                'tech' => 'Java • Tendering',
                'desc' => $isId
                    ? 'Mengelola proses pengadaan barang/jasa digital secara transparan.'
                    : 'Managing digital procurement processes transparently.'
            ],
            [
                'title' => $isId ? 'Sistem Pengingat Keuangan' : 'Finance Reminder System',
                'category' => 'Finance',
                'tech' => 'C# • Automation',
                'desc' => $isId
                    ? 'Menjadwalkan dan melacak tenggat waktu keuangan serta pembayaran uang muka.'
                    : 'Scheduling and tracking financial deadlines and down payments.'
            ],
            [
                'title' => $isId ? 'Sistem Pengingat Legal' : 'Legal Reminder System',
                'category' => 'Legal',
                'tech' => 'C# • Automation',
                'desc' => $isId
                    ? 'Mengelola tenggat waktu penyerahan dan perpanjangan dokumen hukum.'
                    : 'Managing deadlines for legal document submissions and renewals.'
            ],
            [
                'title' => $isId ? 'Pengingat Pengembangan Produk' : 'Product Dev Reminder System',
                'category' => 'R&D',
                'tech' => 'C# • Automation',
                'desc' => $isId
                    ? 'Melacak dan mengingatkan kebutuhan dokumen legalitas untuk produk baru.'
                    : 'Tracking and reminding legal document requirements for products.'
            ],

            [
                'title' => $isId ? 'Sistem Pemesanan Mitra' : 'Mitra Ordering System',
                'category' => 'Sales',
                'tech' => 'Laravel • Flutter',
                'desc' => $isId
                    ? 'Memfasilitasi pemrosesan pesanan dari internal maupun eksternal.'
                    : 'Facilitating internal and external order processing.'
            ],
            [
                'title' => $isId ? 'Sistem Registrasi Pedagang' : 'Tenant Registration System',
                'category' => 'Public Service',
                'tech' => 'Laravel • PHP',
                'desc' => $isId
                    ? 'Mengelola pendaftaran pedagang dan pengajuan keluhan operasional pasar.'
                    : 'Managing tenant registrations and complaint submissions for market operations.'
            ],
            [
                'title' => $isId ? 'Whistleblowing System' : 'Whistleblowing System',
                'category' => 'Compliance',
                'tech' => 'Codeigniter • PHP',
                'desc' => $isId
                    ? 'Memungkinkan pelaporan anonim untuk dugaan pelanggaran etika/aturan.'
                    : 'Enabling anonymous reporting for ethical violations.'
            ],

            [
                'title' => $isId ? 'Migrasi Accurate Desktop ke Online' : 'Migration Accurate Desktop to Online',
                'category' => 'Migration',
                'tech' => 'Database Migration',
                'desc' => $isId
                    ? 'Migrasi data penuh dari Akuntansi Desktop ke Accurate Online berbasis Cloud.'
                    : 'Full data migration from Desktop Accounting to Cloud-based Accurate Online.'
            ],
            [
                'title' => $isId ? 'Migrasi Payroll ke HRIS' : 'Migration Payroll to HRIS',
                'category' => 'Migration',
                'tech' => 'Data Integration',
                'desc' => $isId
                    ? 'Peningkatan sistem penggajian legacy ke Sistem HRIS modern yang terintegrasi.'
                    : 'Upgrading legacy payroll system to integrated HRIS System.'
            ],
            [
                'title' => $isId ? 'Transformasi Web Company Profile' : 'Migration Web Company to Store',
                'category' => 'Transformation',
                'tech' => 'E-Commerce',
                'desc' => $isId
                    ? 'Mengubah profil perusahaan statis menjadi Web Store + E-Commerce fungsional.'
                    : 'Transforming static company profile into full Web + E-Commerce (Webstore).'
            ],
            [
                'title' => $isId ? 'Migrasi Sistem ERP' : 'Migration ERP System',
                'category' => 'Migration',
                'tech' => 'Enterprise Architecture',
                'desc' => $isId
                    ? 'Migrasi dan implementasi Sistem ERP secara menyeluruh (End-to-end).'
                    : 'End-to-end ERP System migration and implementation.'
            ],
        ];

        return view('welcome', compact('projects'));
    }

    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}
