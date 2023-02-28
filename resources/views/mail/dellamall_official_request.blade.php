<h2>デラモール、公式ショップ申請フォームよりお問い合わせがありました。</h2>

<p>申請内容{{ $data['content'] }}</p>
<p>URL：{{ $data['url'] }}</p>
<p>事業形態{{ $data['type'] }}</p>
<p>会社名：{{ $data['company'] }}</p>
<p>会社名フリガナ：{{ $data['furiganaCompany'] }}</p>
<p>電話番号：{{ $data['tel'] }}</p>
<p>メールアドレス：{{ $data['mail'] }}</p>
<p>郵便番号：{{ $data['zipcode'] }}</p>
<p>都道府県：{{ $data['zip'] }}</p>
<p>番地・建物名・部屋番号：{{ $data['zip2'] }}</p>
<p>お名前：{{ $data['name'] }}</p>
<p>フリガナ：{{ $data['furigana'] }}</p>
<p>連絡先：{{ $data['contact'] }}</p>
<p>連絡先メールアドレス：{{ $data['mail2'] }}</p>
<p>連絡先電話番号：{{ $data['tel2'] }}</p>
<p>備考<br>{{ nl2br($data['remarks']) }}</p>