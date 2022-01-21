<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container pt-5 pb-5">
     

<table class="table table-striped">
                        <tbody id="AppData">
                        <tr>
                <td colspan="2" class="text-center"><img src="{{$user->profile_photo ? asset('assets/images/patient-profile/'.$user->profile_photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Donor's Photo" style="max-height: 300px; width: 250px;"></td>
            </tr>
            <tr>
                <td>Joined</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$user->phone}}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{$user->address}}</td>
            </tr>
            <tr>
                <td>Age</td>
                <td>{{$user->age}}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{$user->gender}}</td>
            </tr>
            <tr>
                <td>Fax</td>
                <td>{{$user->fax}}</td>
            </tr>
            
            <tr>
                <td colspan='2'>More Information</td>
            </tr>
            <tr>
                <td colspan='2'>{{$user->my_info}}</td>
            </tr>
            

                        </tbody>
</table>
<button onclick="window.print()" class="btn btn-primary" >Print</button>

      </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
