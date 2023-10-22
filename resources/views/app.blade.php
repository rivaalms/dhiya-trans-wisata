<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title inertia>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
   <link href="https://fonts.bunny.net/css?family=montagu-slab:100,200,300,400,500,600,700&display=swap" rel="stylesheet" />

   {{-- @routes --}}
   @vite(['resources/js/app.js'])
   @inertiaHead
</head>

<body class="font-sans antialiased">
   @inertia
</body>
</html>
