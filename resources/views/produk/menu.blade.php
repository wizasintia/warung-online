<tbody>
@foreach ($produk as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>
        @if($p->foto)
            <img src="{{ asset('storage/'.$p->foto) }}" width="80">
        @endif
    </td>
    <td>{{ $p->nama_produk }}</td>
    <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
</tr>
@endforeach
</tbody>
