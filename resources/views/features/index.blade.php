<table>
    @foreach ($features as $fea)
    <tr>
        <td>{{ $fea->name }}</td>
    </tr>
    @endforeach
</table>