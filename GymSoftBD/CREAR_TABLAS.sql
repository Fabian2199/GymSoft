

create table PLANES(
   id_plan		 INT	     not null,
   nombre_plan	 	VARCHAR(20)  not null,
   Duracion		VARCHAR(20)  not null,
   Valor		 INT	     not null		     
);

create table OTROS_SERVICIOS(
   id_servicio		 INT	     not null,
   nombre_servicio	VARCHAR(20)  not null,
   Duracion		VARCHAR(20)  not null,
   Valor		 INT	     not null		     
);

create table EJERCICIOS(
   id_ejercicio		 INT	     not null,
   nombre_ejercicio	VARCHAR(20)  not null,
   descripcion		TEXT         not null,
   imagen		VARCHAR(20)  not null,
   video		VARCHAR(80)	     		     
);

create table PERSONAS(
   id_persona		 BIGINT	     not null,
   nombres		VARCHAR(50)  not null,
   apellidos		VARCHAR(50)  not null,
   foto			VARCHAR(50)	     ,
   email		VARCHAR(50)	     ,
   celular		 BIGINT	     not null,
   fecha_nac		DATE	     not null   
);

create table USUARIOS(
   id_user		VARCHAR(50)  not null,
   id_persona		 BIGINT	     not null,
   tipo_user	 	VARCHAR(20)  not null,
   contrasena		VARCHAR(20)  not null,
   estado		 INT	     not null		     
);

create table FACTURAS(
   id_factura		 INT	     not null,
   fecha_fac		DATE     not null,
   id_admin		VARCHAR(50)     not null,
   id_cliente		 VARCHAR(50)	     not null		     
);

create table DETALLES_FAC(
   id_plan		 INT	     not null,
   id_factura		 INT	     not null,
   id_servicio		 INT	     not null,
   estado_plan		 INT	     not null,
   fecha_ini		DATETIME     not null,
   fecha_fin		DATETIME     not null	     
);

create table RUTINAS(
   id_entrenador	 VARCHAR(50)	     not null,
   id_cliente		 VARCHAR(50)     not null,
   id_ejercicio		 INT	     not null,
   dia			VARCHAR(20)  not null,
   n_series		 INT	     not null,
   n_rep 		 INT	     not null	     
);

create table FICHA_ANTROPOMETRICA(
   id_ficha		 INT	     not null,
   id_entrenador	 VARCHAR(50)	     not null,
   id_cliente		 VARCHAR(50)	     not null,
   fecha		DATETIME     not null,
   edad			 INT         not null,
   peso			 INT         not null,
   estatura		 INT         not null,
   cuello		 INT         not null,
   hombro		 INT         not null,
   pecho		 INT         not null,
   espalda		 INT         not null,
   br_izq		 INT         not null,
   br_der		 INT         not null,
   ant_izq		 INT         not null,
   ant_der		 INT         not null,
   cintura 		 INT         not null,
   abdomen		 INT         not null,
   cadera		 INT         not null,
   pr_izq		 INT         not null,
   pr_der		 INT         not null,
   pnt_izq 	 	 INT         not null,
   pnt_der		 INT         not null,
   por_grasa	 	 INT         not null,
   valor_tension	 INT         not null,
   pulso		 INT         not null,
   adipo_tri	 	 INT         not null,
   adipo_abdo	 	 INT         not null,
   adipo_supra	 	 INT         not null,
   adipo_sube	 	 INT         not null,
   t_cuerpo	 	VARCHAR(20)  not null,
   imc	   	 	 INT         not null,
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