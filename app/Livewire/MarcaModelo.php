<?php

namespace App\Livewire;

use App\Models\Marcas_autos;
use App\Models\Marcas_images_autos;
use Livewire\Component;

class MarcaModelo extends Component
{
    public $slcMarca = null;
    public $slcModelo = null;
    public $slcVehiculo = null;
    public $marcas = null;
    public $modelos = null;
    public $vehiculo = null;

    public function render()
    {
        return view('livewire.marca-modelo');
    }

    public function mount()
    {
        $this->marcas = Marcas_images_autos::all();
        $this->modelos = collect();
    }

    public function updatedslcMarca($marca): void
    {
        $this->modelos = Marcas_autos::where('marca', $marca)
            ->orderBy('modelo', 'asc', 'modelo_motor', 'asc')
            ->get();
        $this->vehiculo = null;
    }

    public function updatedslcModelo($id): void
    {
        $this->vehiculo = Marcas_autos::where('id', $id)->first();
    }
}
