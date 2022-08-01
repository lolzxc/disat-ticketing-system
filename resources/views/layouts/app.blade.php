<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('stylesheet')
    
    
    <style>

        body {
            background-color: #08519C;
            font-family: 'Calibri';
            font-size: 2rem;
            margin: 0;
        }
        .title-main {
            font-size: 4rem;
            color: #ffc800;
            font-weight: bold;
        }
        .details {
        font-size: 2.5rem;
        color: black;
        }
        .title-faq {
            font-size: 4rem;
            color: lightgreen;
        }
        @media only screen and (max-width:600px) {
            body {
                font-size: 1.25rem;
            }
            .details {
                font-size: 1.5rem;
            }
            .title-main {
                font-size: 3rem;
            }

            .title-faq {
                font-size: 2.5rem;
            }
        }

        @media only screen and (min-width:601px) and (max-width:767px) {
            body {
                font-size: 1.5rem;
            }
            .details {
                font-size: 2rem;
            }
            .title-main {
                font-size: 4rem;
            }

            .title-faq {
                font-size: 3rem;
            }
        }
       
        
    </style>
    
    
    <title>DISAT</title>
</head>

<body>
    @yield('content')

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>