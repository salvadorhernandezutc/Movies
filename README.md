# 🎬 Movies

**Movies** es un proyecto que conecta un **frontend dinámico** con una **API desarrollada en C#**, utilizando **AJAX**, **PHP** y **tokens seguros** para la autenticación y protección de datos.  
El objetivo del proyecto es ofrecer una interfaz web moderna que permita a los usuarios consultar, filtrar y gestionar información de películas en tiempo real, garantizando la comunicación segura entre cliente y servidor.

---

## 🚀 Inicio rápido


### 1️⃣ Verificar instalación de Node.js y npm

Antes de instalar las dependencias, asegúrate de tener **Node.js** y **npm** correctamente instalados en tu sistema:

```bash
node -v
npm -v
```

Esto mostrará las versiones actuales instaladas.  
> 💡 Se recomienda usar Node.js **v18 o superior** y npm **v9 o superior**.

Si no tienes Node.js instalado, descárgalo desde el sitio oficial:  
👉 [https://nodejs.org/](https://nodejs.org/)

Rcuerda descargar la version para windows o segun sea el caso para tu sistema operativo.

---

### 2️⃣ Iniciar Proyecto e instalar dependencias

El proyecto NPM se inicia de forma rapida de la siguiente manera:

```bash
npm init -y
```

Sin embargo, si deseas cambiar cada aspecto por separado, inicia el proyecto de esta manera:

```bash
npm init
```

Esto iniciara el proceso de llenado del proyecto, donde te preguntará aspectos como el nombre del autor, etiquetas, link del repositorio, archivos iniciales, entre otros.
Tambien se puede modificar posteriormente en el archivo `package.json`

Una vez dentro del proyecto, instala todas las dependencias necesarias:

```bash
npm install
```

Esto descargará los módulos definidos en el archivo `package.json`.

---

### 3️⃣ Ejecutar el proyecto

Para iniciar el entorno de desarrollo, usa:

```bash
npm run dev
```

---

## ⚙️ Variables de entorno en Windows 11

Algunos paquetes o configuraciones de Node.js pueden requerir **variables de entorno** (por ejemplo, rutas de API, claves secretas o configuraciones globales).

### 🔧 Agregar variables de entorno en Windows 11

1. Abre el **Panel de control** → **Sistema y seguridad** → **Sistema**.  
2. Haz clic en **Configuración avanzada del sistema**.  
3. En la pestaña **Opciones avanzadas**, selecciona **Variables de entorno**.  
4. En **Variables del sistema**, haz clic en **Nueva**.  
5. Agrega el nombre y valor de la variable, por ejemplo:

   ```
   Nombre de la variable: NODE_ENV
   Valor de la variable: development
   ```

6. Haz clic en **Aceptar** para guardar.

> 💡 También puedes configurar variables de entorno desde la terminal de PowerShell:
> ```powershell
> setx NOMBRE_VARIABLE "valor"
> ```
> Ejemplo:
> ```powershell
> setx API_URL "https://api.tu-servidor.com"
> ```

---

## 🔐 Seguridad y Tokens

El proyecto utiliza **tokens seguros** para autenticar las peticiones AJAX hacia la API C#.  
Cada solicitud incluye un token generado en el backend PHP, el cual se valida antes de acceder a los recursos de la API.  
Esto evita accesos no autorizados y protege los datos transmitidos entre cliente y servidor.

---

## 🧩 Tecnologías principales

- **Frontend:** HTML5, CSS3, JavaScript (AJAX)
- **Backend intermedio:** PHP
- **API:** C# (ASP.NET)
- **Seguridad:** Tokens JWT o personalizados
- **Gestor de dependencias:** npm

---

## 🧠 Recomendaciones de desarrollo

- Usa `npm audit` para revisar vulnerabilidades en dependencias.  
- Ejecuta `npm update` regularmente para mantener tu entorno actualizado.  
- Si trabajas en equipo, utiliza un archivo `.env` (no lo subas a GitHub) para gestionar variables privadas.


