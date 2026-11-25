<?php

namespace Tests\Feature;

use App\Filament\Resources\LabDokumens\LabDokumenResource;
use App\Filament\Resources\LabGaris\LabGarisResource;
use App\Filament\Resources\LabInventaris\LabInventarisResource;
use App\Filament\Resources\LabKegiatans\LabKegiatanResource;
use App\Filament\Resources\Laboratoria\LaboratoriumResource;
use App\Filament\Resources\LabProduks\LabProdukResource;
use App\Filament\Resources\OtherCivitas\OtherCivitasResource;
use App\Models\LabDokumen;
use App\Models\LabGaris;
use App\Models\LabInventaris;
use App\Models\LabKegiatan;
use App\Models\Laboratorium;
use App\Models\LabProduk;
use App\Models\OtherCivitas;
use App\Models\Teknisi;
use Tests\TestCase;

class LaboratoryResourceTest extends TestCase
{
    public function test_models_map_to_the_laboratory_tables_and_technician_link(): void
    {
        $this->assertSame('Laboratorium', LaboratoriumResource::getNavigationGroup());
        $this->assertSame('Laboratorium', LabInventarisResource::getNavigationGroup());
        $this->assertSame('Laboratorium', LabDokumenResource::getNavigationGroup());
        $this->assertSame('Laboratorium', LabGarisResource::getNavigationGroup());
        $this->assertSame('Laboratorium', LabKegiatanResource::getNavigationGroup());
        $this->assertSame('Laboratorium', LabProdukResource::getNavigationGroup());
        $this->assertSame('Civitas', OtherCivitasResource::getNavigationGroup());
        $this->assertSame('laboratorium', (new Laboratorium)->getTable());
        $this->assertSame('lab_inventaris', (new LabInventaris)->getTable());
        $this->assertSame('lab_dokumen', (new LabDokumen)->getTable());
        $this->assertSame('lab_garis', (new LabGaris)->getTable());
        $this->assertSame('lab_kegiatan', (new LabKegiatan)->getTable());
        $this->assertSame('lab_produk', (new LabProduk)->getTable());
        $this->assertSame('other_civitas', (new OtherCivitas)->getTable());
        $this->assertSame('laboratorium', (new Teknisi)->laboratorium()->getRelated()->getTable());
    }
}
