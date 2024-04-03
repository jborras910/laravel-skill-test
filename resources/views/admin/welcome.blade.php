

@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

@auth
{{-- {{auth()->user()->email}} --}}

<div class="">

    <div class="">
        <div class=""><h3>Users Table</h3></div>
        <div class="floar-right">
         <!-- Modify the button in your code -->
        <button class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
        <a href="{{ route('user.create') }}" class="btn btn-primary text-light">Add account</a>
        </div>
        
    </div>
    <hr>




    @if(Session::has('status'))

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('status') }}'
            });
        });
    </script>

    @endif


    <table  class="table " id="myTable" width="100%" cellspacing="0" >
        <thead>
            <tr>
                <th>First Name</th>
        
                <th>Email</th>
            
            
                <th>Status</th>
                <th>Delete</th>
                <th>Edit</th>
        
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
        
            <td>{{$user->first_name." ".$user->middle_name." ".$user->last_name}}</td>
    
        
            <td>{{$user->email}}</td>
    
        
            <th>{{$user->active_status}}</th>
            <td><a class="btn btn-success" href="{{route('user.edit', ['user'=> $user])}}">Edit</a></td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    Delete
                </button>
                <form method="post" action="{{route('user.destroy', ['user'=> $user])}}">
                    @csrf
                    @method('delete')
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                Are you sure? <br> you want to delete {{$user->email}} ?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

   


<!-- for excell report -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script>
    function exportToExcel() {
        // Select the table
        var table = document.getElementById('myTable');

       
        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].deleteCell(-1); 
            table.rows[i].deleteCell(-1); 
        }

        // Convert the table to a worksheet
        var ws = XLSX.utils.table_to_sheet(table);

        // Create a new workbook
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        // Save the workbook as an Excel file
        var fileName = 'users_data.xlsx';
        XLSX.writeFile(wb, fileName);

        // Restore the table by reloading the page or fetching the original data
        // Optional: You may want to consider fetching the original data from the server and reloading the table after exporting
        window.location.reload(); 
    }
</script>
@endauth




@endsection