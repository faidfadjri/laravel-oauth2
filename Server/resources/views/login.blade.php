<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OAUTH demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="display: flex; align-items: center; justify-content: center; margin-top: 50px">
  <br><br>
  <div class="row p-3" style="background: #f2f2f2; width: fit-content;">
      <div class="col">
          <div class="container">
              <form id="loginForm">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <button type="button" id="login-btn" class="btn btn-primary">Submit</button>
                </form>   
          </div>
      </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("#login-btn").on("click", function () {
                $("#login-btn").prop("disabled", true);
    
                $("#login-btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
    
                var formData = $("#loginForm").serialize();
    
                $.ajax({
                    url: "/login",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        window.location.href = '/';
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr, status, error);
    
                        let message = xhr.responseJSON.error;
                        alert(message);
                    },
                    complete: function () {
                        $("#login-btn").prop("disabled", false);
                        $("#login-btn").html('Submit');
                    }
                });
            });
        });
    </script>
</body>
</html>
