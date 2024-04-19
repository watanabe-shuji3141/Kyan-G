<b>新規予約</b><br>
{{$contact['name']}}({{$contact['huri']}})様<br><br>
予約内容<br>

・電話番号<br>
{{$contact['tel']}}<br><br>

・Eメールアドレス<br>
{{$contact['email']}}<br><br>

・住所<br>
{{$contact['pref31']}}{{$contact['addr31']}}<br><br>

・宿泊日<br>
{{$contact['start_day']}}~{{$contact['end_day']}}<br><br>

・宿泊人数<br>
大人{{$contact['ges-1']}}人 <br>
子供{{$contact['ges-2']}}人 <br><br>

・料金<br>
{{-- {{$contact['ges-1']}}円 --}}
<br><br>

管理者画面URL<br>
@php
    echo '/admin.login';
@endphp

