# 🚀 Pasos Finales para Activar CI/CD

## ✅ Archivos Creados

- `.github/workflows/deploy.yml` - Workflow de GitHub Actions
- `.gitignore` - Actualizado con exclusiones
- Commit realizado localmente

---

## 📋 PASO 1: Clave Pública SSH

### Copia esta clave pública y agrégala al servidor:

**Ubicación de la clave:** `C:\Users\Ingca\.ssh\astra_deploy_ed25519.pub`

**Contenido:** (Ver salida del comando anterior)

### En el servidor:

```bash
ssh -p 65002 u329333801@147.79.84.57
mkdir -p ~/.ssh
nano ~/.ssh/authorized_keys
```

Pega la clave pública, guarda (Ctrl+O, Enter, Ctrl+X)

```bash
chmod 700 ~/.ssh
chmod 600 ~/.ssh/authorized_keys
exit
```

---

## 🔐 PASO 2: Configurar GitHub Secrets

Ve a: **https://github.com/davidcaroo/astra-child/settings/secrets/actions**

Crea estos 4 secrets:

### 1. SSH_HOST
```
147.79.84.57
```

### 2. SSH_PORT
```
65002
```

### 3. SSH_USER
```
u329333801
```

### 4. SSH_KEY

**Contenido:** Copia TODO el contenido de `C:\Users\Ingca\.ssh\astra_deploy_ed25519`

Debe incluir:
```
-----BEGIN OPENSSH PRIVATE KEY-----
...
-----END OPENSSH PRIVATE KEY-----
```

---

## 🚀 PASO 3: Push y Deploy

Una vez configurados los secrets:

```bash
git push origin main
```

Esto disparará automáticamente el deploy.

---

## ✅ Verificar Deploy

1. Ve a: **https://github.com/davidcaroo/astra-child/actions**
2. Verás el workflow ejecutándose
3. Espera a que termine (✅ = éxito)
4. Verifica en WordPress que el tema se actualizó

---

## 📁 Estructura Verificada

```
astra-child/
├── .github/
│   └── workflows/
│       └── deploy.yml ✅
├── assets/
├── blocks/
├── inc/
├── style.css
├── functions.php
├── header.php
├── footer.php
└── template-landing.php
```

✅ **Estructura correcta** - Solo el tema, sin WordPress completo

---

## 🔄 Uso Futuro

Cada vez que hagas cambios:

```bash
git add .
git commit -m "Descripción del cambio"
git push origin main
```

**Deploy automático** 🎉

---

## ⚠️ Troubleshooting

### Si el workflow falla:

1. Verifica que los 4 secrets estén configurados correctamente
2. Verifica que la clave pública esté en el servidor
3. Revisa los logs en GitHub Actions para ver el error específico

### Ruta del servidor:

El workflow despliega a:
```
/home/u329333801/public_html/wp-content/themes/astra-child/
```

Si esta ruta es incorrecta, edita `deploy.yml` línea 28.
