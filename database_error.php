<!DOCTYPE html>
<html>
<head>
    <title>Pump Palace</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <header><h1>Pump Palace</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>MySQL must be running as described in chapter 1.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pump Palace</p>
    </footer>
</body>
</html>