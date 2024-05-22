<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
    </head>
    <body>
        <h3>{{ $title}}</h3>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal</th>
            </tr>
            @php $no = 1; @endphp
            @foreach($daf_mhs as $mhs)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['asal'] }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
