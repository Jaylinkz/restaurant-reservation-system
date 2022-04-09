
       <!DOCTYPE html>
       <html>
       <head>
           <title>Result</title>
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
       </head>
       <body>
            
       <div class="container">
           <div class="card bg-light mt-3">
               <div class="card-header">
                   STUDENT RESULT
               </div>
       <div class="card-body">
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        RESULT
                        <a class="btn btn-warning float-end" href="{{ route('results.export') }}">Export Result</a>
                    </th>
                </tr>
                <tr>
                    <th>id </th>
                    <th>course_name</th>
                    <th>course_code</th>
                    <th>semester</th>
                    <th>session</th>
                    <th>student_name</th>
                    <th>matric_number</th>
                    <th>CA</th>
                    <th>Exam_score</th>
                    <th>grade</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->course_name }}</td>
                    <td>{{ $user->course_code }}</td>
                    <td>{{ $user->semester }}</td>
                    <td>{{ $user->session }}</td>
                    <td>{{ $user->student_name }}</td>
                    <td>{{ $user->matric_no}}</td>
                    <td>{{ $user->CA}}</td>
                    <td>{{ $user->Exam_score}}</td>
                    <td>{{ $user->grade }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
    </html>