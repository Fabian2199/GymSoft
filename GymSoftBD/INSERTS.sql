INSERT INTO `planes` (`id_plan`, `nombre_plan`, `Duracion`, `Valor`) VALUES 
('301', 'Plan Mensual', '1 Mes', '80000'), 
('302', 'Plan Trimestral', '3 Meses', '240000'), 
('303', 'Plan Semestral', '6 Meses', '480000'),
('304', 'Plan Anual', '12 Meses', '960000');

INSERT INTO `otros_servicios` (`id_servicio`, `nombre_servicio`, `Duracion`, `Valor`) VALUES 
('401', 'inscripción', '1 añö', '80000'), 
('402', 'N/A', '0', '0');


---rutinas
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Lunes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Martes', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Miercoles', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Miercoles', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Jueves', '4', '12');
INSERT INTO `rutinas` (`id_entrenador`, `id_cliente`, `id_ejercicio`, `dia`, `n_series`, `n_rep`) VALUES ('ent40037079', 'clt1010136222', '101', 'Viernes', '4', '12');

---prueba factura
INSERT INTO `facturas` (`id_factura`, `fecha_nac`, `id_admin`, `id_cliente`) VALUES ('701', '2022-06-27', 'adm1010136222', 'clt1010136222');

--- consultas
SELECT * FROM detalles_fac d JOIN facturas f on f.id_factura = d.id_factura JOIN usuarios u ON u.id_user = f.id_cliente JOIN personas p ON u.id_persona = p.id_persona;
SELECT r.dia,e.nombre_ejercicio,r.n_series,r.n_rep FROM rutinas r JOIN usuarios u ON r.id_cliente = u.id_user JOIN personas p ON p.id_persona = u.id_persona JOIN ejercicios e ON e.id_ejercicio = r.id_ejercicio WHERE p.id_persona = 1010136222
SELECT * FROM personas p JOIN usuarios u ON p.id_persona = u.id_persona JOIN facturas f ON f.id_cliente = u.id_user JOIN detalles_fac d ON d.id_factura = f.id_factura WHERE f.fecha_nac = 

SELECT MAX(f.fecha_nac) FROM facturas f JOIN usuarios u ON f.id_cliente = u.id_user JOIN personas p ON u.id_persona = p.id_persona WHERE p.id_persona = 1010136222