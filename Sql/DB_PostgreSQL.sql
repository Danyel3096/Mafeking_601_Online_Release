CREATE TYPE tipo_genero AS ENUM('Femenino', 'Masculino');
CREATE TYPE tipo_estrato AS ENUM('1', '2', '3', '4', '5', '6');
CREATE TABLE Acudientes (
	Id SERIAL NOT NULL UNIQUE,
	Numero_cedula BIGINT NOT NULL UNIQUE,
	Nombres VARCHAR(50) NOT NULL,
	Apellidos VARCHAR(50) NOT NULL,
	Genero tipo_genero NOT NULL,
	Parentesco VARCHAR(50) NOT NULL,
	Direccion VARCHAR(50) NOT NULL,
	Celular BIGINT NOT NULL UNIQUE,
	Telefono BIGINT,
	Barrio VARCHAR(50) NOT NULL,
	Estrato tipo_estrato NOT NULL,
	EPS VARCHAR(50) NOT NULL,
	Ocupacion VARCHAR(50) NOT NULL,
	Empresa VARCHAR(50) NOT NULL,
	Profesion VARCHAR(50) NOT NULL,
	Correo VARCHAR(50) NOT NULL UNIQUE,
	CONSTRAINT PK_Acudiente PRIMARY KEY(Id),
	Id_municipio INTEGER NOT NULL
);

CREATE TABLE Almacen (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Valor_unidad INTEGER NOT NULL,
	Cantidad_vendida INTEGER NOT NULL,
	Cantidad_disponible INTEGER NOT NULL,
	CONSTRAINT PK_Almacen PRIMARY KEY(Id)
);

CREATE TABLE Cargos (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Descripcion VARCHAR(255),
	CONSTRAINT PK_Cargo PRIMARY KEY(Id)
);

CREATE TYPE tipo_sector AS ENUM('Público', 'Privado', 'No aplica');
CREATE TABLE Centros_educativos (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Sede VARCHAR(50) NOT NULL,
	Sector tipo_sector NOT NULL,
	CONSTRAINT PK_CentroEducativo PRIMARY KEY(Id)
);

CREATE TABLE Comentarios (
	Id SERIAL NOT NULL UNIQUE,
	Texto TEXT NOT NULL,
	Fecha DATE NOT NULL,
	Hora TIME NOT NULL,
	CONSTRAINT PK_Comentario PRIMARY KEY(Id),
	Id_noticia INTEGER NOT NULL,
	Id_persona INTEGER NOT NULL
);

CREATE TABLE Departamentos (
  Id SERIAL NOT NULL UNIQUE,
  Nombre VARCHAR(50) NOT NULL,
  CONSTRAINT PK_Departamento PRIMARY KEY(Id)
);

CREATE TABLE Ejes (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Eje PRIMARY KEY(Id),
	Id_progresion INTEGER NOT NULL
);

CREATE TABLE Equipos (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Equipos PRIMARY KEY(Id),
	Id_rama INTEGER NOT NULL
);

CREATE TABLE Especialidades (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Insignia VARCHAR(100),
	CONSTRAINT PK_Especialidad PRIMARY KEY(Id),
	Id_eje INTEGER NOT NULL
);

CREATE TABLE Etiquetas (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Etiqueta PRIMARY KEY(Id)
);

CREATE TABLE Eventos (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Insignia VARCHAR(50),
	Fecha_inicio timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone NOT NULL,
	Fecha_fin timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone,
	Tipo VARCHAR(50) NOT NULL,
	Sitio VARCHAR(50) NOT NULL,
	Fecha_encuentro DATE,
	Hora_encuentro TIME NOT NULL,
	Punto_encuentro VARCHAR(50),
	Costo BIGINT,
	Ficha VARCHAR(50),
	Color VARCHAR(50) NOT NULL,
	Color_texto VARCHAR(50) NOT NULL,
	CONSTRAINT PK_Evento PRIMARY KEY(Id),
	Id_rama INTEGER NOT NULL
);

