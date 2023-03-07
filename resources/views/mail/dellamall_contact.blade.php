<h2>デラモール、お問い合わせフォームよりお問い合わせがありました。</h2>

<p>お問い合わせ種別<br>@foreach($data['type'] as $single){{ $single }},@endforeach</p>
<p>URL：{{ $data['url'] }}</p>
<p>氏名：{{ $data['name'] }}</p>
<p>フリガナ：{{ $data['furigana'] }}</p>
<p>会社名：{{ $data['company'] }}</p>
<p>メールアドレス：{{ $data['mail'] }}</p>
<p>電話番号：{{ $data['tel'] }}</p>
<p>お問い合わせ内容<br>{{ nl2br($data['content']) }}</p>