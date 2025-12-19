<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/JurisTime/Model/MateriasModel.php';
    
    if(isset($_POST["btnAgregarMateria"]))
    {
        $nombreMateria = $_POST["nombreMateria"];
        $resultado = AgregarMateriaModel($nombreMateria);

        if($resultado)
        {
            header("Location: ../../View/Administrativo/Materias.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido agregar la materia.";
        }
    }

    function ConsultarMaterias()
    {
        return ConsultarMateriasModel();
    }

    if(isset($_POST["btnActualizarMateria"]))
    {
        $idMateria = $_POST["idMateriaEditar"];
        $nombreMateria = $_POST["nombreMateriaEditar"];
        $resultado = ActualizarMateriaModel($idMateria, $nombreMateria);

        if($resultado)
        {
            header("Location: ../../View/Administrativo/Materias.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido agregar la materia.";
        }
    }
?>