<x-layout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="row mt-3" >
                <div class="col-md-12">
                    <h4 class="text-center">Employee Management</h4>
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                        
                    @endif
                    <div class="mb-3">
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="">Employee Name</label>
                                <input type="text" name="emp_name" class="form-control" value="{{ old('emp_name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Employee DOB</label>
                                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Employee Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
      <table class="table">
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Employee DOB</th>
            <th>Employee Phone</th>
            <th>Action</th>
        </tr>
        @foreach ($employees  as $employee )
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->emp_name }}</td>
            <td>{{ $employee->dob }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <a href="{{ route('employee.edit', $employee->id) }}">
                    <button class="btn btn-success btn-sm">Edit</button>
                </a>
                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" 
                    style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
            
        @endforeach

      </table>
    </div>

</x-layout>
