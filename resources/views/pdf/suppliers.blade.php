<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Suppliers | Asset Management System</title>
    </head>
    <body>
        <h2>Suppliers | Asset Management System</h2>

        <table border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th>Supplier</th>
                    <th>Description</th>
                    <th>Date Added</th>
                </tr>
            </thead>


            <tbody>
                @if(isset($suppliers) && !empty($suppliers))
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->description }}</td>
                    <td>{{ $supplier->created_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </body>
</html>
