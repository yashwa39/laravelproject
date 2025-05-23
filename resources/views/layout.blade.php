<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>CSV Student Manager</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f0f4f8;
    margin: 0; padding: 20px;
  }
  header {
    background: #005f73;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 1.8em;
    margin-bottom: 20px;
    border-radius: 6px;
  }
  a {
    text-decoration: none;
    color: #0a9396;
    font-weight: bold;
  }
  .container {
    max-width: 700px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.1);
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
  }
  th, td {
    border: 1px solid #94d2bd;
    padding: 10px;
    text-align: left;
  }
  th {
    background: #ee9b00;
    color: white;
  }
  input[type="text"], input[type="email"], input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  button, input[type="submit"] {
    background: #0a9396;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
  }
  button:hover, input[type="submit"]:hover {
    background: #005f73;
  }
  .message {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
  }
  .success {
    background: #94d2bd;
    color: #001219;
  }
  .error {
    background: #ee6c4d;
    color: white;
  }
  .actions form {
    display: inline;
  }
</style>
</head>
<body>
<header>CSV Student Manager</header>
<div class="container">
  @if(session('success'))
    <div class="message success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="message error">{{ session('error') }}</div>
  @endif

  @yield('content')
</div>
</body>
</html>
