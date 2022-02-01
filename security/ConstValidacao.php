<?php
namespace Negocio\Nativo\Seguranca;

//use Negocio\Sistema\Configuracao;

//require_once '../../Sistema/Configuracao.php';


/**
 * @author Ortiz de Arcanjo David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @name ConstValidacao
 * @desc Classe que contém algumas as constantes necessárias para a validação de dados
 * */
class ConstValidacao
{
    
    private static $config;
    
    /**
     * @var const EXTENSOES_IMG
     * @desc Constante as extensões permitidas para a Imagem
     * */
    const EXTENSOES_IMG = [
        'image/png', 
        'image/jpeg',
        'image/jpg'
    ];

      /**
     * @var const EXTENSOES_PDF
     * @desc Constante as extensões permitidas para documentos PDF
     * */
    const EXTENSOES_PDF = [
        'application/pdf'
    ];


    /**
     * @var const ESTADOS_CIVIS
     * @desc Constante com os países do Mundo
     * */
    const ESTADOS_CIVIS = [
        'Solteiro',
        'Casado',
        'Viuvo',
        'Divorciado'
    ];
    
    
    /**
     * @var const GENEROS
     * @desc Constante com os Géneros
     * */
    const GENEROS = [
        'Feminino',
        'Masculino'
    ];
    
    
    /**
     * @var const DIAS SEMANA
     * @desc Constante com dias da Semana
     * */
    const DIAS_SEMANA = [
        'Segunda-Feira',
        'Terça-Feira',
        'Quarta-Feira',
        'Quinta-Feira',
        'Sexta-Feira',
        'Sábado',
        'Domingo'
    ];
    
    
    /**
     * @var const MESES_ANO
     * @desc Constante com os Meses do Ano
     * */
    const MESES_ANO = [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    ];
    
    
    /**
     * @var const PROVINCIAS_ANGOLA
     * @desc Constante com  todas as Províncias de Angola
     * */
    const PROVINCIAS_ANGOLA = [
        'Bengo',
        'Benguela',
        'Bié',
        'Cabinda',
        'Cuando-Cubango',
        'Cuanza Norte',
        'Cuanza Sul',
        'Cunene',
        'Huambo',
        'Huila',
        'Luanda',
        'Lunda Norte',
        'Lunda Sul',
        'Malange',
        'Moxico',
        'Namibe',
        'Uíge',
        'Zaire'
    ];
    
    
    /**
     * @var const CONTINENTES
     * @desc Constante com os continentes do Mundo
     * */
    const CONTINENTES = [
        'África',
        'América',
        'Ásia',
        'Europa',
        'Oceania'
    ];
    
    
    /**
     * @var const PAISES
     * @desc Constante com os países do Mundo
     * */
    const PAISES = [
        'Afeganistão',
        'África do Sul',
        'Albania',
        'Alemanha',
        'Andorra',
        'Angola',
        'Anguila',
        'Antárctica',
        'Antígua e Barbuda',
        'Antilhas holandesas',
        'Arábia Saudita',
        'Argélia',
        'Argentina',
        'Arménia',
        'Aruba',
        'Austrália',
        'Áustria',
        'Azerbaijão',
        'Bahamas',
        'Bangladesh',
        'Barbados',
        'Barém',
        'Bélgica',
        'Belize',
        'Benin',
        'Bermuda',
        'Bielorrússia',
        'Brasil',
        'Bolívia',
        'Bósnia e Herzegovina',
        'Botswana',
        'Brunei Darussalam',
        'Bulgária',
        'Burkina Faso',
        'Burundi',
        'Butão',
        'Cabo Verde',
        'Camarões',
        'Camboja',
        'Canadá',
        'Catar',
        'Cazaquistão',
        'Centro-Africana (República)',
        'Chade',
        'Chile',
        'China',
        'Chipre',
        'Cidade do Vaticano ver Santa Sé)',
        'Colômbia',
        'Comores',
        'Congo',
        'Congo (República Democrática do)',
        'Coreia (República da)',
        'Coreia (República Popular Democrática da)',
        'Costa do Marfim',
        'Costa Rica',
        'Croácia',
        'Cuba',
        'Dinamarca',
        'Domínica',
        'Egipto',
        'El Salvador',
        'Emiratos Árabes Unidos',
        'Equador',
        'Eritreia',
        'Eslovaca (República)',
        'Eslovénia',
        'Espanha',
        'Estados Unidos',
        'Estónia',
        'Etiópia',
        'Filipinas',
        'Finlândia',
        'França',
        'Gabão',
        'Gâmbia',
        'Gana',
        'Geórgia',
        'Georgia do Sul e Ilhas Sandwich',
        'Gibraltar',
        'Grã-Bretanha',
        'Granada',
        'Grécia',
        'Gronelândia',
        'Guadalupe',
        'Guam',
        'Guatemala',
        'Guiana',
        'Guiana Francesa',
        'Guiné',
        'Guiné Equatorial',
        'Guiné-Bissau',
        'Haiti',
        'Holanda',
        'Honduras',
        'Hong Kong',
        'Hungria',
        'Iémen',
        'Ilhas Bouvet',
        'Ilhas Caimão',
        'Ilhas Christmas',
        'Ilhas Cocos (Keeling)',
        'Ilhas Cook',
        'Ilhas Falkland (Malvinas)',
        'Ilhas Faroé',
        'Ilhas Fiji',
        'Ilhas Heard e Ilhas McDonald',
        'Ilhas Marianas do Norte',
        'Ilhas Marshall',
        'Ilhas menores distantes dos Estados Unidos',
        'Ilhas Norfolk',
        'Ilhas Salomão',
        'Ilhas Virgens (britânicas',
        'Ilhas Virgens (Estados Unidos)',
        'Índia',
        'Indonésia',
        'Irão (República Islâmica',
        'Iraque',
        'Irlanda',
        'Islândia',
        'Israel',
        'Itália',
        'Jamaica',
        'Japão',
        'Jibuti',
        'Jordânia',
        'Jugoslávia',
        'Kenya',
        'Kiribati',
        'Kuwait',
        'Laos (República Popular Democrática do)',
        'Lesoto',
        'Letónia',
        'Líbano',
        'Libéria',
        'Líbia (Jamahiriya Árabe da)',
        'Liechtenstein',
        'Lituánia',
        'Luxemburgo',
        'Macau',
        'Macedónia (antiga República jugoslava da)',
        'Madagáscar',
        'Malásia',
        'Malawi',
        'Maldivas',
        'Mali',
        'Malta',
        'Marrocos',
        'Martinica',
        'Maurícias',
        'Mauritânia',
        'Mayotte',
        'México',
        'Micronésia (Estados Federados da)',
        'Moçambique',
        'Moldova (República de',
        'Mónaco',
        'Mongólia',
        'Monserrate',
        'Myanmar',
        'Namíbia',
        'Nauru',
        'Nepal',
        'Nicarágua',
        'Niger',
        'Nigéria',
        'Niue',
        'Noruega',
        'Nova Caledónia',
        'Nova Zelândia',
        'Omã',
        'Países Baixos',
        'Palau',
        'Panamá',
        'Papuá-Nova Guiné',
        'Paquistão',
        'Paraguai',
        'Peru',
        'Pitcairn',
        'Polinésia Francesa',
        'Polónia',
        'Porto Rico',
        'Portugal',
        'Quirguizistão',
        'Reino Unido',
        'República Checa',
        'República Dominicana',
        'Reunião',
        'Roménia',
        'Ruanda',
        'Rússia (Federação da)',
        'Samoa',
        'Samoa Americana',
        'Santa Helena',
        'Santa Lúcia',
        'Santa Sé (Cidade Estado do Vaticano*)',
        'São Cristóvão e Nevis',
        'São Marino',
        'São Pedro e Miquelon',
        'São Tomé e Príncipe',
        'São Vicente e Granadinas',
        'Sara Ocidental',
        'Senegal',
        'Serra Leoa',
        'Seychelles',
        'Singapura',
        'Síria (República Árabe da',
        'Somália',
        'Sri Lanka',
        'Suazilândia',
        'Sudão',
        'Suécia',
        'Suiça',
        'Suriname',
        'Svalbard e a Ilha de Jan Mayen',
        'Tailândia',
        'Taiwan (ProvÍncia da China)',
        'Tajiquistão',
        'Tanzânia, República Unida da',
        'Território Britânico do Oceano Índico',
        'Território Palestiniano Ocupado',
        'Territórios Franceses do Sul',
        'Timor Leste',
        'Togo',
        'Tokelau',
        'Tonga',
        'Trindade e Tobago',
        'Tunísia',
        'Turcos e Caicos (Ilhas)',
        'Turquemenistão',
        'Turquia',
        'Tuvalu',
        'Ucrânia',
        'Uganda',
        'Uruguai',
        'Usbequistão',
        'Vanuatu',
        'Venezuela',
        'Vietname',
        'Wallis e Futuna (Ilha)',
        'Zaire, ver Congo (República Democrática do)',
        'Zâmbia',
        'Zimbabwe'
    ];
    
    
    public function _construct()
    {
        //$obj = new Configuracao();
        //self::$config = $obj->obter();
    }
    
    
    /**
     * @var const MAX_NOME
     * @desc Número máximo de caracteres para o Nome
     * */
    const MAX_NOME = 50;
    public static function maxNome() : int
    {
        return self::$config->max_nome;
    }
    
    
    /**
     * @var const MIN_NOME
     * @desc Número mínimo de caracteres para o Nome
     * */
    const MIN_NOME = 10;
    public static function minNome() : int
    {
        return self::$config->min_nome;
    }
    