CREATE TYPE tipo_grupo_sanguineo AS ENUM('A', 'O', 'AB');
CREATE TYPE tipo_factor_rh AS ENUM('Negativo', 'Positivo');
CREATE TABLE Fichas_medicas (
	Id INTEGER NOT NULL,
	EPS VARCHAR(50) NOT NULL,
	Grupo_sanguineo tipo_grupo_sanguineo NOT NULL,
	Factor_Rh tipo_factor_rh NOT NULL,
	Medicamentos VARCHAR(255),
	Prescripciones VARCHAR(255),
	Alergias VARCHAR(255),
	Enfermedades VARCHAR(255),
	Tetanos BOOLEAN NOT NULL,
	Triple_viral BOOLEAN NOT NULL,
	Varicela BOOLEAN NOT NULL,
	Influenza BOOLEAN NOT NULL,
	Rubeola_Sarampion BOOLEAN NOT NULL,
	Fiebre_amarilla BOOLEAN NOT NULL,
	Hepatitis_B BOOLEAN NOT NULL,
	Papiloma_humano BOOLEAN NOT NULL,
	Meningitis_A BOOLEAN NOT NULL,
	Parotiditis BOOLEAN NOT NULL,
	Neumococos BOOLEAN NOT NULL,
	Poliomielitis BOOLEAN NOT NULL,
	Dieta VARCHAR(255),
	Discapacidades VARCHAR(255),
	Cirugias VARCHAR(255),
	Tratamientos VARCHAR(255),
	Informacion_adicional VARCHAR(255),
	CONSTRAINT PK_FichaMedica PRIMARY KEY(Id)
);

CREATE TYPE tipo_estado_civil AS ENUM('Soltero(a)', 'Prometido(a)', 'Casado(a)', 'Divorciado(a)');
CREATE TYPE tipo_religion AS ENUM('Ninguna', 'Católica', 'Evangelica', 'Testigos de Jehová', 'Otra');
CREATE TYPE tipo_nivel_educativo AS ENUM('Ninguno', 'Primaria', 'Bachillerato', 'Técnica', 'Tecnología', 'Pregrado');
CREATE TYPE tipo_curso AS ENUM('1ro', '2do', '3ro', '4to', '5to', '6to', '7mo', '8vo', '9no', '10mo', '11vo', '12vo');
CREATE TABLE Hojas_vida (
	Id INTEGER NOT NULL,
	Foto VARCHAR(50),
	Fondo VARCHAR(50),
	Fecha_ingreso DATE NOT NULL,
	Estado_civil tipo_estado_civil NOT NULL,
	Religion tipo_religion,
	Nivel_educativo tipo_nivel_educativo NOT NULL,
	Curso tipo_curso,
	Carrera VARCHAR(50),
	Actividad_cultural VARCHAR(50),
	Actividad_deportiva VARCHAR(50),
	Asignatura_favorita VARCHAR(50),
	Comida_favorita VARCHAR(50),
	Musica_favorita VARCHAR(50),
	Grupo_anterior VARCHAR(50),
	Proyecto_vida VARCHAR(50),
	Permiso_salidas VARCHAR(50),
	Licencia VARCHAR(50),
	Fecha_salida DATE,
	Fecha_reingreso DATE,
	CONSTRAINT PK_HojaVida PRIMARY KEY(Id)
);

CREATE TYPE tipo_estado_intendencia AS ENUM('Bueno', 'Malo');
CREATE TABLE Intendencia (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Cantidad INTEGER NOT NULL,
	Fecha_recibido DATE,
	Estado tipo_estado_intendencia NOT NULL,
	CONSTRAINT PK_Intendencia PRIMARY KEY(Id),
	Id_equipo INTEGER NOT NULL
);

CREATE TABLE Municipios (
  Id SERIAL NOT NULL UNIQUE,
  Nombre VARCHAR(50) NOT NULL,
  CONSTRAINT PK_Municipio PRIMARY KEY(Id),
  Id_departamento INTEGER NOT NULL
);

CREATE TYPE tipo_estado_noticia AS ENUM('Publicada', 'Sin publicar');
CREATE TABLE Noticias (
	Id SERIAL NOT NULL UNIQUE,
	Titulo VARCHAR(50) NOT NULL UNIQUE,
	Imagen VARCHAR(50),
	Texto TEXT NOT NULL,
	Fecha DATE NOT NULL,
	Hora TIME NOT NULL,
	Url VARCHAR(50) NOT NULL UNIQUE,
	Estado tipo_estado_noticia NOT NULL,
	CONSTRAINT PK_Noticia PRIMARY KEY(Id),
	Id_persona INTEGER NOT NULL
);

