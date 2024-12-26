<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
        .container {
            @apply max-w-4xl px-8 mx-auto;
        }
        .form-input {
            @apply border border-gray-300 rounded-md p-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none;
        }
        .form-label {
            @apply text-gray-700 font-medium mb-2 block;
        }
        .form-heading {
            @apply text-3xl font-semibold text-gray-800;
        }
        .btn-primary {
            @apply bg-green-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-green-700 transition-all shadow-md;
        }
        .error-message {
            @apply text-red-600 text-sm mt-1;
        }
    }
</style>

    <title>Professional Form</title>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="container bg-white shadow-lg rounded-lg p-8">
        <header class="flex justify-between items-center border-b pb-4 mb-6">
            <h2 class="form-heading">Edit - {{$ourPatient->name}}</h2>
            <a href="/" class="btn-primary">Back to Home</a>
        </header>
        <form method="POST" action="{{ route('update', $ourPatient->id) }}" enctype="multipart/form-data" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" value = "{{$ourPatient->name}}" class="form-input @error('name') border-red-500 @enderror" placeholder="Enter your full name" value="{{ old('name') }}">
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Address Field -->
                <div>
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" id="adress" name="adress" value = "{{$ourPatient->adress}}" class="form-input @error('adress') border-red-500 @enderror" placeholder="Enter your address" value="{{ old('adress') }}">
                    @error('adress')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Age Field -->
                <div>
                    <label for="age" class="form-label">Age</label>
                    <input type="number" id="age" name="age" value = "{{$ourPatient->age}}" class="form-input @error('age') border-red-500 @enderror" placeholder="Enter your age" value="{{ old('age') }}">
                    @error('age')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Phone Number Field -->
                <div>
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value = "{{$ourPatient->phone}}" class="form-input @error('phone') border-red-500 @enderror" placeholder="Enter your phone number" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Image Upload -->
                <div class="col-span-1 md:col-span-2">
                    <label for="image" class="form-label">Upload Profile Picture</label>
                    <input type="file" id="image" name="image" class="form-input @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Submit Button -->
            <div class="text-center mt-8">
                <button type="submit" class="btn-primary">Submit Form</button>
            </div>
        </form>
    </div>
</body>
</html>
