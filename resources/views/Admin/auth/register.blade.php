<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-3">Register</h1>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group"> <label for="name">Name</label> <input type="text"
                                    class="form-control" id="name" aria-describedby="nameHelp"
                                    placeholder="Enter name" name="name"> </div>
                            <div class="form-group"> <label for="email">Email address</label> <input type="email"
                                    class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="Enter email" name="email"> </div>
                            <div class="form-group"> <label for="phoneNumber">phone number</label> <input type="phone"
                                    class="form-control" id="phoneNumber" aria-describedby="emailHelp"
                                    placeholder="Enter phone" name="phoneNumber"> </div>
                            <div class="form-group"> <label for="lang">lang</label> <input type="number"
                                    class="form-control" id="lang" aria-describedby="nameHelp"
                                    placeholder="Enter lang" name="lang"></div>
                            <div class="form-group"> <label for="lat">lat</label> <input type="number"
                                    class="form-control" id="lat" aria-describedby="nameHelp"
                                    placeholder="Enter lat" name="lat"></div>

                            <div class="form-group"> <label for="password">Password</label> <input type="password"
                                    class="form-control" id="password" placeholder="Password" name="password"> </div> 
                            <div class="form-group"> <label for="password_confirmation">password_confirmation</label> <input type="password"
                                    class="form-control" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation"> </div> <button
                                type="submit" class="btn btn-primary btn-block"
                                >Register</button>

                        </form>
                        @isset($error)
                        @foreach ($error as $er )
                            <div>{{$er->massege}}</div>
                        @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
