<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="{{ url('css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @include('includes.header')
    <div id="layoutSidenav">
        @include('includes.nav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            forms
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>


                                    @if(count($data)>0)
                                    @foreach($data as $val)
                                    <tr>
                                        <td>{{$val['name']}}</td>
                                        <td>{{$val['phone_number']}}</td>
                                        <td>{{$val['gender']}}</td>
                                        <td>
                                        @if ($hasPrivilege)
                                            <a href="{{ url('form/edit/'.$val->id) }}" class="btn table-action-btn " title="Edit">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            @else
                                            <p>You do not have permission to view or submit this form.</p>
                                        @endif
                                        @if ($hasPrivilege)
                                            <a href="javascript:void(0);" data-url="{{ url('form/delete/'.$val->id) }}" class="btn table-action-btn btnDeleteRow" title="Delete">
                                                <i class="fa fa-times-circle"></i>
                                            </a>

                                            <form id="deleteForm" action="" method="GET" style="display:none;">
                                                @csrf
                                                @method('GET')
                                            </form>
                                            @else
                                            <p>You do not have permission to view or submit this form.</p>
                                        @endif
                                        </td>

                                    </tr>
                                    @endforeach
                                    @else
                                    <td colspan="3">No data</td>
                                    @endif
                                </tbody>
                            </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    @include('includes.footer')
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btnDeleteRow');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.getAttribute('data-url');
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = url;
            deleteForm.submit();
        });
    });
});
</script>

</html>