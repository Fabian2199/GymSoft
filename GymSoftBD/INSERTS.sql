INSERT INTO `planes` (`id_plan`, `nombre_plan`, `Duracion`, `Valor`) VALUES 
('301', 'Plan Mensual', '1 Mes', '80000'), 
('302', 'Plan Trimestral', '3 Meses', '240000'), 
('303', 'Plan Semestral', '6 Meses', '480000'),
('304', 'Plan Anual', '12 Meses', '960000');

--- consultas
SELECT * FROM detalles_fac d JOIN facturas f on f.id_factura = d.id_factura JOIN usuarios u ON u.id_user = f.id_cliente JOIN personas p ON u.id_persona = p.id_persona;