<?php





/*
DELIMITER //

CREATE TRIGGER before_insert_transacciones
BEFORE INSERT ON transacciones
FOR EACH ROW
BEGIN
    UPDATE cuentas SET monto = monto - NEW.monto WHERE numCue = NEW.cueEnv;
    UPDATE cuentas SET monto = monto + NEW.monto WHERE numCue = NEW.cueRec;
END;
//

DELIMITER ;

*/
?>