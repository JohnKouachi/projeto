@extends('layouts.main')

@section('title', 'welcome')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Se tiver um arquivo CSS separado -->
</head>
<body>
    <header>
        <h1>About Us</h1>
    </header>
    <section>
        <div class="container">
            <div class="company-info">
                <img src="logo.png" alt="Company Logo">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget nibh congue, varius sem id, tincidunt ex. Nunc mattis eleifend aliquet. Curabitur vestibulum ultrices felis vel tincidunt. Fusce efficitur, felis a varius consequat, arcu mauris malesuada purus, id pharetra nulla sem vitae sapien.</p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 Company Name. All rights reserved.</p>
    </footer>
</body>
</html>


@endsection