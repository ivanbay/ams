<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>QR Codes | Asset Management System</title>
    </head>
    <body>
        <h2>Assets' QR Codes | Asset Management System</h2>

        <table border='0' cellpadding='10' cellspacing='0' width='100%'>

            <tbody>
                @if(isset($assets) && !empty($assets))

                @php $i = 1; @endphp
                @foreach($assets as $asset)
                @if($i == 4) <tr> @endif
                    <td sytle='border: 1px; padding: 50px 0;' align='center'>
                        @php $content = "Asset Tag: " . $asset['tag'] . PHP_EOL . "Assigned To: " . $asset['assigned_to']->assignedTo; @endphp
                        <img width="150px" src='data:image/png;base64,{{ DNS2D::getBarcodePNG($content, "QRCODE") }}' />
                        <div style="margin: 5px 0 0 0;">{{ $asset['name'] }}</div>
                        <div>{{ $asset['tag'] }}</div>
                    </td>
                    @if($i == 4) </tr> @endif
                @php $i++; @endphp
                @if($i == 4) @php $i = 1; @endphp @endif
                @endforeach
                @endif
            </tbody>
        </table>


    </body>
</html>
