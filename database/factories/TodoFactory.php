<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategori = ["Personal", "Kerjaan", "Liburan"];

        return [
            'user_id' => User::factory(),
            'judul' => fake()->sentence(5),
            'deskripsi' => fake()->text(),
            'due_date' => fake()->date('D-M-Y'),
            'jam' => fake()->time('H:m:s'),
            'is_done' => false,
            'kategori' => $kategori[rand(0,2)]
        ];
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
