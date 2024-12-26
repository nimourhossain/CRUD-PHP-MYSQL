<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .header {
                @apply bg-green-600 text-white py-4 px-6 shadow-md;
            }
            .header-content {
                @apply flex justify-between items-center max-w-7xl mx-auto;
            }
            .page-title {
                @apply text-2xl font-semibold;
            }
            .btn-primary {
                @apply bg-white text-green-600 py-2 px-4 rounded-lg font-medium hover:bg-gray-100 transition-all shadow-sm;
            }
            .alert-success {
                @apply bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 shadow-md;
            }
            .table-header {
                @apply bg-green-600 text-green-900 font-semibold;
            }
            .alert-title {
                @apply font-bold;
            }
            .alert-message {
                @apply text-sm;
            }
        }
    </style>
    <title>Home</title>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Full-width Header -->
    <header class="header">
        <div class="header-content">
            <h2 class="page-title">Home</h2>
            <p class="text-white font-semibold">
            Welcome to the patient management system. Click <span class="font-medium">"Add New Patient"</span> to create a new entry.
        </p>
            <a href="/create" class="btn-primary">Add New Patient</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container max-w-7xl mx-auto py-8">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert-success" role="alert">
                <p class="alert-title">Success!</p>
                <p class="alert-message">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Patient Table -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="table-header">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >ID</th>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >Address</th>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >Age</th>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >Phone</th>
                                    <th scope="col" class="px-6 py-3 text-start text-lg font-medium text-white uppercase"
                                    >Image</th>
                                    <th scope="col" class="px-6 py-3 pr-16 text-right text-lg font-medium text-white uppercase">
    Action
</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr class="odd:bg-white even:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $patient->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $patient->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $patient->adress }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $patient->age }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $patient->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <img src="{{ $patient->image }}" alt="{{ $patient->name }}'s Profile Picture" class="w-20 h-20 rounded-full">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
    <a href="{{route('edit', $patient->id)}}"  class="bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-400 transition-all shadow-sm">Edit</a>
    <a href="{{route('delete', $patient->id)}}"  class="bg-red-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-400 transition-all shadow-sm">Delete</a>
</td>

                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <br>
                        {{$patients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
