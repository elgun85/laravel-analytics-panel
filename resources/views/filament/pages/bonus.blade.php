<x-filament-panels::page>


@foreach ($this->data as $item)
    <p>{{ $item->notel }}  - {{ $item->count }}</p>    
@endforeach
Toplam: {{ $this->data->sum('count') }}
<hr style="color: red">

<p>menzil sayi: {{$menzil_say}}</p>   
<p>qurum sayi : {{$qurum}}</p>
{{-- @foreach ($this->data_analizi as $item)
    <p>{{ $item->NOTEL }}
          - {{ $item->ABONENT }}
          - {{$item->KODTARIF}}
          - {{$item->SUMMA0}}
          - {{$item->SUMMA}}
          - {{$item->KODXIDMET}}
        </p>    
@endforeach
<h3>Hesablama ayliq : {{ $this->data_analizi->sum('SUMMA') }}</h3> --}}



    {{-- {{ $this->data }} --}}
</x-filament-panels::page>
