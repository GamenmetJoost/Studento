<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\QtiImporter;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'qti_file' => 'required|file|mimes:xml|max:2048'
        ]);

        $file = $request->file('qti_file');
        $filePath = $file->getPathname();

        try {
            $importer = new QtiImporter();
            $result = $importer->import($filePath);
            
            // Count questions to verify
            $questionCount = \App\Models\Question::count();
            
            return back()->with('success', "Questions imported successfully! Total questions in database: {$questionCount}");
        } catch (\Exception $e) {
            return back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }
}
