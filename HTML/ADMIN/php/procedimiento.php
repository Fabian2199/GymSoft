<?php

    //$query = "CALL PR_ACTUALIZAR_PLAN_FECHA_FIN(0)";
    $query = "UPDATE detalles_fac SET estado_plan = 1 WHERE fecha_fin < current_date; COMMIT;";
    $consulta = mysqli_query($conexion, $query);

    /*
    create or replace procedure PR_ACTUALIZAR_PLAN_FECHA_FIN() in
    begin
    update detalles_fac set estado_plan = 1
    WHERE fecha_fin < current_date;
    COMMIT;
    end PR_ACTUALIZAR_PLAN_FECHA_FIN;
    */
?>