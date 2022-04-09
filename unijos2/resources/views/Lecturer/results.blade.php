<!DOCTYPE html>
<html>
<head>
    <title>RESULTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            IMPORT RESULTS EXEL FILE IN CORRECT FORMAT
        </div>
        <div class="card-body">
            <form action="{{ route('results.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div>
     
</body>
</html>