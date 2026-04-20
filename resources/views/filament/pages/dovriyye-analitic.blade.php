<x-filament-panels::page>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Hesab</th>
      <th scope="col">Ad</th>
      <th scope="col">Novu</th>
      <th scope="col">01.2025</th>
      <th scope="col">01.2026</th>
      <th scope="col">03.2026</th>
      <th scope="col">Hesablanma 03.2026</th>
    </tr>
  </thead>
  <tbody>
{{--      <h1>cemi {{$this->data()->sum('giris_yanvar_2025')}} </h1>
 --}}    @foreach ($this->data as $item)
            <tr>
      <td>{{ $item->hesab }}</td>
<td title="{{ $item->ad }}">
    {{ \Illuminate\Support\Str::limit($item->ad, 40) }}
</td>      <td>{{ $item->maliyye_novu }}</td>
      <td>{{ $item->giris_yanvar_2025 }}</td>
      <td>{{ $item->giris_yanvar_2026 }}</td>
      <td>{{ $item->giris_mart_2026 }}</td>
      <td>{{ $item->hesablanma_mart_2026 }}</td>
    </tr>
    @endforeach

   


  </tbody>
</table>
{{--  {{$this->table}}
 --}}</x-filament-panels::page>
