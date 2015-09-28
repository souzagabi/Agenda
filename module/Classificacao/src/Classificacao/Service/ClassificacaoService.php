<?php

namespace Classificacao\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class ClassificacaoService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Classificacao\Entity\Reuniao';
        parent::__construct($em);
    }

    public function inserir(array $data) {

        //======================== verifica se o nome do arquivo tem acentuação ==================================//
        if ($_FILES['imagens']) {

            $data['imagens'] = mysql_real_escape_string(file_get_contents($_FILES['imagens']['tmp_name']));
            $imgType = mysql_real_escape_string($_FILES['imagens']['type']);
            $data['tipoImagem'] = mysql_real_escape_string(substr($_FILES['imagens']['name']));
            //$imgName = mysql_real_escape_string($_FILES['imagens']['name']);
            //$data['typeImage'] = $imgType;
            $imagens = $_FILES['imagens']['name'];

            $imagens = strtolower($imagens);

            $imagens = str_replace("á", "a", $imagens);
            $imagens = str_replace("à", "a", $imagens);
            $imagens = str_replace("â", "a", $imagens);
            $imagens = str_replace("ã", "a", $imagens);

            $imagens = str_replace("é", "e", $imagens);
            $imagens = str_replace("è", "e", $imagens);
            $imagens = str_replace("ê", "e", $imagens);

            $imagens = str_replace("í", "i", $imagens);
            $imagens = str_replace("ì", "i", $imagens);
            $imagens = str_replace("ó", "o", $imagens);
            $imagens = str_replace("õ", "o", $imagens);

            $imagens = str_replace("ç", "c", $imagens);
            $imagens = str_replace(" ", "_", $imagens);

            $type = array('image/jpeg', 'image/png', 'image/jpg');
            $arqType = $imgType;

            if (array_search($arqType, $type) === false) {
                echo "Formato Inválido!!!";
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato Inválido!!!');"
                . "</script>";

                return $entity = new $this->entity;
            } else {

                if (!move_uploaded_file($_FILES['imagens']['tmp_name'], "./public/conteudos/imgReuniao/" . $imagens)) {
                    echo " <meta http-equiv-refresh content='0'>"
                    . "<script type='text/javascript'>"
                    . "alert('Erro no upload do arquivo!!!');"
                    . "</script>";
                }

                //$data['imagens'] = $foto_filme;
                //$data = $tipo_foto_filme;
                $entity = new $this->entity($data);

                $this->em->persist($entity);
                $this->em->flush();
                return $entity;
            }
        }

        //========================================== fim da verificação ==========================================//
    }

    public function editar(array $data) {

        $id = $data['id']; // pega o id que está vindo

        $result = $this->getEm()->getRepository($this->entity)->find($id); // busca no banco de dados o registro referente ao id

        $foto_db = $result->getTipoImagem(); // pega o campo fotografia

        unlink("./public/conteudos/imgReuniao/$foto_db"); // exclui a fotografia do diretório e insere a nova
        //======================== verifica se o nome do arquivo tem acentuação ==================================//
        if ($_FILES['imagens']) {

            $data['imagens'] = mysql_real_escape_string(file_get_contents($_FILES['imagens']['tmp_name']));
            $imgType = mysql_real_escape_string($_FILES['imagens']['type']);
            $data['tipoImagem'] = mysql_real_escape_string($_FILES['imagens']['name']);
            //$imgName = mysql_real_escape_string($_FILES['imagens']['name']);
            //$data['tipoImagem'] = $imgType;
            //$imgName = mysql_real_escape_string($_FILES['imagens']['name']);
            //$data['tipoImagem'] = $imgName.$imgType;
            $imagens = $_FILES['imagens']['name'];
            $imagens = strtolower($imagens);

            $imagens = str_replace("á", "a", $imagens);
            $imagens = str_replace("à", "a", $imagens);
            $imagens = str_replace("â", "a", $imagens);
            $imagens = str_replace("ã", "a", $imagens);

            $imagens = str_replace("é", "e", $imagens);
            $imagens = str_replace("è", "e", $imagens);
            $imagens = str_replace("ê", "e", $imagens);

            $imagens = str_replace("í", "i", $imagens);
            $imagens = str_replace("ì", "i", $imagens);
            $imagens = str_replace("ó", "o", $imagens);
            $imagens = str_replace("õ", "o", $imagens);

            $imagens = str_replace("ç", "c", $imagens);
            $imagens = str_replace(" ", "_", $imagens);

            $type = array('image/jpeg', 'image/png', 'image/jpg');
            $arqType = $imgType;

            if (array_search($arqType, $type) === false) {
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato inválido!!!')"
                . "</script>";
                exit();
            } else {

                if (!move_uploaded_file($_FILES['imagens']['tmp_name'], "./public/conteudos/imgReuniao/" . $imagens)) {
                    echo " <meta http-equiv-refresh content='0'>"
                    . "<script type='text/javascript'>"
                    . "alert('Erro no upload do arquivo!!!');"
                    . "</script>";
                }

                //$data['imagens'] = $imagens;

                $entity = $this->em->getReference($this->entity, $data['id']);
                (new Hydrator\ClassMethods())->hydrate($data, $entity);

                $this->em->persist($entity);
                $this->em->flush();
                return $entity;
            }
        }
        //========================================== fim da verificação ==========================================//
    }

    /**
     * 
     * @return EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

}
