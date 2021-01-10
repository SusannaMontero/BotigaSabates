<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <script>
        //creo una funció per redireccionar a botigaDAO amb opcio = 1 i al switch executarà el case 1
        function ingresar() {
            location.href = "DAO/botigaDAO.php?opcio=1";
        }
    </script>
</head>

<!--només entrar a la web entra a l'index i automaticament cridem al mètode ingresar per començar a visualitzar el catàleg amb onload-->

<body onload="ingresar ()">

</body>

</html>