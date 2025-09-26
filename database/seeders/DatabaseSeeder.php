<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'password' => 'Test1234',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Test Student',
            'email' => 'test@student.com',
            'password' => 'Test1234',
            'role' => 'student'
        ]);

        // Import questions from XML and ZIP files
        $this->call(KennisquizSeeder::class);

        // Example user IDs: 1, 2, 3 (make sure these users exist in your users table)
        for ($i = 0; $i < 5; $i++) {
            DB::table('quiz_results')->insert([
                'user_id' => User::factory()->create()->id,
                'correct_answers' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Import all QTI XML files from the database/questions folder (including ZIPs)
     */
    private function importQuestionsFromFolder(): void
    {
        $questionsPath = database_path('questions');

        if (!is_dir($questionsPath)) {
            $this->command->info('Questions folder not found at: ' . $questionsPath);
            return;
        }

        $importer = new \App\Imports\QtiImporter();
        $importedCount = 0;

        $files = $this->getAllXmlFilesRecursively($questionsPath);

        if (empty($files)) {
            $this->command->info('No XML files found in questions folder or inside ZIPs');
            return;
        }

        $this->command->info('Found ' . count($files) . ' XML file(s) to import');

        foreach ($files as $file) {
            try {
                $this->command->info('Importing: ' . basename($file));
                $importer->import($file);
                $importedCount++;
            } catch (\Exception $e) {
                $this->command->error('Failed to import ' . basename($file) . ': ' . $e->getMessage());
            }
        }

        $this->command->info("Successfully imported {$importedCount} question file(s)");
    }

    /**
     * Recursively get all XML files, unpacking ZIPs if needed
     */
    private function getAllXmlFilesRecursively(string $path): array
    {
        $files = [];

        $dirItems = scandir($path);

        foreach ($dirItems as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $fullPath = $path . DIRECTORY_SEPARATOR . $item;

            if (is_dir($fullPath)) {
                $files = array_merge($files, $this->getAllXmlFilesRecursively($fullPath));
            } elseif (is_file($fullPath)) {
                $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));

                if ($ext === 'xml') {
                    $files[] = $fullPath;
                } elseif ($ext === 'zip') {
                    // Unzip to temp folder
                    $tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid('qti_zip_');
                    mkdir($tempDir);
                    $zip = new \ZipArchive();
                    if ($zip->open($fullPath) === true) {
                        $zip->extractTo($tempDir);
                        $zip->close();

                        // Recursively get XML files from extracted folder
                        $files = array_merge($files, $this->getAllXmlFilesRecursively($tempDir));
                    }
                }
            }
        }

        return $files;
    }
}
