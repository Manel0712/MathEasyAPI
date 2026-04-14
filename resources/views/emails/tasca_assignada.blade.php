<!DOCTYPE html>
<html>
<head>
    <title>Tasca Assignada</title>
</head>
<body>
    <p>Hola {{ $alumne->Nom }},</p>
    <p>Se t'ha assignat la tasca: <strong>{{ $tasca->Nom }}</strong>.</p>
    <p>Data d'obertura: {{ \Carbon\Carbon::parse($tasca->Data_obertura)->format('d/m/Y') }}</p>
    <p>Data de tancament: {{ \Carbon\Carbon::parse($tasca->Data_tancament)->format('d/m/Y') }}</p>
    <p>Bon treball!</p>
</body>
</html>