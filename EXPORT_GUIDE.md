# Guía de Exportación a PDF y Excel - Carreras y Universidades

## 📋 Resumen de cambios

Se han implementado botones de exportación para los módulos de **Carreras** y **Universidades** que permiten descargar reportes en formato Excel directamente desde la tabla de Filament.

## ✨ Características implementadas

### 1. **Botones de Exportación**
- ✅ Botón "Exportar a Excel" en la tabla de Carreras (color verde)
- ✅ Botón "Exportar a Excel" en la tabla de Universidades (color azul)
- ✅ Iconos visuales y tooltips informativos
- ✅ Estilos personalizados y responsivos

### 2. **Clases de Exportación**
- `App\Exports\CarrerasExport` - Exporta datos de carreras con formato
- `App\Exports\UniversidadesExport` - Exporta datos de universidades con formato
- Encabezados personalizados y colores de fondo en los headers

### 3. **Controladores de Reportes**
- `CarrerasReporteController` - Manejo de exportaciones de carreras
- `UniversidadesReporteController` - Manejo de exportaciones de universidades
- Métodos para PDF y Excel (preparado para futuro uso)

### 4. **Vistas PDF** (Opcional)
- `resources/views/reportes/carreras.blade.php` - Vista para PDF de carreras
- `resources/views/reportes/universidades.blade.php` - Vista para PDF de universidades

### 5. **Estilos CSS**
- `resources/css/export-button.css` - Estilos especializados para botones
- Gradientes, efectos hover y animaciones suaves
- Responsive design para dispositivos móviles

## 🎨 Estilos implementados

### Botón de Carreras (Verde - Éxito)
```css
Colores: Gradiente de verde esmeralda (#059669 - #047857)
Efecto hover: Elevación y cambio de sombra
Ícono: document-arrow-down
```

### Botón de Universidades (Azul - Info)
```css
Colores: Gradiente de azul (#3B82F6 - #1D4ED8)
Efecto hover: Elevación y cambio de sombra
Ícono: document-arrow-down
```

## 🚀 Cómo usar

### Desde la interfaz Filament:

1. **Para Carreras:**
   - Navega a: Académico → Carreras
   - Haz clic en el botón verde "Exportar a Excel"
   - Se descargará automáticamente un archivo `carreras.xlsx`

2. **Para Universidades:**
   - Navega a: Académico → Universidades
   - Haz clic en el botón azul "Exportar a Excel"
   - Se descargará automáticamente un archivo `universidades.xlsx`

### Programáticamente:

```php
// Exportar Carreras
use App\Exports\CarrerasExport;
use Maatwebsite\Excel\Facades\Excel;

Excel::download(new CarrerasExport, 'carreras.xlsx');
```

## 📊 Datos incluidos en exportaciones

### Carreras
- Nombre de la Carrera
- Duración
- Descripción
- Universidad asociada

### Universidades
- Nombre
- Correo
- Teléfono
- Dirección
- Sitio Web
- Hora de apertura
- Hora de cierre

## 🔧 Configuración técnica

### Dependencias requeridas:
```json
{
    "maatwebsite/excel": "^3.17",
    "barryvdh/laravel-dompdf": "^2.1",
    "filament/filament": "^3.2"
}
```

### Archivos creados:
1. `/app/Exports/CarrerasExport.php`
2. `/app/Exports/UniversidadesExport.php`
3. `/app/Http/Controllers/CarrerasReporteController.php`
4. `/app/Http/Controllers/UniversidadesReporteController.php`
5. `/resources/views/reportes/carreras.blade.php`
6. `/resources/views/reportes/universidades.blade.php`
7. `/resources/css/export-button.css`

### Archivos modificados:
1. `/app/Filament/Resources/Carreras/Tables/CarrerasTable.php`
2. `/app/Filament/Resources/Universidades/Tables/UniversidadesTable.php`
3. `/app/Providers/AppServiceProvider.php`
4. `/routes/web.php`

## 📱 Características adicionales disponibles

### Métodos del controlador CarrerasReporteController:
- `generarExcel()` - Descarga Excel de carreras
- `generarPDF()` - Descarga PDF de carreras
- `generarPDFPorUniversidad($universidadId)` - PDF filtrado por universidad

### Métodos del controlador UniversidadesReporteController:
- `generarExcel()` - Descarga Excel de universidades
- `generarPDF()` - Descarga PDF de universidades
- `generarPDFDetallado()` - PDF con carreras asociadas

## 🎯 Próximos pasos sugeridos

1. Agregar botón de PDF además del Excel en las tablas (opcional)
2. Personalizar más los colores según tu diseño corporativo
3. Agregar filtros a las exportaciones
4. Implementar exportación por fecha rango
5. Agregar logos en los reportes PDF

## 📞 Soporte

Si necesitas hacer ajustes en los estilos o agregar más funcionalidades a las exportaciones, puedes:

1. Modificar los colores en `export-button.css`
2. Editar los campos exportados en las clases `Export`
3. Personalizar las vistas PDF según necesites

---

**Última actualización:** 24 de noviembre de 2025
