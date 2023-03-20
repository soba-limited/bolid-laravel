<p>ボリードジャパン、広告掲載フォームからのメールです</p>

<p>ユーザーID：{{ $data['user_id'] }}</p>
<p>お問い合わせ内容<br>@foreach($data['content'] as $single){{ $single }},@endforeach</p>
<p>氏名：{{ $data['name'] }}</p>
<p>会社名：{{ $data['store_name'] }}</p>
<p>メールアドレス：{{ $data['email'] }}</p>
<p>電話番号：{{ $data['tel'] }}</p>
<p>メッセージ本文<br>{{ nl2br($data['message']) }}</p>