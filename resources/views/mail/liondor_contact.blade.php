<h2>リオンドール、お問い合わせフォームよりお問い合わせがありました。</h2>

<p>お問い合わせ内容：{{ $data['content'] }}</p>
<p>氏名：{{ $data['name'] }}</p>
<p>フリガナ：{{ $data['furigana'] }}</p>
<p>メールアドレス：{{ $data['mail'] }}</p>
<p>会社・店名：{{ $data['company'] }}</p>
<p>電話番号：{{ $data['tel'] }}</p>
<p>メッセージ本文<br>{{ nl2br($data['message']) }}</p>