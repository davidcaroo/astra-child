# Solución de Problemas - Emprende Sin Límites

## Problema: Los estilos no se cargan

### Causas Comunes y Soluciones

#### 1. **Verificar que el tema esté activado correctamente**

Ve a **Apariencia > Temas** y asegúrate de que "Emprende Sin Límites - Astra Child" esté activado (no solo Astra).

#### 2. **Limpiar caché**

Si usas un plugin de caché (WP Rocket, W3 Total Cache, etc.):
- Ve a la configuración del plugin
- Limpia toda la caché
- Recarga la página

#### 3. **Verificar permisos de archivos**

Los archivos CSS deben tener permisos de lectura. En tu servidor:
```bash
chmod 644 assets/css/*.css
```

#### 4. **Verificar rutas de archivos**

Abre la consola del navegador (F12) y ve a la pestaña "Network". Recarga la página y verifica que los archivos CSS se estén cargando:
- `global.css`
- `utilities.css`
- `layout-fixes.css`

Si ves errores 404, los archivos no se encuentran en la ruta correcta.

#### 5. **Forzar regeneración de estilos**

En WordPress admin:
1. Ve a **Apariencia > Personalizar**
2. Haz cualquier cambio pequeño
3. Guarda los cambios
4. Esto fuerza a WordPress a regenerar los estilos

#### 6. **Verificar que Astra esté instalado**

Este es un tema hijo de Astra. Debes tener:
1. Astra theme instalado
2. Emprende Sin Límites activado (no Astra)

#### 7. **Modo de depuración**

Activa el modo debug en `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Luego revisa el archivo `wp-content/debug.log` para ver errores.

#### 8. **Verificar versión de PHP**

El tema requiere PHP 7.4 o superior. Verifica tu versión en:
**Herramientas > Salud del sitio > Información**

#### 9. **Conflictos con plugins**

Desactiva temporalmente todos los plugins y verifica si los estilos cargan. Si funcionan, reactiva los plugins uno por uno para identificar el conflicto.

#### 10. **Regenerar archivos**

Si nada funciona, puedes:
1. Desactivar el tema
2. Eliminar la carpeta `astra-child`
3. Volver a subir todos los archivos
4. Activar el tema nuevamente

## Verificación Rápida

Abre el código fuente de tu página (Ctrl+U) y busca estas líneas en el `<head>`:

```html
<link rel='stylesheet' id='academia-global-css' href='.../astra-child/assets/css/global.css' />
<link rel='stylesheet' id='academia-utilities-css' href='.../astra-child/assets/css/utilities.css' />
<link rel='stylesheet' id='academia-layout-fixes-css' href='.../astra-child/assets/css/layout-fixes.css' />
```

Si no las ves, el problema está en `functions.php`.

## Contacto de Soporte

Si el problema persiste después de probar todas estas soluciones, proporciona:
1. Versión de WordPress
2. Versión de PHP
3. Plugins activos
4. Captura de pantalla de la consola del navegador (F12)
5. Contenido del archivo `debug.log`
