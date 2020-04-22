<!DOCTYPE html>
<html lang="en">
<title>Image To Base64 Converter</title>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="js/init.js"></script>
</head>

<body>
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
         >Rich Link Preview</a>
      </li>
    </ul>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <form id="richlinkpreview">
          <div class="form-group">
            <label for="exampleInputEmail1">Url</label>
            <input type="url" class="form-control" id="imageUrl" aria-describedby="emailHelp"
              placeholder="Enter iage url">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="table table-striped container" class="files" id="previews">
        
        </div>
      </div>
    </div>
  </div>
</body>

</html>