    /**
     * @var const MAX_DESCRICAO
     * @desc Número máximo de caracteres para: Descrição, Observação ou Detalhes
     * */
    const MAX_DESCRICAO = 200;
    public static function maxDescricao() : int
    {
        return self::$config->min_descricao;
    }
    
    /**
     * @var const MIN_DESCRICAO
     * @desc Número mínimo de caracteres para: Descrição, Observação ou Detalhes
     * */
    const MIN_DESCRICAO = 20;
    public static function minDescricao() : int
    {
        return self::$config->min_descricao;
    }
    
    /**
     * @var const MAX_ENDERECO
     * @desc Número máximo de caracteres para o Endereço(Bairro, Rua, Casa)
     * */
    const MAX_ENDERECO = 50;
    public static function maxEndereco() : int
    {
        return self::$config->max_endereco;
    }
    
    /**
     * @var const MIN_ENDERECO
     * @desc Número mínimo de caracteres para o Endereçoo(Bairro, Rua, Casa)
     * */
    const MIN_ENDERECO = 10;
    public static function minEndereco() : int
    {
        return self::$config->min_endereco;
    }
    
    /**
     * @var const MAX_LOGIN
     * @desc Número máximo de caracteres para o Login
     * */
    const MAX_LOGIN = 150;
    public static function maxLogin() : int
    {
        return self::$config->max_login;
    }
    
