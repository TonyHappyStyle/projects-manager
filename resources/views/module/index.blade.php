<table>
    @foreach ($modules as $mo)
    <tr>
        <td>{{ $mo->name }}</td>
    </tr>
    @endforeach
</table>