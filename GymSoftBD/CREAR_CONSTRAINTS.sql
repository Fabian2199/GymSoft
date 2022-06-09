


alter table PLANES 
add CONSTRAINT plan_pk_id PRIMARY KEY (id_plan)
;

alter table OTROS_SERVICIOS 
add CONSTRAINT servicio_pk_id PRIMARY KEY (id_servicio)
;

alter table EJERCICIOS 
add CONSTRAINT ejer_pk_id PRIMARY KEY (id_ejercicio)
;

alter table PERSONAS 
add CONSTRAINT per_pk_id PRIMARY KEY (id_persona)
;

alter table USUARIOS 
add CONSTRAINT user_pk_id PRIMARY KEY (id_user),
add CONSTRAINT per_fk_id FOREIGN KEY (id_persona) REFERENCES personas (id_persona)
;

alter table FACTURAS 
add CONSTRAINT fac_pk_id PRIMARY KEY (id_factura),
add CONSTRAINT admin_fk_id FOREIGN KEY (id_admin) REFERENCES usuarios (id_user),
add CONSTRAINT clt_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user)
;

alter table DETALLES_FAC 
add CONSTRAINT detfac_pk_id PRIMARY KEY (id_factura,id_plan),
add CONSTRAINT fac_fk_id FOREIGN KEY (id_factura) REFERENCES facturas (id_factura),
add CONSTRAINT plan_fk_id FOREIGN KEY (id_plan) REFERENCES planes (id_plan),
add CONSTRAINT servicio_fk_id FOREIGN KEY (id_servicio) REFERENCES otros_servicios (id_servicio)
;

alter table RUTINAS 
add CONSTRAINT entr_fk_id FOREIGN KEY (id_entrenador) REFERENCES usuarios (id_user),
add CONSTRAINT cltRut_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user),
add CONSTRAINT ejer_fk_id FOREIGN KEY (id_ejercicio) REFERENCES ejercicios (id_ejercicio)
;

alter table FICHA_ANTROPOMETRICA
add CONSTRAINT fh_pk_id PRIMARY KEY (id_ficha),
add CONSTRAINT cltFI_fk_id FOREIGN KEY (id_cliente) REFERENCES usuarios (id_user),
add CONSTRAINT entFI_fk_id FOREIGN KEY (id_entrenador) REFERENCES usuarios (id_user)
;





