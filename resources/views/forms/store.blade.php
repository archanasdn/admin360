<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Form Example - SB Admin</title>
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    @include('includes.header')
    <div id="layoutSidenav">
        @include('includes.nav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Form Example</h3>
                                </div>
                                <div class="card-body">
                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if ($hasPrivilege)
                                    <form method="post" action="{{ url('form/store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$data->id ?? 0}}">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name', @$data->name)}}" required>
                                            @if ($errors->has('name'))
                                            <span class=" text-danger  form-text font-size-85p" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Phone Number</label>
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="phone_number" value="{{old('phone_number', @$data->phone_number)}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                @foreach ($enumValues as $enum)
                                                <option value="{{ $enum->value }}" {{ (old('gender', @$data->gender) == $enum->value) ? 'selected' : '' }}>
                                                    {{ $enum->value }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <br>
                                      
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        
                                    </form>
                                    @else
    <p>You do not have permission to view or submit this form.</p>
@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('js/scripts.js') }}"></script>
</body>

</html>