CREATE TABLE Organigrama (
	Id SERIAL NOT NULL UNIQUE,
	Nombres_apellidos VARCHAR(100) NOT NULL,
	Totem VARCHAR(50),
	Celular BIGINT,
	CONSTRAINT PK_Organigrama PRIMARY KEY(Id),
	Id_cargo INTEGER NOT NULL
);

CREATE TABLE Participaciones (
	Id SERIAL NOT NULL UNIQUE,
	Url VARCHAR(255),
	Creditos_url VARCHAR(255) NOT NULL,
	Pie_url VARCHAR(255),
	Fecha_inicio DATE NOT NULL,
	Fecha_fin DATE,
	Titulo_evento VARCHAR(50) NOT NULL,
	Resumen_evento TEXT NOT NULL,
	CONSTRAINT PK_Participacion PRIMARY KEY(Id),
	Id_rama INTEGER NOT NULL
);

CREATE TYPE tipo_tipo_documento AS ENUM('Tarjeta de identidad', 'Cédula de ciudadanía');
CREATE TYPE tipo_genero_persona AS ENUM('Femenino', 'Masculino');
CREATE TYPE tipo_estrato_persona AS ENUM('1', '2', '3', '4', '5', '6');
CREATE TYPE tipo_investidura AS ENUM('Sí', 'No');
CREATE TYPE tipo_estado_persona AS ENUM('Activo', 'Inactivo');
CREATE TABLE Personas (
	Id SERIAL NOT NULL UNIQUE,
	Tipo_documento tipo_tipo_documento NOT NULL,
	Numero_documento BIGINT NOT NULL UNIQUE,
	Genero tipo_genero_persona NOT NULL,
	Nombres VARCHAR(50) NOT NULL,
	Apellidos VARCHAR(50) NOT NULL,
	Fecha_nacimiento DATE NOT NULL,
	Celular BIGINT NOT NULL UNIQUE,
	Telefono BIGINT,
	Direccion VARCHAR(50) NOT NULL,
	Barrio VARCHAR(50) NOT NULL,
	Estrato tipo_estrato_persona NOT NULL,
	Investidura tipo_investidura NOT NULL,
	Totem VARCHAR(50),
	Correo VARCHAR(50) NOT NULL UNIQUE,
	Clave VARCHAR(255) NOT NULL,
	Estado tipo_estado_persona NOT NULL,
	Fecha_actividad timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone NOT NULL,
	Fecha_registro timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone NOT NULL,
	CONSTRAINT PK_Persona PRIMARY KEY(Id),
	Id_municipio INTEGER NOT NULL,
	Id_centro_educativo INTEGER NOT NULL
);

CREATE TABLE Progresiones (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Descripcion VARCHAR(255),
	CONSTRAINT PK_Progresion PRIMARY KEY(Id),
	Id_rama INTEGER NOT NULL
);

CREATE TABLE Ramas (
	Id SERIAL NOT NULL UNIQUE,
	Nombre VARCHAR(50) NOT NULL,
	Imagen VARCHAR(50) NOT NULL,
	Lineamiento VARCHAR(50) NOT NULL,
	Foto_historica VARCHAR(50) NOT NULL,
	Historia TEXT NOT NULL,
	Ley TEXT NOT NULL,
	Promesa TEXT NOT NULL,
	Lema TEXT NOT NULL,
	Oracion TEXT NOT NULL,
	CONSTRAINT PK_Rama PRIMARY KEY(Id)
);

CREATE TABLE Requisitos (
	Id SERIAL NOT NULL UNIQUE,
	Texto VARCHAR(255) NOT NULL,
	CONSTRAINT PK_Requisito PRIMARY KEY(Id, Id_especialidad),
	Id_especialidad INTEGER NOT NULL
);

