<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kode OTP Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .container {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #8FA6C9;
            margin: 0;
        }

        .otp-box {
            background: #8FA6C9;
            color: white;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 8px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .info {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            color: #666;
            font-size: 12px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Pengaduan Masyarakat</h1>
            <p>Reset Password</p>
        </div>

        <p>Halo,</p>

        <p>Anda telah meminta untuk mereset password akun Anda. Gunakan kode OTP berikut untuk melanjutkan:</p>

        <div class="otp-box">
            {{ $otp }}
        </div>

        <div class="info">
            <strong>⚠️ Penting:</strong>
            <ul>
                <li>Kode ini berlaku selama <strong>10 menit</strong></li>
                <li>Jangan bagikan kode ini kepada siapapun</li>
                <li>Jika Anda tidak meminta reset password, abaikan email ini</li>
            </ul>
        </div>

        <p>Terima kasih,<br>Tim Pengaduan Masyarakat</p>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>

</html>