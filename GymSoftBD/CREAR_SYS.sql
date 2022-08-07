

create table planes(
   id_plan		 INT	     not null,
   nombre_plan	 	VARCHAR(20)  not null,
   Duracion		VARCHAR(20)  not null,
   Valor		 INT	     not null		     
);

create table otros_servicios(
   id_servicio		 INT	     not null,
   nombre_servicio	VARCHAR(20)  not null,
   Duracion		VARCHAR(20)  not null,
   Valor		 INT	     not null		     
);

create table ejercicios(
   id_ejercicio		 INT	     not null,
   nombre_ejercicio	VARCHAR(20)  not null,
   descripcion		TEXT         not null,
   imagen		VARCHAR(20)  not null,
   video		VARCHAR(80)	     		     
);

create table personas(
   id_persona		 BIGINT	     not null,
   nombres		VARCHAR(50)  not null,
   apellidos		VARCHAR(50)  not null,
   foto			VARCHAR(50)	     ,
   email		VARCHAR(50)	     ,
   celular		 BIGINT	     not null,
   fecha_nac		DATE	     not null   
);

create table usuarios(
   id_user		VARCHAR(50)  not null,
   id_persona		 BIGINT	     not null,
   tipo_user	 	VARCHAR(20)  not null,
   contrasena		VARCHAR(100)  not null,
   estado		 INT	     not null		     
);

create table facturas(
   id_factura		 INT	     not null,
   fecha_fac		DATE     not null,
   id_admin		VARCHAR(50)     not null,
   id_cliente		 VARCHAR(50)	     not null		     
);

create table detalles_fac(
   id_plan		 INT	     not null,
   id_factura		 INT	     not null,
   id_servicio		 INT	     not null,
   estado_plan		 INT	     not null,
   fecha_ini		DATE     not null,
   fecha_fin		DATE    not null	     
);

create table rutinas(
   id_entrenador	 VARCHAR(50)	     not null,
   id_cliente		 VARCHAR(50)     not null,
   id_ejercicio		 INT	     not null,
   dia			VARCHAR(20)  not null,
   n_series		 INT	     not null,
   n_rep 		 INT	     not null	     
);

create table ficha_antropometrica(
   id_ficha		 INT	     not null,
   id_entrenador	 VARCHAR(50)	     not null,
   id_cliente		 VARCHAR(50)	     not null,
   fecha		DATE     not null,
   edad			 FLOAT         not null,
   peso			 FLOAT         not null,
   estatura		 FLOAT         not null,
   cuello		 FLOAT         not null,
   hombro		 FLOAT         not null,
   pecho		 FLOAT         not null,
   espalda		 FLOAT         not null,
   br_izq		 FLOAT         not null,
   br_der		 FLOAT         not null,
   ant_izq		 FLOAT         not null,
   ant_der		 FLOAT         not null,
   cintura 		 FLOAT         not null,
   abdomen		 FLOAT         not null,
   cadera		 FLOAT         not null,
   pr_izq		 FLOAT         not null,
   pr_der		 FLOAT         not null,
   pnt_izq 	 	 FLOAT         not null,
   pnt_der		 FLOAT         not null,
   por_grasa	 	 FLOAT         not null,
   valor_tension	 FLOAT         not null,
   pulso		 FLOAT         not null,
   adipo_tri	 	 FLOAT         not null,
   adipo_abdo	 	 FLOAT         not null,
   adipo_supra	 	 FLOAT         not null,
   adipo_sube	 	 FLOAT         not null,
   t_cuerpo	 	VARCHAR(20)  not null,
   imc	   	 	 FLOAT         not null,
   embarazo		BOOLEAN	     not null,
   cardiaco		BOOLEAN	     not null,
   hipoglisemia		BOOLEAN	     not null,
   alergias		BOOLEAN	     not null,
   migrana		BOOLEAN	     not null,
   asma			BOOLEAN	     not null,
   les_osea		BOOLEAN	     not null,
   les_musc		BOOLEAN	     not null,
   tens_arterial	BOOLEAN	     not null,
   colesterol		BOOLEAN	     not null,
   trigliceridos	BOOLEAN	     not null,
   observaciones	VARCHAR(60)  not null
	     
);

alter table planes 
add CONSTRAINT plan_pk_id PRIMARY KEY (id_plan)
;

alter table otros_servicios 
add CONSTRAINT servicio_pk_id PRIMARY KEY (id_servicio)
;

alter table ejercicios
add CONSTRAINT ejer_pk_id PRIMARY KEY (id_ejercicio)
;

alter table personas
add CONSTRAINT per_pk_id PRIMARY KEY (id_persona)
;

alter table usuarios
add CONSTRAINT user_pk_id PRIMARY KEY (id_user),
add CONSTRAINT per_fk_id FOREIGN KEY (id_persona) REFERENCES personas (id_persona)
;

alter table facturas 
add CONSTRAINT fac_pk_id PRIMARY KEY (id_factura),
add CONSTRAINT admin_fk_id FOREIGN KEY (id_admin) REFERENCES usuarios (id_user),
add CONSTRAINT clt_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user)
;

alter table detalles_fac 
add CONSTRAINT detfac_pk_id PRIMARY KEY (id_factura,id_plan),
add CONSTRAINT fac_fk_id FOREIGN KEY (id_factura) REFERENCES facturas (id_factura),
add CONSTRAINT plan_fk_id FOREIGN KEY (id_plan) REFERENCES planes (id_plan),
add CONSTRAINT servicio_fk_id FOREIGN KEY (id_servicio) REFERENCES otros_servicios (id_servicio)
;

alter table rutinas 
add CONSTRAINT entr_fk_id FOREIGN KEY (id_entrenador) REFERENCES usuarios (id_user),
add CONSTRAINT cltRut_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user),
add CONSTRAINT ejer_fk_id FOREIGN KEY (id_ejercicio) REFERENCES ejercicios (id_ejercicio)
;

alter table ficha_antropometrica
add CONSTRAINT fh_pk_id PRIMARY KEY (id_ficha),
add CONSTRAINT cltFI_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user),
add CONSTRAINT entFI_fk_id FOREIGN KEY (id_entrenador) REFERENCES usuarios (id_user)
;

INSERT INTO `personas` (`id_persona`, `nombres`, `apellidos`, `foto`, `email`, `celular`, `fecha_nac`) VALUES ('1010136222', 'Neyder Fabian', 'Rodríguez Velasco', 'foto_00.jpg', 'neyder.rodriguez@uptc.edu.co', '3208608714', '1999-12-20');

INSERT INTO `usuarios` (`id_user`, `id_persona`, `tipo_user`, `contrasena`, `estado`) VALUES ('adm1010136222', '1010136222', 'administrador', '1145a30ff80745b56fb0cecf65305017', '0');

INSERT INTO `planes` (`id_plan`, `nombre_plan`, `Duracion`, `Valor`) VALUES 
('301', 'Plan Mensual', '1 Mes', '80000'), 
('302', 'Plan Trimestral', '3 Meses', '240000'), 
('303', 'Plan Semestral', '6 Meses', '480000'),
('304', 'Plan Anual', '12 Meses', '960000');

INSERT INTO `otros_servicios` (`id_servicio`, `nombre_servicio`, `Duracion`, `Valor`) VALUES 
('401', 'inscripción', '1 añö', '80000'), 
('402', 'N/A', '0', '0');

