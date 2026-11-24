# Plan de Desarrollo MVC — Arrendadora de Autos "Machine Line"

Este documento define la arquitectura **Modelo-Vista-Controlador (MVC)** siguiendo exactamente la estructura de carpetas de tu repositorio (`ProyectoSemestralWEB`) y la división de tareas para que **dos personas trabajen de forma independiente y en paralelo** (una en **Base de Datos/Backend** y otra en **Frontend**).

---

## 1. Requerimientos del Proyecto

* **Base de datos:** `semestral`
* **Tabla `clientes`:**
  * `id_cliente` (PK)
  * `nombre_cliente`
* **Tabla `autos`:**
  * `placa` (PK)
  * `marca`
  * `modelo` (`SEDAN`, `PICK-UP`, `SUB`, `BUSITO`)
  * `kilometraje`
  * `id_cliente` (FK $\rightarrow$ `clientes.id_cliente`)
* **Navegación principal (3 enlaces):**
  1. **Acerca de:** Página informativa y creativa sobre la empresa.
  2. **Mostrar autos:** Formulario de filtro por modelo (`Todos`, `SEDAN`, `PICK-UP`, `SUB`, `BUSITO`) + tabla de resultados con opciones para **Actualizar** y **Eliminar**.
  3. **Agregar autos:** **Un solo formulario** que registre simultáneamente los datos en las tablas `clientes` y `autos`.

---

## 2. Estructura de Archivos (`ProyectoSemestralWEB`)

```text
ProyectoSemestralWEB/
│
├── index.php                       # [PERSONA 1 - BD/Backend] Enrutador principal (?accion=...)
├── .gitattributes                  # Configuración de Git
├── indicaciones_del_proyecto.md    # Enunciado del proyecto
│
├── Controlador/                    # [PERSONA 1 - BD/Backend] Lógica de negocio y puente Modelo-Vista
│   └── AutoController.php          # Recibe formularios, llama a los modelos y carga las vistas
│
├── Modelo/                         # [PERSONA 1 - BD/Backend] Acceso a datos y base de datos
│   ├── semestral.sql               # Script de creación de BD 'semestral' y tablas 'clientes' y 'autos'
│   ├── DBConexion.php              # Clase de conexión a MySQL (PDO o MySQLi)
│   ├── ClienteModel.php            # Consultas SQL para la tabla 'clientes' (INSERT, SELECT)
│   └── AutoModel.php               # Consultas SQL CRUD para 'autos' (SELECT, INSERT, UPDATE, DELETE)
│
└── Vista/                          # [PERSONA 2 - Frontend] Interfaz visual HTML5, CSS e imágenes
    ├── layouts/
    │   ├── header.php              # Estructura HTML5 <head>, enlace a CSS y menú (3 links)
    │   └── footer.php              # Pie de página y cierre </body></html>
    ├── css/
    │   └── estilos.css             # Diseño visual, formularios, tablas y botones
    ├── img/                        # Imágenes y logotipo para "Acerca de" y catálogo
    ├── acerca.php                  # Opción 1: Página informativa creativa de "Machine Line"
    ├── mostrar_autos.php           # Opción 2: Filtro por modelo + tabla con Editar/Eliminar
    ├── editar_auto.php             # Opción 2: Formulario precargado para actualizar un auto
    └── agregar_auto.php            # Opción 3: Formulario único (Cliente + Auto)
```

---

## 3. División de Trabajo por Persona

