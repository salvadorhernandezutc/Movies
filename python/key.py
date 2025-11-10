from dotenv import load_dotenv, set_key
from pathlib import Path
import secrets
import os

# 🔹 Obtener la ruta absoluta del archivo key.py
BASE_DIR = Path(__file__).resolve().parent

# 🔹 Crear la ruta al archivo .env en la misma carpeta que este archivo
env_path = BASE_DIR / ".env"

# 🔹 Crear el archivo si no existe
if not env_path.exists():
    env_path.write_text("")

# 🔹 Cargar variables del archivo .env
load_dotenv(dotenv_path=env_path)

# 🔹 Generar una nueva clave si no existe
# if not os.getenv("SECRET_KEY"):
new_key = secrets.token_urlsafe(48)
set_key(str(env_path), "SECRET_KEY", new_key)
print(f"✅ Se generó y guardó SECRET_KEY en {env_path}")
# else:
#     print(f"ℹ️ SECRET_KEY ya existe en {env_path}")
