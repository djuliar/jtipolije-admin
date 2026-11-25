<?php

namespace Tests\Feature;

use App\Filament\Resources\Sliders\SliderResource;
use App\Models\Slider;
use Tests\TestCase;

class SliderResourceTest extends TestCase
{
    public function test_slider_resource_uses_existing_table_and_configuration_navigation(): void
    {
        $this->assertSame('sliders', (new Slider)->getTable());
        $this->assertSame('Configuration', SliderResource::getNavigationGroup());
        $this->assertSame('Slider', SliderResource::getModelLabel());
    }
}
