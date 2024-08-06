<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Settings - Credential</title>
    <link rel="stylesheet">
    <style>
        .container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 50px;
            display: flex;
            flex-wrap: wrap;
        }
        .section {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            width: 150px;
        }
        .form-group input,
        .form-group textarea {
            width: 50%;
            padding: 2px;
            box-sizing: border-box;
        }
        .form-group input[type="password"] {
            font-family: monospace;
        }
        .form-actions {
            text-align: center;
            clear: both;
        }
        .form-actions button {
            padding: 10px 20px;
            margin: 0 10px;
        }
        .form-group .checkbox-container {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="width: 48%; margin-right: 4%;">
            <div class="section">
        <h1>Settings - Credential</h1>
        <form id="settings" action="{{ route('settings.save') }}" method="POST">
            @csrf

            <div class="section">
                <div class="section-title">Information</div>
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" id="name" name="name" value="NAYSA Solutions, Inc." disabled>
                </div>
                <div class="form-group">
                    <label for="type">TYPE</label>
                    <input type="text" id="type" name="type" value="CAS" disabled>
                </div>
                <div class="form-group">
                    <label for="user_id">USER ID</label>
                    <input type="text" id="user_id" name="user_id">
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" id="password" name="password" value="123456">
                    <div class="checkbox-container">
                        <input type="checkbox" id="togglePassword">
                        <label for="togglePassword">Show</label>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Application Setting</div>
                <div class="form-group">
                    <label for="public_key">PUBLIC KEY</label>
                    <textarea id="public_key" name="public_key" rows="5">
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAteOyNBP4EcaR1QmlY7lJ
zkNr5tfbPp4a60oGEt5cB0ACAkuSDnOIT7KrHDPawtFfRqITzjo5t2UweSIzZdd2
Zakh1GLI081metOYgL0QpZ/5bJ6Z1tYiuOzab4kvYBiRZvqCYMN4UYvnMTo5FthX
dgHcpBE7E3wIRbJI5+ZP65uzEHL/Kwr5p1h2UWbO0zmm8FYPH5Wtk4KcX3ZHoJeO
cknxKJ0DuX2nic1CGtVHbIK5XXnCv01wjSSmBzOtpHJ1OfGhe2Poc0HhJ8LBN15U
kP8rDAGqJlITa/T+Anw9PMW2pXq/ceN+n8Zz84c3jvYdngfWB8LYq/jVWCj0nYWi
VAfOmBYi9Jig1LE7X+MfKZd+3tAoVn2IVt7JVuHj9SKD1ZDxfUUnhzfRiPfPk6Sn
ic9mkg7X4MI6mf57Ci6PXfERrRMXtJ7g2UrqcOfSD20ltVNd9QxnlGVZ3ALrIuGF
QiwRJ9GNHoF4mdieSP7FvYWLXbKi0sMIEWRLdJc8Wk1Dg+VzhM1/wdBttZfzgMT3
PSvQVx/hcHnDnxzx9Z2meHhaZP3seCms07UJFROcSOVHb+1B2/WwVJ0uCc5tXmRZ
kTXAtFjEw+iezF1l0VQ+Bm92U4f3V2TThRbHRL44eWroo0QF49xnhJrwMjcdGW8+
ggkUb2OVEDqxcWT8HHLRqdsCAwEAAQ==</textarea>
                </div>
                <div class="form-group">
                    <label for="private_key">PRIVATE KEY</label>
                    <textarea id="private_key" name="private_key" rows="5"></textarea>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Endpoint</div>
                <div class="form-group">
                    <label for="auth">AUTH</label>
                    <input type="text" id="auth" name="auth" value="http://localhost:8000/api/login">
                </div>
                <div class="form-group">
                    <label for="issuance">SEND</label>
                    <input type="text" id="issuance" name="issuance" value="http://localhost:8000/api/data">
                </div>
                <div class="form-group">
                    <label for="inquiry">RECEIVE</label>
                    <input type="text" id="inquiry" name="inquiry" value="http://localhost:8000/api/dataReceive/{id}">
                </div>
            </div>

            <div class="section">
                <div class="section-title">URI</div>
                <div class="form-group">
                    <label for="uri_auth">AUTH</label>
                    <input type="text" id="uri_auth" name="uri_auth" value="/api/login">
                </div>
                <div class="form-group">
                    <label for="uri_issuance">SEND</label>
                    <input type="text" id="uri_issuance" name="uri_issuance" value="/api/data">
                </div>
                <div class="form-group">
                    <label for="uri_inquiry">RECEIVE</label>
                    <input type="text" id="uri_inquiry" name="uri_inquiry" value="/api/dataReceive/{id}">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit">Save</button>
                <button type="reset">Clear</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('change', function () {
            var passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>