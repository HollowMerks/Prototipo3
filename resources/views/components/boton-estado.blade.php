<div class="button-borders">
    <button
        class="primary-button"
        wire:click="toggleEstado({{ $record->id }})"
    >
        {{ $record->Estado === 'Habilitado' ? 'Inhabilitar' : 'Habilitar' }}
    </button>
</div>

<style>
.primary-button {
 font-family: 'Ropa Sans', sans-serif;
 color: white;
 cursor: pointer;
 font-size: 13px;
 font-weight: bold;
 letter-spacing: 0.05rem;
 border: 1px solid #0E1822;
 padding: 0.5rem 1.2rem;
 background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 531.28 200'%3E%3Cdefs%3E%3Cstyle%3E .shape %7B fill: %23FF4655 %7D %3C/style%3E%3C/defs%3E%3Cg id='Layer_2' data-name='Layer 2'%3E%3Cg id='Layer_1-2' data-name='Layer 1'%3E%3Cpolygon class='shape' points='415.81 200 0 200 115.47 0 531.28 0 415.81 200' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
 background-color: #0E1822;
 background-size: 200%;
 background-position: 200%;
 background-repeat: no-repeat;
 transition: 0.3s ease-in-out;
 position: relative;
 z-index: 1;
}

.primary-button:hover {
 border: 1px solid #FF4655;
 color: white;
 background-position: 40%;
}

.button-borders {
 position: relative;
 width: fit-content;
 height: fit-content;
 margin: auto;
}
</style>
