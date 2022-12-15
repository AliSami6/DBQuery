<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card m-1">
                <div class="card-body pt-2">
                    @php
                         $studentsPluck = DB::table('students')->pluck('name','id');

                    @endphp
                    <select name="" id="" class="form-control">
                        @foreach ($studentsPluck as $id=>$name)
                            <option value="{{ $id }}">{{ $name }}.{{ $id }}</option>
                        @endforeach

                    </select>
                    <select name="" id="" class="form-control">
                        @foreach ($students as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}.{{ $value->id }}</option>
                        @endforeach

                    </select>
                    <table class="table table-striped table-hover p-1">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Registration</th>
                            <th>Department</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Birth Day</th>
                            <th>Date</th>
                        </tr>
                        <tbody>

                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>

                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->reg }}</td>
                                    <td>{{ $student->subject }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>{{ $student->birthDay }}</td>
                                    <td>{{ $student->created_at }}</td>
                                </tr>
                            @empty
                                <h4 class="text-center m-1"> No data found! .</h4>
                            @endforelse
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
