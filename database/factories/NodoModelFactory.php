<?php

namespace Database\Factories;

use App\Models\NodoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class NodoModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NodoModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'descripcion' => $this->faker->text(50),
            'observacion' => $this->faker->paragraph,
            'codigo' => $this->count++,
            'estado' => $this->faker->randomElement($array = array('0','1'))
        ];
    }
}
