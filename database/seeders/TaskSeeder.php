<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => 'Complete Project',
            'description' => 'Finish the project by end of the week',
            'is_completed' => false,
            'due_date' => now()->addDays(7),
            'status' => 'pending',
        ]);

        Task::create([
            'title' => 'Prepare Presentation',
            'description' => 'Prepare slides for client meeting',
            'is_completed' => false,
            'due_date' => now()->addDays(3),
            'status' => 'in-progress',
        ]);

        // Tambahkan lebih banyak data jika diperlukan
    }
}

