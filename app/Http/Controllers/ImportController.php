<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\QtiImporter;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'qti_file' => 'required|file|mimes:xml,zip|max:5120',
        ]);

        $file = $request->file('qti_file');
        $filePath = $file->getPathname();
        $extension = strtolower($file->getClientOriginalExtension());

        try {
            $importer = new QtiImporter();

            if ($extension === 'zip') {
                $importer->importFromZip($filePath);
            } else {
                // XML of QTI
                $importer->import($filePath);
            }

            $questionCount = \App\Models\Question::count();
            return back()->with('success', "Questions imported successfully! Total questions in database: {$questionCount}");
        } catch (\Exception $e) {
            return back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }
}
