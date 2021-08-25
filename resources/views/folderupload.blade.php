<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder Upload</title>
    <style>
        html, body {
            height: 100%;
        }
        body {
            margin: 0;
        }
        .container {
            height: 100%;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            width: 500px;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="folder_upload[]" directory webkitdirectory multiple>
                <input type="submit" value="Upload">
            </form>
        </div>
    </div>
</body>
</html>