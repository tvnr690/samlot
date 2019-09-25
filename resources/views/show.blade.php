<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroha File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('upload') }}">Alberta</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('upload') }}">Home</a>
                </li>
              </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="contain p-5">
            {{-- {{ $text }} --}}
            <?php
            //   echo $text;
              echo "<pre>";

                $arr = explode(" ", $text);

            // print_r($arr)
                $ar6 = $arr[6];
                $arr2 = explode("cell", $ar6);
                print_r($arr2);

                // echo $ar6;
            ?>
            {{-- echo $text; --}}

        </div>
    </section>
</body>
</html>
