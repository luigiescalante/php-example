<html>
    <head>
        <title>Ejemplo Data Table</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script src="general.js"></script>
        <script src="country.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Paises</h1>
            <div class="row well">
                <form id="frmCountry" name="frmCountry" method="Post" action="getcountry.php">
                    <div class="col-md-12">
                        <label>Nombre del Pais</label><br/>
                        <input type="text" name="name" value="" autocomplete="off">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Buscar" class="btn-primary">
                    </div>
                </form>
            </div>
            <table id="tblCountry" width="100%">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <tbody>

                </tbody>
                </thead>
            </table>
        </div>
    </body>
    <script>
        $("#frmCountry").submit(function (e) {
            e.preventDefault();
            tableInfo($("#tblCountry"), "getcountry.php", colCountry, $("#frmCountry"));
        });
    </script>
</html>