<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    protected $csvPath = 'students.csv';

    // Read CSV and convert to array
    private function readCsv()
    {
        if (!Storage::exists($this->csvPath)) {
            Storage::put($this->csvPath, "id,name,email,age\n");
        }

        $file = Storage::get($this->csvPath);
        $lines = explode("\n", trim($file));
        $students = [];

        $headers = str_getcsv(array_shift($lines));

        foreach ($lines as $line) {
            if (trim($line) === '') continue;
            $data = str_getcsv($line);
            $students[] = array_combine($headers, $data);
        }

        return $students;
    }

    // Write array back to CSV
    private function writeCsv($students)
    {
        $headers = ['id', 'name', 'email', 'age'];
        $lines = [];
        $lines[] = implode(',', $headers);

        foreach ($students as $student) {
            $lines[] = implode(',', [
                $student['id'],
                $student['name'],
                $student['email'],
                $student['age']
            ]);
        }

        Storage::put($this->csvPath, implode("\n", $lines));
    }

    public function index()
    {
        $students = $this->readCsv();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        $students = $this->readCsv();
        $lastId = count($students) > 0 ? max(array_column($students, 'id')) : 0;

        $students[] = [
            'id' => $lastId + 1,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ];

        $this->writeCsv($students);

        return redirect('/')->with('success', 'Student added!');
    }

    public function edit($id)
    {
        $students = $this->readCsv();
        $student = null;

        foreach ($students as $s) {
            if ($s['id'] == $id) {
                $student = $s;
                break;
            }
        }

        if (!$student) {
            return redirect('/')->with('error', 'Student not found');
        }

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        $students = $this->readCsv();
        foreach ($students as &$student) {
            if ($student['id'] == $id) {
                $student['name'] = $request->name;
                $student['email'] = $request->email;
                $student['age'] = $request->age;
                break;
            }
        }

        $this->writeCsv($students);

        return redirect('/')->with('success', 'Student updated!');
    }

    public function destroy($id)
{
    $students = $this->readCsv();

    // Filter out the student to delete
    $students = array_filter($students, function($s) use ($id) {
        return $s['id'] != $id;
    });

    // Re-index array keys so CSV writes cleanly
    $this->writeCsv(array_values($students));

    return redirect('/')->with('success', 'Student deleted!');
}

}
