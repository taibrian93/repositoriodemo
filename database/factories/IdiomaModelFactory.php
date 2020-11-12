<?php

namespace Database\Factories;

use App\Models\IdiomaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdiomaModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IdiomaModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $count = 0;
    public function definition()
    {
        $contador = $this->count + 1;
        return [
            //
            // 'descripcion' => $this->faker->text(50),
            // // 'observacion' => $this->faker->paragraph,
            // 'iso_639-1' => $this->faker->randomElement($array = array('0','1')),
            // 'codigo' => $contador,
            // 'estado' => $this->faker->randomElement($array = array('0','1'))
        ];
    }
}
