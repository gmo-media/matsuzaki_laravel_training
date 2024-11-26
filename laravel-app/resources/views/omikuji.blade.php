<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>おみくじアプリ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1>おみくじを引く</h1>
<button id="omikujiButton">おみくじを引く</button>
<button id="paidOmikujiButton">100円でおみくじを引く</button>
<p id="result"></p>

<script>
    document.getElementById('omikujiButton').addEventListener('click', function() {
        fetch('/omikuji')
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerText = `結果: ${data.result}`;
            })
            .catch(error => {
                console.error('エラー:', error);
                document.getElementById('result').innerText = 'エラーが発生しました';
            });
    });

    document.getElementById('paidOmikujiButton').addEventListener('click', function() {
        fetch('/omikuji/paid')
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerText = `結果: ${data.result}`;
            })
            .catch(error => {
                console.error('エラー:', error);
                document.getElementById('result').innerText = 'エラーが発生しました';
            });
    });
</script>
</body>
</html>
