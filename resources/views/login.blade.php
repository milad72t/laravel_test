<html>
   
   <head>
      <title>Login Form</title>
   </head>

   <body>
      
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      

      <form method="post" action="validation"/>
      <table border = '1'>
         <tr>
            <td align = 'center' colspan = '2'>Login</td>
         </tr>
         
         <tr>
            <td>Username</td>
            <td><input type="text" id="username"/></td>
         </tr>
         
         <tr>
            <td>Password</td>
            <td><input type="Password" id="password"/></td>
         </tr>
         
         <tr>
            <td align = 'center' colspan = '2'>
               <input type="submit" title="Data" value="Data">
               </td><form/>
         </tr>
      </table>
      
 
   
   </body>
</html>