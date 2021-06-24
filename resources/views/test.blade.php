<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>

<body>


    <script>
        const formData = new FormData
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('month', 5);
        formData.append('year', 2021);
        fetch('/get_date_data', {
            method: 'POST',
            body: formData,
        }).then(response => response.json())
            .then(result => console.log(result))
    </script>
</body>

</html>