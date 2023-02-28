<h2>デラモール、お問い合わせフォームよりお問い合わせがありました。</h2>

<p>氏名：{{ $data['name'] }}</p>
<p>ユーザーID：{{ $data['user_id'] }}</p>
<p>メールアドレス：{{ $data['email'] }}</p>
<p>通報内容<br>{{ nl2br($data['message']) }}</p>