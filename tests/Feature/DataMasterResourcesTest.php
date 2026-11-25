<?php

namespace Tests\Feature;

use App\Models\Administrasi;
use App\Models\Dosen;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Teknisi;
use Tests\TestCase;

class DataMasterResourcesTest extends TestCase
{
    public function test_models_map_to_the_existing_data_master_tables(): void
    {
        $this->assertSame('prodi', (new Prodi)->getTable());
        $this->assertSame('status', (new Status)->getTable());
        $this->assertSame('jabatan', (new Jabatan)->getTable());
        $this->assertSame('golongan', (new Golongan)->getTable());
        $this->assertSame('dosen', (new Dosen)->getTable());
        $this->assertSame('teknisi', (new Teknisi)->getTable());
        $this->assertSame('administrasi', (new Administrasi)->getTable());
        $this->assertSame('prodi', (new Dosen)->programStudi()->getRelated()->getTable());
        $this->assertSame('prodi', (new Administrasi)->programStudi()->getRelated()->getTable());
        $this->assertSame('laboratorium', (new Teknisi)->laboratorium()->getRelated()->getTable());
        $this->assertSame('dosen', (new Prodi)->coordinatorDosen()->getRelated()->getTable());
        $this->assertSame('administrasi', (new Prodi)->adminAdministrasi()->getRelated()->getTable());
    }
}
