<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Alert</title>
 
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.premium-alert {
  text-align: center;
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 20px;
}

button:hover {
  background-color: #45a049;
}

</style>
<body>
  <div class="premium-alert">
    <h1>Premium Content Alert!</h1>
    <p>This content is premium. Please subscribe to access.</p>
    <button id="subscribe-btn">Subscribe Now</button>
  </div>
  <script>
    document.getElementById('subscribe-btn').addEventListener('click', function() {
  alert('Redirecting to subscription page...');
  // Add code here to redirect user to the subscription page
  // Example: window.location.href = 'subscription-page.html';
});

  </script>
</body>
</html>
