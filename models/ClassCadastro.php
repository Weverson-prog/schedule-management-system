<?php
namespace Models;

class ClassCadastro extends ClassCrud{
    

        private $nome;
        private $email;
        private $password;
        private $telCelular;
        private $cpf;
        private $dataNascimento;
        
    #Realizará a inserção no banco de dados
    public function insertCad($arrVar)
    {
        $this->insertDB(
          "users",
          "?,?,?,?,?,?,?,?,?,?",
                array(
                    "",
                    $arrVar['nome'],
                    $arrVar['email'],
                    $arrVar['hashSenha'],
                    $arrVar['dataNascimento'],
                    $arrVar['telCelular'],
                    $arrVar['cpf'],
                    $arrVar['dataCreate'],
                    'user',
                    'confirmation'
                )
        );
      
    }

    public function insertAlt($arrVar)
    {
        $this->updateDB(
          "users",
          "?,?,?,?,?",
                array(
                    $arrVar['nome'],
                    $arrVar['email'],
                    $arrVar['cpf'],
                    $arrVar['dataNascimento'],
                    $arrVar['telCelular']
                )
        );
      
    }
    #Inserção de confirmação
    public function insConfirmation($arrVar)
    {

        
        $this->insertDB(
            "confirmation",
            "?,?,?",
            array(
                0,
                $arrVar['email'],
                $arrVar['token']
            )
        );
        
    }
    #Veriricar se já existe o mesmo email cadastro no db
    public function getIssetEmail($email)
    {
    $b=$this->selectDB(
        "*",
        "users",
        "where email=?",
        array(
            $email
        )
    );
    return $r=$b->rowCount();
}
#Verificar a confirmação de cadastro pelo email
public function confirmationCad($email,$token)
{
    $b=$this->selectDB(
        "*",
        "confirmation",
        "where email=? and token=?",
        array(
            $email,
            $token
        )
    );
    $r=$b->rowCount();

    if($r >0){
        $this->deleteDB(
            "confirmation",
            "email=?",
            array($email)
        );

        $this->updateDB(
            "users",
            "status=?",
            "email=?",
            array(
                "Ativo",
                $email
            )
        );
        return true;
    }else{
        return false;
    }
}

#Verificar a confirmação de senha
public function confirmationSen($email,$token,$hashSenha)
{
    $b=$this->selectDB(
        "*",
        "confirmation",
        "where email=? and token=?",
        array(
            $email,
            $token
        )
    );
    $r=$b->rowCount();

    if($r >0){
        $this->deleteDB(
            "confirmation",
            "email=?",
            array($email)
        );

        $this->updateDB(
            "users",
            "senha=?",
            "email=?",
            array(
                $hashSenha,
                $email
            )
        );
        return true;
    }else{
        return false;
    }
}

public function alteracao($arrVar ){
    $this->updateDB(
        
                "users",
                "where email=?",
                "nome=?",
                "cpf=?",
                "dataNascimento=?",
                "telCelular=?",
                array(
                    $arrVar['email'],
                    $arrVar['nome'],
                    $arrVar['cpf'],
                    $arrVar['dataNascimento'],
                    $arrVar['telCelular']
                )
    );
    $this->insConfirmation($arrVar);
}
}