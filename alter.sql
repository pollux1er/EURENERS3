ALTER TABLE `empresa_unidades_funcionales` ADD `proteinas` DECIMAL( 10, 5 ) NULL AFTER `emision_co2_eq` ,
ADD `grasas` DOUBLE( 10, 5 ) NULL AFTER `proteinas` ,
ADD `importe` DECIMAL( 10, 5 ) NULL AFTER `grasas` ;

