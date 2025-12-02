# Sistema de Seguridad de Login - Guía de Implementación

## ✅ Componentes Implementados

### 1. **Tabla de Intentos de Login** (`login_attempts`)
- Registra intentos fallidos de autenticación
- Bloquea el email después de 5 intentos fallidos por 5 minutos
- Campos:
  - `email`: Email del usuario
  - `attempts`: Contador de intentos fallidos
  - `last_attempt`: Última vez que se intentó
  - `blocked_until`: Fecha/hora hasta cuando está bloqueado

### 2. **Modelo LoginAttempt** (`app/Models/LoginAttempt.php`)
Métodos principales:
- `recordFailedAttempt($email)`: Registra un intento fallido
- `isBlocked($email)`: Verifica si el email está bloqueado
- `clearAttempts($email)`: Limpia intentos tras login exitoso
- `getBlockedTimeRemaining($email)`: Obtiene tiempo restante de bloqueo

### 3. **Servicio de Autenticación Segura** (`app/Services/SecureAuthenticationService.php`)
Valida en el siguiente orden:
1. ✅ Email y contraseña correctos en tabla `users`
2. ✅ Existe registro en tabla `usuarios_campusmarket`
3. ✅ Cuenta está activa (campo `Estado`)
4. ✅ Rol es `superadministrador` o `moderador`
5. ✅ No está bloqueado por intentos fallidos

Mensajes de rechazo:
- "Demasiados intentos fallidos. Espere X minuto(s) para volver a intentar."
- "El email o contraseña son incorrectos."
- "No existe registro de usuario en el sistema CampusMarket."
- "Su cuenta está inactiva. Comuníquese con el administrador."
- "Usted no tiene autorización para entrar."

### 4. **Controlador de Login** (`app/Http/Controllers/Auth/LoginController.php`)
- `showLoginForm()`: Muestra formulario de login
- `login()`: Procesa login con validaciones de seguridad
- `logout()`: Cierra sesión del usuario

### 5. **Middleware de Protección** (`app/Http/Middleware/CheckAdminAccess.php`)
Protege acceso a rutas administrativas verificando:
- Usuario está autenticado
- Tiene acceso a panel administrativo
- Revoca acceso si no cumple condiciones

### 6. **Vista de Login** (`resources/views/auth/login.blade.php`)
Formulario personalizado con:
- Campo de email
- Campo de contraseña
- Mostrar mensajes de error
- Diseño responsivo con Tailwind CSS

### 7. **Rutas de Autenticación** (`routes/web.php`)
```php
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
```

## 🔒 Flujo de Seguridad Completo

```
1. Usuario accede a /login
   ↓
2. Ingresa email y contraseña
   ↓
3. Controlador valida en este orden:
   - ¿Está bloqueado por intentos fallidos?
   - ¿Email y contraseña correctos en users?
   - ¿Existe en usuarios_campusmarket?
   - ¿Está activo (Estado = 'activo')?
   - ¿El rol es superadministrador o moderador?
   ↓
4a. SI cumple todo → Login exitoso, limpia intentos, redirige a /campusMarketAdministracion
   ↓
4b. NO → Registra intento fallido, muestra mensaje específico de error
   ↓
5. Si excede 5 intentos → Bloquea por 5 minutos
```

## 📋 Configuración del Middleware

### En `app/Http/Kernel.php` (o `bootstrap/app.php` en Laravel 11+):

```php
// Agregar al array de middlewares
'admin' => \App\Http\Middleware\CheckAdminAccess::class,
```

### Proteger rutas de Filament:

```php
Route::middleware(['auth', 'admin'])->group(function () {
    // Rutas de Filament aquí
});
```

## 🔧 Verificación del Estado del Usuario

El campo `Estado` en tabla `usuarios_campusmarket` puede ser:
- `'activo'` (string) → Cuenta activa ✅
- `1` (integer) → Cuenta activa ✅
- `'inactivo'` (string) → Cuenta bloqueada ❌
- `0` (integer) → Cuenta bloqueada ❌
- Cualquier otro valor → Cuenta bloqueada ❌

## 🚀 Próximos Pasos

1. **Aplicar middleware a Filament:**
   - Agregar `'admin'` middleware a las rutas protegidas
   - Proteger el panel administrativo completo

2. **Pruebas de seguridad:**
   - Intentar login con 5 intentos fallidos → Debe bloquear 5 minutos
   - Intentar login con usuario inactivo → Debe rechazar
   - Intentar login con rol no autorizado → Debe rechazar
   - Login correcto → Debe permitir acceso

3. **Configuración de sesiones:**
   - Verificar timeout de sesión en `.env`
   - Configurar regeneración de token CSRF

4. **Logging y auditoría (Opcional):**
   - Registrar intentos en logs
   - Crear tabla de auditoría para accesos

## ⚠️ Consideraciones Importantes

- El middleware `CheckAdminAccess` revisa en CADA solicitud si el usuario sigue teniendo acceso
- Si un usuario es desactivado mientras está loggeado, será expulsado en la siguiente solicitud
- Los intentos fallidos se limpian automáticamente después de login exitoso
- El bloqueo es por email, no por IP (flexible para usuarios que cambian red)

## 📝 Ejemplo de Uso

```php
// En cualquier controlador o middleware:
$authService = new SecureAuthenticationService();

$result = $authService->authenticate('user@example.com', 'password123');

if ($result['success']) {
    Auth::login($result['user']);
} else {
    // $result['message'] contiene el mensaje de error
}
```
