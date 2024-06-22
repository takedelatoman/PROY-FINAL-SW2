<!DOCTYPE html>
<html>
<head>
    <title>Consultar Transacciones de Sepolia</title>
</head>
<body>
    <h1>Consultar Transacciones de Sepolia</h1>
    <form action="{{ route('transactions.fetch') }}" method="POST">
        @csrf
        <label for="address">Dirección Ethereum:</label>
        <input type="text" id="address" name="address" required>
        <button type="submit">Consultar Transacciones</button>
    </form>
</body>
</html>