    /**
     * @var const MIN_LOGIN
     * @desc Número mínimo de caracteres para a Palavra-Passe
     * */
    const MIN_LOGIN = 8;
    public static function minLogin() : int
    {
        return self::$config->min_login;
    }
    
    /**
     * @var const MAX_SENHA
     * @desc Número máximo de caracteres para a Palavra-Passe
     * */
    const MAX_SENHA = 150;
    public static function maxSenha() : int
    {
        return self::$config->max_senha;
    }
    
    /**
     * @var const MIN_SENHA
     * @desc Número mínimo de caracteres para a Palavra-Passe
     * */
    const MIN_SENHA = 8;
    public static function minSenha() : int
    {
        return self::$config->min_senha;
    }
    
    /**
     * @var const MAX_EMAIL
     * @desc Número máximo de caracteres para o email
     * */
    const MAX_EMAIL = 150;
    public static function maxEmail() : int
    {
        return self::$config->max_email;
    }
    
    /**
     * @var const MIN_EMAIL
     * @desc Número mínimo de caracteres para o email
     * */
    const MIN_EMAIL = 10;
    public static function minEmail() : int
    {
        return self::$config->min_email;
    }
    
    /**
     * @var const MAX_TELEFONE
     * @desc máximo Número de telefone (Angola)
     * */
    const MAX_TELEFONE = 999999999;
    public static function maxTelefone() : int
    {
        return self::$config->max_telefone;
    }
    
    /**
     * @var const MIN_TELEFONE
     * @desc Mínino Número de telefone (Angola)
     * */
    const MIN_TELEFONE = 910000000;
    public static function minTelefone() : int
    {
        return self::$config->min_telefone;
    }
    
    //-------------------------------------------------------
    //----------------------------------------------------------
    /**
     * @var const MAX_IMG
     * @desc máximo de MB para as imagens
     * */
     const MAX_IMG = 2 * 1048576;
     public static function maxImg() : int
     {
        return self::$config->max_img * 1048576;
     }
     
     /**
     * @var const MAX_PDF
     * @desc máximo de MB para documentos PDF
     * */
     const MAX_PDF = 2 * 1048576;
     public static function maxPdf() : int
     {
        return self::$config->max_pdf * 1048576;
     }
     
    //-------------------------------------------------------
    //----------------------------------------------------------


}

echo ConstValidacao::MAX_NOME;

    