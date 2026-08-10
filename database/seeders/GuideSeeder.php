<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    public function run(): void
    {
        // 1. STARTER KIT GUIDES
        Guide::create([
            'type' => 'starter_kit',
            'title' => 'Membuat Pertanian Otomatis Sederhana',
            'subtitle' => 'Mengatur penyiraman tanaman secara otomatis menggunakan timer digital dan solenoid valve.',
            'category' => 'Irigasi Otomatis',
            'icon' => '⚡',
            'duration' => 'Estimasi Pengerjaan: 30-45 Menit',
            'tools_and_materials' => [
                ['name' => 'Timer Digital 220V / Battery', 'desc' => 'Pengatur jadwal waktu siram.'],
                ['name' => 'Solenoid Valve 3/4 Inch', 'desc' => 'Kran listrik pembuka/penutup aliran air.'],
                ['name' => 'Disc Filter 3/4 Inch', 'desc' => 'Mencegah kotoran menyumbat katup & nozzle.'],
                ['name' => 'Pipa Utama PE / PVC & Connector', 'desc' => 'Penyalur air ke titik tanaman.']
            ],
            'steps' => [
                [
                    'title' => 'Pemasangan Unit Filtrasi Air',
                    'description' => 'Pasang Disc Filter di bagian paling awal sumber air (setelah pompa/toren) sebelum masuk ke komponen elektrikal. Pastikan arah panah aliran air sesuai.'
                ],
                [
                    'title' => 'Instalasi Katup Solenoid Valve & Timer',
                    'description' => 'Hubungkan output kabel dari Timer Digital ke terminal Solenoid Valve. Atur program jam siram pada timer (misal: Pagi jam 07.00 dan Sore jam 16.00).'
                ],
                [
                    'title' => 'Penyambungan Pipa Distribusi ke Lahan',
                    'description' => 'Sambungkan pipa PE dari keluaran solenoid menuju barisan tanaman. Pasang penutup pipa (end cap) di ujung akhir pipa agar tekanan air stabil.'
                ],
                [
                    'title' => 'Uji Coba System & Flushing',
                    'description' => 'Buka ujung pipa lalu jalankan sistem selama 1 menit untuk membilas sisa kotoran pengerjaan. Tutup kembali dan sistem siap beroperasi.'
                ]
            ],
            'is_active' => true,
        ]);

        Guide::create([
            'type' => 'starter_kit',
            'title' => 'Perakitan Selang Drip Line Kebun',
            'subtitle' => 'Instalasi jalur penyiraman tetes hemat air efisien untuk tanaman cabai, melon, atau tomat.',
            'category' => 'Irigasi Tetes',
            'icon' => '🌱',
            'duration' => 'Estimasi Pengerjaan: 20-30 Menit',
            'tools_and_materials' => [
                ['name' => 'Selang Drip Tape / PE 16mm', 'desc' => 'Pipa distribusi tetes.'],
                ['name' => 'Offtake Connector + Rubber Ring', 'desc' => 'Konektor penyambung dari pipa induk.'],
                ['name' => 'Pelubang Pipa (Punch Tool 8mm)', 'desc' => 'Alat pembuat lubang rapi.'],
                ['name' => 'Dripper / Emitter Adjustable', 'desc' => 'Head penetes air ke perakaran.']
            ],
            'steps' => [
                [
                    'title' => 'Lubangi Pipa Utama (PVC/PE)',
                    'description' => 'Gunakan Punch Tool ukuran 8mm untuk membuat lubang konektor pada pipa pembagi utama.'
                ],
                [
                    'title' => 'Pasang Karet Offtake & Connector',
                    'description' => 'Masukkan karet seal (grommet) lalu tancapkan offtake valve hingga terdengar bunyi klik rapat.'
                ],
                [
                    'title' => 'Gelar Selang Drip ke Bedengan',
                    'description' => 'Bentangkan selang drip sejajar bedengan tanaman. Tancapkan emitter/dripper tepat di dekat perakaran masing-masing tanaman.'
                ]
            ],
            'is_active' => true,
        ]);

        Guide::create([
            'type' => 'starter_kit',
            'title' => 'Instalasi Micro Sprinkler Rumah Kaca',
            'subtitle' => 'Skema pengabutan udara dan penyiraman merata untuk nursery atau green house.',
            'category' => 'Sprinkler & Fogger',
            'icon' => '🌧️',
            'duration' => 'Estimasi Pengerjaan: 40-60 Menit',
            'tools_and_materials' => [
                ['name' => 'Head Micro Sprinkler 360 Degree', 'desc' => 'Penyebar kabut air.'],
                ['name' => 'Anti-Drip Device', 'desc' => 'Mencegah tetes air saat pompa mati.'],
                ['name' => 'Pipa PE 16mm / 20mm', 'desc' => 'Jalur utama gantung/bawah.']
            ],
            'steps' => [
                [
                    'title' => 'Penentuan Jarak Gantung',
                    'description' => 'Atur tinggi gantungan sprinkler 1.5 - 2 meter di atas tanaman dengan jarak antar titik 1.2 meter.'
                ],
                [
                    'title' => 'Pemasangan Anti-Drip Valve',
                    'description' => 'Pasang katup anti-drip sebelum head sprinkler agar air tidak menetes menimpa bibit muda.'
                ]
            ],
            'is_active' => true,
        ]);

        // 2. VIDEO GUIDES
        Guide::create([
            'type' => 'video',
            'title' => 'Cara Kalibrasi & Setting Timer Irigasi Digital',
            'subtitle' => 'Petunjuk lengkap menyetting jam, durasi siram, dan penggantian baterai pada controller timer irigasi otomatis.',
            'category' => 'Timer Controller',
            'icon' => '🎬',
            'duration' => '05:20',
            'youtube_url' => 'https://www.youtube.com/embed/vYuoECsqZy8',
            'is_active' => true,
        ]);

        Guide::create([
            'type' => 'video',
            'title' => 'Cara Backwash & Pembersihan Disc Filter',
            'subtitle' => 'Panduan membongkar ring piringan disc filter untuk dibersihkan dari endapan lumpur agar aliran air kembali kencang.',
            'category' => 'Filter Irigasi',
            'icon' => '🎬',
            'duration' => '04:15',
            'youtube_url' => 'https://www.youtube.com/embed/vYuoECsqZy8',
            'is_active' => true,
        ]);

        Guide::create([
            'type' => 'video',
            'title' => 'Pengaturan Debit Air Micro Sprinkler & Fogger',
            'subtitle' => 'Cara memutar head sprinkler untuk mengatur jangkauan radius kabut semprotan sesuai lebar lahan kebun.',
            'category' => 'Sprinkler & Nozzle',
            'icon' => '🎬',
            'duration' => '06:40',
            'youtube_url' => 'https://www.youtube.com/embed/vYuoECsqZy8',
            'is_active' => true,
        ]);
    }
}