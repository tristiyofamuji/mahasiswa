<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Halaman Login</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <style type="text/css">
         .login-from {
         margin-top: 80px;
         border: 1px solid #ddd;
         }
         .login-from h4 {
         font-size: 26px;
         margin-bottom: 20px;
         margin-top: 20px;
         }
         p.return-home {
         margin: 20px 0;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-offset-4 col-md-4 login-from">
               <center>
                  <h4>Halaman Login</h4>
               </center>
               <form action="aksi-login.php" method="post">
                  <div class="form-group">
                     <label for="">Username</label>
                     <input type="text" class="form-control" name="username" placeholder="Username"/>
                  </div>
                  <div class="form-group">
                     <label for="">Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Password" />
                  </div>
                  <div class="text-right">
                     <button class="btn btn-primary" name="masuk">Login</button>
                  </div>
               </form>
               <br />     
            </div>
         </div>
      </div>
   </body>
</html>