| Rol y Responsable | Carpetas Asignadas | Responsabilidades y Entregables |
| :--- | :--- | :--- |
| **Persona 1: Base de Datos y Lógica (Backend)** | `Modelo/`, `Controlador/`, `index.php` | • Crear la BD `semestral` y las tablas `clientes` y `autos` en `Modelo/semestral.sql`.<br>• Programar la conexión a MySQL en `Modelo/DBConexion.php`.<br>• En `Modelo/ClienteModel.php`: insertar cliente y retornar su `id_cliente`.<br>• En `Modelo/AutoModel.php`: listar todos, filtrar por `modelo`, insertar auto, buscar por `placa`, actualizar y eliminar.<br>• En `Controlador/AutoController.php` e `index.php`: recibir `$_POST`/`$_GET`, llamar a los modelos, pasar los arreglos resultantes e incluir los archivos de `Vista/`. |
| **Persona 2: Diseño e Interfaz (Frontend)** | `Vista/` (`layouts/`, `css/`, `img/` y las 4 vistas `.php`) | • Maquetar `Vista/layouts/header.php` (con los links: *Acerca de*, *Mostrar autos*, *Agregar autos*) y `footer.php`.<br>• Diseñar la vista creativa `Vista/acerca.php` (Opción 1).<br>• Crear `Vista/mostrar_autos.php` (Opción 2) con el `<select>` de filtro (`Todos`, `SEDAN`, `PICK-UP`, `SUB`, `BUSITO`), la tabla de vehículos y enlaces de *Editar* y *Eliminar*.<br>• Crear `Vista/editar_auto.php` con los campos precargados.<br>• Crear `Vista/agregar_auto.php` (Opción 3) con **un solo `<form>`** que pida datos del cliente y del auto.<br>• Estilizar todo el sitio en `Vista/css/estilos.css`. |

---

## 4. Contrato de Integración (Para trabajar en paralelo)

Para que **Persona 2** diseñe las vistas sin esperar a que exista la base de datos y **Persona 1** programe el backend sin esperar los formularios, ambos deben respetar exactamente estos **5 acuerdos**:

1. **Rutas de enlaces y formularios (siempre apuntando a `index.php` en la raíz):**
   * `index.php?accion=acerca` $\rightarrow$ Carga `Vista/acerca.php` (Opción 1).
   * `index.php?accion=listar` $\rightarrow$ Carga `Vista/mostrar_autos.php` (todos los autos o filtrados por `$_GET['modelo']` / `$_POST['modelo']`).
   * `index.php?accion=editar&placa=XXX` $\rightarrow$ Carga `Vista/editar_auto.php` con los datos de esa placa.
   * `index.php?accion=actualizar` $\rightarrow$ Recibe el `POST` de `editar_auto.php` y actualiza en la BD.
   * `index.php?accion=eliminar&placa=XXX` $\rightarrow$ Elimina el auto de esa placa y redirige a `listar`.
   * `index.php?accion=agregar` $\rightarrow$ Carga `Vista/agregar_auto.php` (Opción 3).
   * `index.php?accion=guardar` $\rightarrow$ Recibe el `POST` del formulario único, guarda primero en `clientes` y luego en `autos`.

2. **Rutas de archivos estáticos (CSS e Imágenes):**
   * Como todas las vistas se cargan desde `index.php` (en la raíz `ProyectoSemestralWEB/`), la ruta del CSS en `Vista/layouts/header.php` debe escribirse relativa a la raíz:
     ```html
     <link rel="stylesheet" href="Vista/css/estilos.css">
     ```

3. **Atributos `name=""` en los formularios HTML:**
   * **Clientes:** `name="id_cliente"` (si se digita manualmente) y `name="nombre_cliente"`.
   * **Autos:** `name="placa"`, `name="marca"`, `name="modelo"` (valores exactos: `SEDAN`, `PICK-UP`, `SUB`, `BUSITO`), `name="kilometraje"`.

4. **Variables PHP que el Controlador envía a las Vistas:**
   * En `Vista/mostrar_autos.php`: Persona 1 entregará un arreglo asociativo llamado **`$autos`** donde cada fila tiene las claves `placa`, `marca`, `modelo`, `kilometraje`, `id_cliente` y `nombre_cliente` (mediante `INNER JOIN`).
   * En `Vista/editar_auto.php`: Persona 1 entregará un arreglo asociativo llamado **`$auto`** con las claves `placa`, `marca`, `modelo`, `kilometraje` e `id_cliente`.

5. **Datos de prueba temporal para Frontend (Persona 2):**
   * Mientras Persona 1 termina `Modelo/` y `Controlador/`, Persona 2 puede colocar este bloque al inicio de `Vista/mostrar_autos.php` para probar el diseño de su tabla y CSS:
     ```php
     <?php
     // Eliminar este bloque al integrar con Controlador/AutoController.php
     if (!isset($autos)) {
         $autos = [
             ['placa' => 'AB-1234', 'marca' => 'Toyota', 'modelo' => 'SEDAN', 'kilometraje' => 45000, 'id_cliente' => 1, 'nombre_cliente' => 'Ana Pérez']
         ];
     }
     ?>
     ```