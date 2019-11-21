<h2>Depreciation Table | Asset Management System</h2>

<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>{{ ucwords($settings['format']) }} #</th>
            <th></th>
            @for($a = 1; $a <= $settings['maxYear']; $a++)
            <th>{{ $a }}</th>
            @endfor

        </tr>
    </thead>

    <tbody>
        @if(!empty($records) && count($records) > 0)
        @foreach($records as $asset => $data)
        <tr>
            <td colspan="{{ $settings['maxYear'] + 2 }}"><b>{{ $asset }}</b> ({{ $data['start'] }} - {{ $data['end'] }})</td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp&nbsp;Opening Book value</td>

            @foreach($data['depreciation'] as $value)
            <td>{{ number_format($value['cost']) }}</td>
            @endforeach
        </tr>

        <tr>
            <td style="border-top: none;">&nbsp;&nbsp;&nbsp&nbsp;Depreciation</td>
            <td style="border-top: none;">{{ $data['depreciation'][1]['rate'] }}%</td>
            @foreach($data['depreciation'] as $value)
            <td style="border-top: none;">{{ number_format($value['less']) }}</td>
            @endforeach
        </tr>

        <tr>
            <td style="border-top: none;">&nbsp;&nbsp;&nbsp&nbsp;Ending Book value</td>
            <td>{{ number_format($data['depreciation'][1]['cost']) }}</td>
            @foreach($data['depreciation'] as $value)
            <td>{{ number_format($value['newCost']) }}</td>
            @endforeach
        </tr>

        @endforeach
        @endif
    </tbody>
</table>

