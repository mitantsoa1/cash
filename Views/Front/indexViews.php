<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connecter</title>
    <link rel="stylesheet" href="Publics/css/style.css">
    <link rel="stylesheet" href="Publics/css/util.css">
    <link rel="stylesheet" href="Publics/css/indexViews.css">
    <link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
</head>
<body>
    <div class="container" id="contentIndex">
        <form action="" method="POST">
            <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group form-check">
                <select name="selectOperateur" id="selectOperateur">
                    <option value="1">Telma</option>
                    <option value="3">Airtel</option>
                    <option value="2">Orange</option> 
                </select>
            </div>
            <button  type="submit" class="btn btn-primary btn-block" name="btnIndex" id="btnIndex">Submit</button>
        </form>
    </div>
<div class="recep"></div>
    <script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.min.js"></script>
    <script src="Publics/js/indexViews.js"></script>
    <script src="Publics/js/main.js"></script>
</body>
</html>