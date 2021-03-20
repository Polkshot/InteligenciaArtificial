<?php
  class Usuarios{
    private $id;
    private $usuario;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $dataNascimento;
    private $sexo;
    private $altura;
    private $peso;
    private $imc;
    private $id_TipoCorporal;
    private $braco;
    private $busto;
    private $cintura;
    private $coxa;
    private $quadril;
    private $senha;

    function __construct($id, $usuario, $nome, $cpf, $email, $telefone, $dataNascimento, $sexo, $altura, $peso, $imc, $id_TipoCorporal, $braco, $busto, $cintura, $coxa, $quadril, $senha){
      $this->id = $id;
      $this->usuario = $usuario;
      $this->nome = $nome;
      $this->cpf = $cpf;
      $this->email = $email;
      $this->telefone = $telefone;
      $this->dataNascimento = $dataNascimento;
      $this->sexo = $sexo;
      $this->altura = $altura;
      $this->peso = $peso;
      $this->imc = $imc;
      $this->id_TipoCorporal = $id_TipoCorporal;
      $this->braco = $braco;
      $this->busto = $busto;
      $this->cintura = $cintura;
      $this->coxa = $coxa;
      $this->quadril = $quadril;
      $this->senha = $senha;
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Nome
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of Nome
     *
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of Cpf
     *
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of Cpf
     *
     * @param mixed $cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Telefone
     *
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of Telefone
     *
     * @param mixed $telefone
     *
     * @return self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of Data Nascimento
     *
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of Data Nascimento
     *
     * @param mixed $dataNascimento
     *
     * @return self
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of Sexo
     *
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of Sexo
     *
     * @param mixed $sexo
     *
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of Altura
     *
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of Altura
     *
     * @param mixed $altura
     *
     * @return self
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get the value of Peso
     *
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of Peso
     *
     * @param mixed $peso
     *
     * @return self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of Imc
     *
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set the value of Imc
     *
     * @param mixed $imc
     *
     * @return self
     */
    public function setImc($imc)
    {
        $this->imc = $imc;

        return $this;
    }

    /**
     * Get the value of Id Tipo Corporal
     *
     * @return mixed
     */
    public function getIdTipoCorporal()
    {
        return $this->id_TipoCorporal;
    }

    /**
     * Set the value of Id Tipo Corporal
     *
     * @param mixed $id_TipoCorporal
     *
     * @return self
     */
    public function setIdTipoCorporal($id_TipoCorporal)
    {
        $this->id_TipoCorporal = $id_TipoCorporal;

        return $this;
    }

    /**
     * Get the value of Braco
     *
     * @return mixed
     */
    public function getBraco()
    {
        return $this->braco;
    }

    /**
     * Set the value of Braco
     *
     * @param mixed $braco
     *
     * @return self
     */
    public function setBraco($braco)
    {
        $this->braco = $braco;

        return $this;
    }

    /**
     * Get the value of Busto
     *
     * @return mixed
     */
    public function getBusto()
    {
        return $this->busto;
    }

    /**
     * Set the value of Busto
     *
     * @param mixed $busto
     *
     * @return self
     */
    public function setBusto($busto)
    {
        $this->busto = $busto;

        return $this;
    }

    /**
     * Get the value of Cintura
     *
     * @return mixed
     */
    public function getCintura()
    {
        return $this->cintura;
    }

    /**
     * Set the value of Cintura
     *
     * @param mixed $cintura
     *
     * @return self
     */
    public function setCintura($cintura)
    {
        $this->cintura = $cintura;

        return $this;
    }

    /**
     * Get the value of Coxa
     *
     * @return mixed
     */
    public function getCoxa()
    {
        return $this->coxa;
    }

    /**
     * Set the value of Coxa
     *
     * @param mixed $coxa
     *
     * @return self
     */
    public function setCoxa($coxa)
    {
        $this->coxa = $coxa;

        return $this;
    }

    /**
     * Get the value of Quadril
     *
     * @return mixed
     */
    public function getQuadril()
    {
        return $this->quadril;
    }

    /**
     * Set the value of Quadril
     *
     * @param mixed $quadril
     *
     * @return self
     */
    public function setQuadril($quadril)
    {
        $this->quadril = $quadril;

        return $this;
    }

    /**
     * Get the value of Senha
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of Senha
     *
     * @param mixed $senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }


    /**
     * Get the value of Usuario
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

}
?>
