<?php

function printMessage($message) {
    if ($message=='success-create')
        return '<p class="alert alert-success">Registro salvo com sucesso!</p>';
    if ($message=='error-create')
        return '<p class="alert alert-error">Erro ao salvar o registro.</p>';

    if ($message=='success-remove')
        return '<p class="alert alert-success">Registro removido com sucesso!</p>';
    if ($message=='error-remove')
        return '<p class="alert alert-error">Erro ao remover registro.</p>';

    if ($message=='success-update')
        return '<p class="alert alert-success">Registro atualizado com sucesso!</p>';
    if ($message=='error-update')
        return '<p class="alert alert-error">Erro ao atualizar registro.</p>';
}