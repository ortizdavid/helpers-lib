<?php

namespace Negocio\Nativo\Ficheiro;

/**
 *
 * @author Ortiz de Arcanjo David
 * @copyright 2020
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @name ConstUpload
 * @desc Constantes de upload de arquivo
 *
 */
class ConstUpload
{
    
    /**
     *@var const MAX_IMG
     *@desc máximo tamanho para imagens (em MB)
     * */
    const MAX_IMG = 2 * ConstByte::MEGABYTE; // 2MB
    
    /**
     *@var const MAX_PDF
     *@desc máximo tamanho para documentos PDF (em MB)
     * */
    const MAX_PDF = 2 * ConstByte::MEGABYTE; // 2MB
    
    /**
     *@var const MAX_DOCX
     *@desc máximo tamanho para documentos DOCX (em MB)
     * */
    const MAX_DOCX = 2 * ConstByte::MEGABYTE;
    
    
}

