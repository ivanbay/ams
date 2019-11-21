<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Licenses | Asset Management System</title>
    </head>
    <body>
        <h2>Licenses | Asset Management System</h2>

        <table border='1' cellpadding='5' cellspacing='0' width='100%'>
            <thead>
                <tr>
                    <th>License Type</th>
                    <th>Manufacturer</th>
                    <th>Vendor</th>
                    <th>License Key</th>
                    <th>Cost</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Acquisition Date</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>

            <tbody>
                @if(isset($licenses) && !empty($licenses))
                @foreach($licenses as $license)
                <tr>
                    <td>{{ $license->license_type->name}}</td>
                    <td>{{ $license->manufacturer }}</td>
                    <td>{{ $license->vendor }}</td>
                    <td>{{ $license->license_key}}</td>
                    <td>{{ $license->cost != '' ? "Php " . number_format($license->cost, 2) : '-' }}</td>
                    <td>{{ $license->description}}</td>
                    <td>
                        @if( $license->assignedTo != null )
                        <a href="{{ route('profile.show', $license->assignedTo->asset_id) }}">
                            {{ $license->assignedTo->asset_id }}
                        </a>                                        
                        @endif
                    </td>
                    <td>{{ date('F d, Y', strtotime($license->acquisition_date)) }}</td>
                    <td>{{ date('F d, Y', strtotime($license->expiry_date)) }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </body>
</html>
