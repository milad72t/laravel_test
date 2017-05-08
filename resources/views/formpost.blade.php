<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>post</title>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="/sentcomment">
              {{ csrf_field() }}
              <h1>sent your comment</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" />
              </div>
              <div>
                <input type="text" name="title" class="form-control" placeholder="title" required="" />
                 <br />
                <input type="text" name="body" class="form-control" placeholder="body" required="" />
                 <br />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">sent your comment</button>
        
              </div>
                 @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif


              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
