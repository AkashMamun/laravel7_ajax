<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Student <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal">Add New</button>
                </div>
                <div class="card-body">
                    <table class="table" id="studentTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FirstName</th>
                                <th>lastName</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key=>$student)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>

                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="studentForm">
            @csrf
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone No.</label>
                <input type="number" name="phone" class="form-control">
            </div>
            <button type="buttton" class="btn btn-success mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $('#studentForm').submit(function(e){
            e.preventDefault();
            var firstname = $("input[name=firstname]").val();
            var lastname = $("input[name=lastname]").val();
            var email = $("input[name=email]").val();
            var phone = $("input[name=phone]").val();
            var _token = $("input[name = _token]").val();

            $.ajax({
                url:"{{ route('student.add') }}" ,
                type:"POST" ,
                data: {
                    firstname : firstname,
                    lastname : lastname,
                    email : email,
                    phone : phone,
                    _token : _token
                },
                success:function(response){
                    console.log(response);
                    $('#studentTable tbody').append('<tr><td>'+id+'</td><td>'+firstname+'</td><td>'+lastname+'</td><td>'+email+'</td><td>'+phone+'</td></tr>');
                    $('#studentModal').modal('toggle');
                    $('#studentForm')[0].reset();
                }
            });
        });
    </script>

  </body>
</html>
