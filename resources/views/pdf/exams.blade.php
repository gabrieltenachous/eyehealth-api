<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Exames</title>
  <style>
    body { font-family: sans-serif; font-size: 14px; margin: 0; padding: 1rem; }
    .page { page-break-after: always; }
    .exam { margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid #ccc; }
  </style>
</head>
<body>
  @foreach ($pages as $index => $exams)
    <div class="page">
      <h2>Página {{ $index + 1 }}</h2>
      @foreach ($exams as $exam)
        <div class="exam">
          <strong>{{ $exam['name'] }}</strong><br>
          <em>{{ $exam['comment'] }}</em><br>
          Lateralidade: {{ $exam['laterality'] ?? 'Não definida' }}<br>
          Grupo: {{ $exam['group'] }}
        </div>
      @endforeach
    </div>
  @endforeach
</body>
</html>