CREATE TYPE tipo_periodicidad_tesoreria AS ENUM('Anual', 'Mensual', 'Evento', 'Ocasional');
CREATE TABLE Tesoreria (
	Id SERIAL NOT NULL UNIQUE,
	Detalle VARCHAR(50) NOT NULL,
	Fecha_inicio DATE NOT NULL,
	Fecha_fin DATE NOT NULL,
	Valor BIGINT NOT NULL,
	Periodicidad tipo_periodicidad_tesoreria NOT NULL,
	CONSTRAINT PK_Tesoreria PRIMARY KEY(Id)
);

ALTER TABLE Acudientes ADD CONSTRAINT FK_Acudiente_Municipio FOREIGN KEY (Id_municipio) REFERENCES Municipios(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Comentarios ADD CONSTRAINT FK_Comentario_Noticia FOREIGN KEY(Id_noticia) REFERENCES Noticias(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Ejes ADD CONSTRAINT FK_Eje_Progresion FOREIGN KEY(Id_progresion) REFERENCES Progresiones(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Equipos ADD CONSTRAINT FK_Equipo_Rama FOREIGN KEY(Id_rama) REFERENCES Ramas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Especialidades ADD CONSTRAINT FK_Especialidad_Eje FOREIGN KEY(Id_eje) REFERENCES Ejes(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Eventos ADD CONSTRAINT FK_Evento_Rama FOREIGN KEY(Id_rama) REFERENCES Ramas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Fichas_medicas ADD CONSTRAINT FK_FichaMedica_Persona FOREIGN KEY(Id) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Hojas_vida ADD CONSTRAINT FK_HojaVida_Persona FOREIGN KEY(Id) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Intendencia ADD CONSTRAINT FK_Intendencia_Equipo FOREIGN KEY(Id_equipo) REFERENCES Equipos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Municipios ADD CONSTRAINT FK_Municipio_Departamento FOREIGN KEY(Id_departamento) REFERENCES Departamentos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Noticias ADD CONSTRAINT FK_Noticia_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Organigrama ADD CONSTRAINT FK_Organigrama_Cargos FOREIGN KEY(Id_cargo) REFERENCES Cargos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Participaciones ADD CONSTRAINT FK_Participacion_Rama FOREIGN KEY(Id_rama) REFERENCES Ramas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Personas ADD CONSTRAINT FK_Persona_Municipio FOREIGN KEY (Id_municipio) REFERENCES Municipios(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Personas ADD CONSTRAINT FK_Persona_CentroEducativo FOREIGN KEY (Id_centro_educativo) REFERENCES Centros_educativos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Progresiones ADD CONSTRAINT FK_Progresion_Rama FOREIGN KEY(Id_rama) REFERENCES Ramas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Requisitos ADD CONSTRAINT FK_Requisito_Especialidad FOREIGN KEY(Id_especialidad) REFERENCES Especialidades(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Detalle_cargos (
	Id_persona INTEGER NOT NULL,
	Id_cargo INTEGER NOT NULL,
	Id_equipo INTEGER NOT NULL,
	CONSTRAINT PK_DetalleCargo PRIMARY KEY(Id_persona, Id_cargo, Id_equipo)
);

ALTER TABLE Detalle_cargos ADD CONSTRAINT FK_DetalleCargo_Persona FOREIGN KEY (Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_cargos ADD CONSTRAINT FK_DetalleCargo_Cargo FOREIGN KEY(Id_cargo) REFERENCES Cargos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_cargos ADD CONSTRAINT FK_DetalleCargo_Equipo FOREIGN KEY(Id_equipo) REFERENCES Equipos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Detalle_etiquetas (
	Id_etiqueta INTEGER NOT NULL,
	Id_noticia INTEGER NOT NULL,
	CONSTRAINT PK_DetalleEtiqueta PRIMARY KEY(Id_etiqueta, Id_noticia)
);

ALTER TABLE Detalle_etiquetas ADD CONSTRAINT FK_DetalleEtiqueta_Etiqueta FOREIGN KEY(Id_etiqueta) REFERENCES Etiquetas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_etiquetas ADD CONSTRAINT FK_DetalleEtiqueta_Noticia FOREIGN KEY(Id_noticia) REFERENCES Noticias(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Detalle_intendencia (
	Id_intendencia INTEGER NOT NULL,
	Id_evento INTEGER NOT NULL,
	CONSTRAINT PK_DetalleIntendencia PRIMARY KEY(Id_intendencia, Id_evento)
);

ALTER TABLE Detalle_intendencia ADD CONSTRAINT FK_DetalleIntendencia_Intendencia FOREIGN KEY(Id_intendencia) REFERENCES Intendencia(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_intendencia ADD CONSTRAINT FK_DetalleIntendencia_Evento FOREIGN KEY(Id_evento) REFERENCES Eventos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TYPE tipo_respuesta_detalle_participaciones AS ENUM('No', 'Sí');
CREATE TABLE Detalle_participantes (
	Id_persona INTEGER NOT NULL,
	Id_evento INTEGER NOT NULL,
	Respuesta tipo_respuesta_detalle_participaciones NOT NULL,
	CONSTRAINT PK_DetalleParticipantes PRIMARY KEY(Id_persona, Id_evento)
);

ALTER TABLE Detalle_participantes ADD CONSTRAINT FK_DetalleParticipacion_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_participantes ADD CONSTRAINT FK_DetalleParticipacion_Evento FOREIGN KEY(Id_evento) REFERENCES Eventos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Detalle_progresiones (
	Id_requisito INTEGER NOT NULL,
	Id_especialidad INTEGER NOT NULL,
	Id_persona INTEGER NOT NULL,
	Estado BOOLEAN NOT NULL,
	CONSTRAINT PK_DetalleProgresion PRIMARY KEY(Id_requisito, Id_especialidad, Id_persona)
);

ALTER TABLE Detalle_progresiones ADD CONSTRAINT FK_DetalleProgresion_Requisito FOREIGN KEY(Id_requisito) REFERENCES Requisitos(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_progresiones ADD CONSTRAINT FK_DetalleProgresion_RequisitoEspecialidad FOREIGN KEY(Id_especialidad) REFERENCES Especialidades(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_progresiones ADD CONSTRAINT FK_DetalleProgresion_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;


CREATE TABLE Detalle_responsables (
	Id_persona INTEGER NOT NULL,
	Id_acudiente INTEGER NOT NULL,
	CONSTRAINT PK_DetalleResponsable PRIMARY KEY(Id_persona, Id_acudiente)
);

ALTER TABLE Detalle_responsables ADD CONSTRAINT FK_DetalleResponsable_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_responsables ADD CONSTRAINT FK_DetalleResponsable_Acudiente FOREIGN KEY(Id_acudiente) REFERENCES Acudientes(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Detalle_tesoreria (
	Id_persona INTEGER NOT NULL,
	Id_tesoreria INTEGER NOT NULL,
	Abono INTEGER NOT NULL,
	CONSTRAINT PK_DetalleTesoreria PRIMARY KEY(Id_persona, Id_tesoreria)
);

ALTER TABLE Detalle_tesoreria ADD CONSTRAINT FK_DetalleTesoreria_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE Detalle_tesoreria ADD CONSTRAINT FK_DetalleTesoreria_Tesoreria FOREIGN KEY(Id_tesoreria) REFERENCES Tesoreria(Id) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE Control_cambios (
	Id SERIAL NOT NULL UNIQUE,
	Id_persona INTEGER NOT NULL,
	Nombre_completo VARCHAR(255) NOT NULL,
	Fecha_hora timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone NOT NULL,
	Cambio VARCHAR(255) NOT NULL,
	CONSTRAINT PK_Control PRIMARY KEY(Id),
	Nombre_tabla VARCHAR(255),
	Nombre_columna VARCHAR(255),
	Id_fila INT
);

CREATE TABLE Recupera_claves (
	Id SERIAL NOT NULL UNIQUE,
	Id_persona INTEGER NOT NULL,
	Url_secreta VARCHAR(255) NOT NULL,
	Fecha timestamp without time zone DEFAULT ('now'::text)::timestamp(6) with time zone NOT NULL,
	CONSTRAINT PK_RecuperaClaves PRIMARY KEY(Id)
);

ALTER TABLE Recupera_claves ADD CONSTRAINT FK_RecuperaClave_Persona FOREIGN KEY(Id_persona) REFERENCES Personas(Id) ON UPDATE CASCADE ON DELETE RESTRICT;