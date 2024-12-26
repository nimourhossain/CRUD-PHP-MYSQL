<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Str; // Import the Str facade
use Carbon\Carbon; // Import Carbon for date handling

class PatientController extends Controller
{  
    public function create()
    {
        return view('create');
    }

    public function ourfilestore(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255', // Corrected spelling to 'address'
            'age' => 'required|integer|min:1|max:120',
            'disease' => 'required|string|max:15', // Adjust max length as needed
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Max size 2MB
        ]);

        $patient = new Patient;
        $patient->name = $validatedData['name'];
        $patient->adress = $validatedData['adress']; // Corrected spelling to 'address'
        $patient->age = $validatedData['age'];
        $patient->disease = $validatedData['disease'];

        // Handle image upload with a custom name
        if (isset($validatedData['image'])) {
            // Create a custom image name
            $imageName = Carbon::now()->format('Y-m-d_H-i-s') . '.' . $request->image->extension();
            // Move the image to the public/images directory
            $request->image->move(public_path('images'), $imageName);
            $patient->image = 'images/' . $imageName; // Save the image path to the database
        } else {
            $patient->image = null; // Set to null if no image is uploaded
        }

        $patient->save();

        return redirect()->route('home')->with('success', 'Patient information has been successfully created.');
    }
    



    public function editData($id){
        $patient = Patient::findOrFail($id);
        return view('edit', ['ourPatient'=>$patient]);
    }





    public function updateData($id,Request $request)
    {
       

         // Validate the request
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255', // Corrected spelling to 'address'
            'age' => 'required|integer|min:1|max:120',
            'disease' => 'required|string|max:15', // Adjust max length as needed
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Max size 2MB
        ]);

        // $patient = new Patient;
        $patient = Patient::findOrFail($id);
        $patient->name = $validatedData['name'];
        $patient->adress = $validatedData['adress']; // Corrected spelling to 'address'
        $patient->age = $validatedData['age'];
        $patient->disease = $validatedData['disease'];

        // Handle image upload with a custom name
        if (isset($validatedData['image'])) {
            // Create a custom image name
            $imageName = Carbon::now()->format('Y-m-d_H-i-s') . '.' . $request->image->extension();
            // Move the image to the public/images directory
            $request->image->move(public_path('images'), $imageName);
            $patient->image = 'images/' . $imageName; // Save the image path to the database
        } 

        $patient->save();

        return redirect()->route('home')->with('success', 'Patient information has been successfully updated.');


    }


    public function deleteData($id){
        $patient = Patient::findOrFail($id);

        $patient->delete();
        
        return redirect()->route('home')->with('success', 'Patient information has been successfully deleted!');
    }


}
