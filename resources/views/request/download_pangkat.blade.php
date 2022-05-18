<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body style="margin: 0;padding: 0">
    <div style="position:fixed; height:100%; width:100%">
      <embed src="{{ asset('storage/' . $pangkat->surat_keterangan) }}" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed>
    </div>
</body>
</html>