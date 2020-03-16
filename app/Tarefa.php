<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    // protected $table = 'tarefas'; Nomeia a tabela, caso nao queira que o laraval preveja o nome baseado no nome da model
    // protected $primaryKey = 'id'; Renomeia chave primaria
    // public $incrementing = true; diz se o campo id sera ou nao AUTO_INCRIMENT
    // protected $keyType = 'string'; Diz o tipo de dado da chave primaria

    //created_at, updated_at
    public $timestamps = false; //retira a criacao padrao desses dois campos
    protected $fillable = ['titulo'];
    // const CREATED_AT = 'date_created'; //caso queira renomear esses campos que ja vem padronizados pelo eloquent
    // const UPDATED_AT = 'date_updated';
}
