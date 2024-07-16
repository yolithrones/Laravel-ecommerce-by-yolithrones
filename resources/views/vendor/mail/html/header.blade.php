@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="public/img/sttlogo1.png" class="logo" alt="SAINTTHETHIRD">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
