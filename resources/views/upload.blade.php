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
        <div class="container mt-5">
            <div class="row mb-2">
                <div class="col-md-9 ">
                  <h4>Pdf File List</h4>
                </div>
                <div class="col-md-3 pull-right ">
                  <a href="{{ route('create') }}">
                    <button class="btn btn-success">+ Add New File</button>
                  </a>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">File</th>
                    <th scope="col">Result</th>
                  </tr>
                </thead>
                <tbody>

                    <?php $k = 1; ?>
                    @foreach($files as $file)
                    <tr>
                    <td scope="col">{{ $k }}</td>
                    <td scope="col">{{ $file->name }}</td>
                    <td scope="col">{{ $file->upload }}</td>
                    <td scope="col"><a href="{{  route('show', $file->id) }}">View</a>&nbsp;&nbsp;
                        <a class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $file->id }}').submit();">
                            <span>Remove</span>
                        </a>
                        <form id="delete-form-{{ $file->id }}" action="{{ route('delete',$file->id) }}" method="POST" style="display: none;">
                            @csrf @method('delete')
                        </form>
                    </td>
                    <?php $k++; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
