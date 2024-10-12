<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
            <h2 class="text-2xl font-bold mb-4">Please Wait...</h2>
            <p>Your account is being confirmed. This may take a few moments.</p>

            <!-- Loading animation -->
            <div class="flex justify-center mt-4">
                <div class="animate-spin rounded-full h-20 w-20 border-t-4 border-b-4 border-indigo-600"></div>
            </div>

            <p class="mt-6" id="status-message">Checking activation status...</p>
        </div>
    </div>

    <script>
        // Get email from the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get('email');

        // Function to check if the account is activated
        function checkActivation() {
            $.ajax({
                url: 'check_activation.php', // PHP script to check activation status
                method: 'POST',
                data: { email: email },
                success: function(response) {
                    if (response === 'activated') {
                        $('#status-message').css({
    'color': 'green',  // Change to your desired color
    'font-size': '20px' // Change to your desired font size
}).text('Your account has been activated! Redirecting to login...');

                        setTimeout(function() {
                            window.location.href = 'login.php'; // Redirect to login page
                            // window.location.href = 'activate.php'; 
                        }, 5000);
                    }
                }
            });
        }

        // Check activation status every 5 seconds
        setInterval(checkActivation, 5000);
    </script>
</body>
</html>
