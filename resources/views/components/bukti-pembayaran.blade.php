@if ($getRecord()->bukti_pembayaran)
    <img src="{{ asset('bukti_pembayaran/' . $getRecord()->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 150px;">
@endif