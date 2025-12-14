<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Gesti-ndeCitas-BuffeteLegal/Model/ClientesModel.php';
    
    function ConsultarNacionalidad()
    {
        return ConsultarNacionalidadModel();
    }

    if(isset($_POST["btnRegistrarCliente"]))
    {
        $nacionalidad = $_POST["nacionalidad"];
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correoElectronico = $_POST["correoElectronico"];
        $telefono = $_POST['telefono'];
        $resultado = RegistrarClienteModel($nacionalidad, $cedula, $nombreCompleto, $correoElectronico, $telefono);

        if($resultado)
        {
            $_POST["MensajeExito"] = "Cliente registrado correctamente.";
            include_once '../../View/Clientes/ListadoClientes.php';
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido agregar el cliente." ;
        }
    }

    function ConsultarClientes()
    {
        return ConsultarClientesModel();
    }

    if(isset($_POST["btnEliminar"]))
    {
        $idCliente = $_POST["idCliente"];
        $resultado = EliminarClienteModel($idCliente);

        if($resultado)
        {
            $_POST["MensajeExito"] = "Cliente eliminado correctamente.";
            include_once '../../View/Clientes/ListadoClientes.php';
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido eliminar el cliente." ;
        }
    }
    
    function ConsultarClientesEliminados()
    {
        return ClientesEliminadosModel();
    }

    if(isset($_POST["btnActivar"]))
    {
        $idCliente = $_POST["idCliente"];
        $resultado = ActivarClienteModel($idCliente);

        if($resultado)
        {
            $_POST["MensajeExito"] = "Cliente activado correctamente.";
            include_once '../../View/Clientes/ListadoClientes.php';
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido activar el cliente." ;
        }
    }
    
    function ConsultarClientePorId($idCliente)
    {
        return ConsultarClientePorIdModel($idCliente);
    }
    
    if(isset($_POST["btnActualizarCliente"]))
    {
        $idCliente = $_POST["idCliente"];
        $correoElectronico = $_POST["correoElectronico"];
        $telefono = $_POST['telefono'];
        $resultado = ActualizarClienteModel($idCliente, $correoElectronico, $telefono);

        if($resultado)
        {
            $_POST["MensajeExito"] = "Cliente actualizado correctamente.";
            include_once '../../View/Clientes/ListadoClientes.php';
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido actualizar el cliente." ;
        }
    }
    
?>