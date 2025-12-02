@props([
    'user' => filament()->auth()->user(),
])

@php
    $src = filament()->getUserAvatarUrl($user);
    // Si Filament no devuelve avatar, intentar obtener la foto desde la relación UsuariosCampusMarket
    if (empty($src) && method_exists($user, 'usuarioCampusMarket')) {
        try {
            $ucm = $user->usuarioCampusMarket;
            if ($ucm && ! empty($ucm->Foto_de_perfil)) {
                $src = asset('storage/' . ltrim($ucm->Foto_de_perfil, '/'));
            }
        } catch (\Throwable $e) {
            // No romper la vista si algo falla, mantenemos el valor original
        }
    }
    $alt = __('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)]);
@endphp

<x-filament::avatar
    :src="$src"
    :alt="$alt"
    :attributes="
        \Filament\Support\prepare_inherited_attributes($attributes)
            ->class(['fi-user-avatar'])
    "
/>
