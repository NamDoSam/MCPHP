<!DOCTYPE html>
<html>
<head>
    <title>Votación de Empleados</title>
    <style>
        .employee {
            display: inline-block;
            text-align: center;
            margin: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        @media only screen and (max-width: 600px) {
            .employee {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <center><h1>Votación de Empleados</h1></center>
    <h3>Vote por la atención recibida en el dia de hoy, sepa que su opinion nos ayuda a mejorar la calidad de atención hacia nuestros clientes</h3>
    <form action="procesar_voto.php" method="post">
        <center><div class="employee">
            <label>
                <input type="radio" name="empleado" value="Carnicero 1"> <br>
                <img src="carnicero1.jpg" width="150" height="150" alt="Empleado 1"><br>
                Carnicero 1
            </label>
        </div>
        <div class="employee">
            <label>
                <input type="radio" name="empleado" value="Carnicero 2"> <br>
                <img src="carnicero2.jpg" width="150" height="150" alt="Empleado 2"><br>
                Carnicero 2
            </label>
        </div>
        <div class="employee">
            <label>
                <input type="radio" name="empleado" value="Cajera 3"> <br>
                <img src="cajera.jpg" width="150" height="150" alt="Empleado 3"><br>
                Cajera 3
            </label>
        </div>
        <div class="employee">
            <label>
                <input type="radio" name="empleado" value="Cajera 4"> <br>
                <img src="cajera2.jpg" width="150" height="150" alt="Empleado 4"><br>
                Cajera 4
            </label>
        </div></center>
        
        
        <center><p>Selecciona la atención recibida:</p>
        <input type="radio" name="voto" value="mala"> Mala
        <input type="radio" name="voto" value="buena"> Buena
        <input type="radio" name="voto" value="muybuena"> Muy Buena</center>
        
        <br><br>
        <center><input type="submit" value="Votar"></center>
    </form>
</body>
</html>