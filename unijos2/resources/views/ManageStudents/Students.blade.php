 <!DOCTYPE html>
   <html>
   <head>
       <title>Manage students</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       <!-- Font Awesome -->
       <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
       <!-- Ionicons -->
       <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       <!-- Tempusdominus Bootstrap 4 -->
       <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
       <!-- iCheck -->
       <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
       <!-- JQVMap -->
       <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
       <!-- Theme style -->
       <link rel="stylesheet" href="dist/css/adminlte.min.css">
       <!-- overlayScrollbars -->
       <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
       <!-- Daterange picker -->
       <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
       <!-- summernote -->
       <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
   </head>
   <body>
     
   <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                      
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Matric_no</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                
                                <tr>
                                   <td>{{$user->id}}</td>
                                   <td>{{$user->name}}</td>
                                   <td>{{$user->email}}</td>
                                   <td>{{$user->matric_no}}</td>
                                        <td>
                                            <a href="{{ route('students.edit', $user->id ) }}" title="Edit student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ route('students.destroy',$user->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
