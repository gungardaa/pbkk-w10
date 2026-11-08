<?php

namespace Database\Factories;

use App\Models\AcademicData;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prodi = $this->faker->randomElement([
            'Teknik Informatika',
            'Sistem Informasi',
            'Teknik Elektro',
            'Teknik Sipil',
            'Manajemen',
        ]);

        return [
            'nama' => $this->faker->name('id_ID'),
            'nim' => $this->faker->unique()->numerify('50252########'),
            'prodi' => $prodi,
            'fakultas' => 'Institut Teknologi Sepuluh Nopember',
            'angkatan' => $this->faker->randomElement([2022, 2023, 2024, 2025]),
            'email' => $this->faker->unique()->safeEmail(),
            'alamat' => $this->faker->address(),
            'ipk' => $this->faker->randomFloat(2, 2.5, 4.0),
        ];
    }
}