<?php 

if (!function_exists('flashMessage')) {
    function flashMessage($tipo, $mensagem)
    {
        $tiposPermitidos = ['success', 'error', 'info', 'warning'];

        if (!in_array($tipo, $tiposPermitidos)) {
            throw new \InvalidArgumentException("Tipo de mensagem inválido. Tipos permitidos: " . implode(', ', $tiposPermitidos));
        }

        session()->flash('flash_message', [
            'tipo' => $tipo,
            'mensagem' => $mensagem,
        ]);
    }
}