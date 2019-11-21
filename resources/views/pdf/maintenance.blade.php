<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Licenses | Asset Management System</title>
    </head>
    <body>
        <h2>Assets for maintenance | Asset Management System</h2>

        <table border='1' cellspacing='0' cellpadding='5' width='100%'>
            <thead>
                <tr>
                    <th>Job Order</th>
                    <th>Asset Tag</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Status</th>
                    <th>Date Endorsed</th>
                    <th>ETC</th>
                    <th>Comments/Notes</th>
                    <th>Date Released</th>
                </tr>
            </thead>

            <tbody>
                @if(isset($maintenance) && !empty($maintenance))
                @foreach($maintenance as $asset)
                <tr>
                    <td>{{ $asset->joborderid }}</td>
                    <td>{{ $asset->asset_id }}</td>
                    <td>{{ $asset->asset->brand }}</td>
                    <td>{{ $asset->asset->model }}</td>
                    <td>{{ $asset->status->name }}</td>
                    <td>{{ date('F d, Y H:i:s', strtotime($asset->date_endorsed)) }}</td>
                    <td>{{ $asset->etc != null ? date('F d, Y', strtotime($asset->etc)) : '-' }}</td>
                    <td>{{ $asset->comments }}</td>
                    <td>{{ $asset->date_released != null ? date('F d, Y H:i:s', strtotime($asset->date_released)) : '-' }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </body>
</html>
