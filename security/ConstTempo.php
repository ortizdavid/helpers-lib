<?PHP
/**
*
* @author Ortiz de Arcanjo David
* @copyright 2020
* <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
* @name ConstTempo
* @desc Responsável pelas constantes de Unidade de Tempo, tendo como base os segundos
*
*/
class ConstTempo
{
    
    /**
     *@var const MILESIMOS
     *@desc valor inicial do tempo em milésimos
     * */
    const MILESIMOS = self::SEGUNDOS / 90;
    
    /**
     *@var const SEGUNDOS
     *@desc valor inicial do tempo em segundos
     * */
    const SEGUNDOS = 1;
    
    /**
     *@var const MINUTOS
     *@desc valor inicial do tempo em minutos
     * */
    const MINUTOS = self::SEGUNDOS * 60;
    
    /**
    *@var const MINUTOS
    *@desc valor inicial do tempo em minutos
    * */
    const HORAS = self::MINUTOS * 60;
    
    /**
    *@var const HORAS
    *@desc valor inicial do tempo em horas
    * */
    const DIAS = self::HORAS * 24;
    
    /**
    *@var const SEMANAS
    *@desc valor inicial do tempo em semanas
    * */
    const SEMANAS = self::DIAS * 7;
    
    /**
    *@var const MESES
    *@desc valor inicial do tempo em semanas
    * */
    const MESES = self::SEMANAS * 4;
    
    /**
    *@var const ANOS
    *@desc valor inicial do tempo em anos
    * */
    const ANOS = self::MESES * 12;
    
    /**
    *@var const DECADAS
    *@desc valor inicial do tempo em dêcadas
    * */
    const DECADAS = self::ANOS * 10;
    
    /**
    *@var const SECULOS
    *@desc valor inicial do tempo em séculos
    * */
    const SECULOS = self::DECADAS * 10;
    
    /**
    *@var const MILENIOS
    *@desc valor inicial do tempo em milénios
    * */
    const MILENIOS = self::SECULOS * 10;

}

