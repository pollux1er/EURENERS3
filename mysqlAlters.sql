ALTER TABLE `empresa_procesos_producto_final` ADD FOREIGN KEY ( `producto_final` ) 
REFERENCES `eureners_cimanti`.`empresa_productos_final` (`identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION ;