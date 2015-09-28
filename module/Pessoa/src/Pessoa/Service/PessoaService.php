<?php

namespace Pessoa\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class PessoaService extends AbstractService {

    public function __construct(EntityManager $em) {
        $this->entity = 'Pessoa\Entity\Pessoa';
        parent::__construct($em);
    }

    public function inserir(array $data) {


        //======================== verifica se o nome do arquivo tem acentuação ==================================//
        if ($_FILES['fotografia']) {

            //NOME DO ARQUIVO NO COMPUTADOR
            $file_name = $_FILES['fotografia']["name"];
            //TAMANHO DO ARQUIVO
            $file_size = $_FILES['fotografia']["size"];
            //MIME DO ARQUIVO (TIPO)
            $extencao = strchr($_FILES['fotografia']["name"], '.');
            $file_type = $extencao;

            //NOME TEMPORÁRIO
            $file_tmp = $_FILES['fotografia']["tmp_name"];
            $file_tmp = file_get_contents($file_tmp);
            $file_tmp = base64_encode($file_tmp);

            $fotografia = strtolower($file_name);

            //$fotografia = $_FILES['fotografia']['name'];
            //$fotografia = strtolower($fotografia);

            $fotografia = str_replace("á", "a", $fotografia);
            $fotografia = str_replace("à", "a", $fotografia);
            $fotografia = str_replace("â", "a", $fotografia);
            $fotografia = str_replace("ã", "a", $fotografia);

            $fotografia = str_replace("é", "e", $fotografia);
            $fotografia = str_replace("è", "e", $fotografia);
            $fotografia = str_replace("ê", "e", $fotografia);

            $fotografia = str_replace("í", "i", $fotografia);
            $fotografia = str_replace("ì", "i", $fotografia);
            $fotografia = str_replace("ó", "o", $fotografia);
            $fotografia = str_replace("õ", "o", $fotografia);

            $fotografia = str_replace("ç", "c", $fotografia);
            $fotografia = str_replace(" ", "_", $fotografia);

            $type = array('image/jpeg', 'image/png', 'image/jpg');
            $arqType = $_FILES['fotografia']['type'];

            if (array_search($arqType, $type) === false) {
                echo "Formato Inválido!!!";
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato Inválido!!!');"
                . "</script>";

                return $entity = new $this->entity;
            } else {
                $data['TIPO_IMAGEM'] = $file_type;
                $data['IMAGEM'] = $file_tmp;
                $data['NOME_IMAGEM'] = $fotografia;
                $data['TAMANHO_IMAGEM'] = $file_size;
           /* }
            
            if (array_search($arqType, $type) === false) {
                echo "Formato Inválido!!!";
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato Inválido!!!');"
                . "</script>";

                return $entity = new $this->entity;
            } else {

                if (!move_uploaded_file($_FILES['fotografia']['tmp_name'], "./public/conteudos/imagens/" . $fotografia)) {
                    echo " <meta http-equiv-refresh content='0'>"
                    . "<script type='text/javascript'>"
                    . "alert('Erro no upload do arquivo!!!');"
                    . "</script>";
                }

                $data['fotografia'] = $fotografia;*/

                $entity = new $this->entity($data);

                $classification = $this->em->getReference("Pessoa\Entity\Classificacao", $data['classification']);
                $entity->setclassification($classification); // Injetando entidade carregada

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

       // $foto_db = $result->getImage(); // pega o campo fotografia

       // unlink("./public/conteudos/imagens/$foto_db"); // esclui a fotografia do diretório e insere a nova
        //======================== verifica se o nome do arquivo tem acentuação ==================================//
        if ($_FILES['fotografia']) {

            //$fotografia = $data['id'] . "_" . $_FILES['name'];
            //NOME DO ARQUIVO NO COMPUTADOR
            $file_name = $data['id'] . "_" . $_FILES['fotografia']['name'];
            //TAMANHO DO ARQUIVO
            $file_size = $_FILES['fotografia']["size"];
            //MIME DO ARQUIVO (TIPO)
            $extencao = strchr($_FILES['fotografia']["name"], '.');
            $file_type = $extencao;

            //NOME TEMPORÁRIO
            $file_tmp = $_FILES['fotografia']["tmp_name"];
            $file_tmp = file_get_contents($file_tmp);
            $file_tmp = base64_encode($file_tmp);

            $fotografia = strtolower($file_name);
            //$fotografia = strtolower($fotografia);

            $fotografia = str_replace("á", "a", $fotografia);
            $fotografia = str_replace("à", "a", $fotografia);
            $fotografia = str_replace("â", "a", $fotografia);
            $fotografia = str_replace("ã", "a", $fotografia);

            $fotografia = str_replace("é", "e", $fotografia);
            $fotografia = str_replace("è", "e", $fotografia);
            $fotografia = str_replace("ê", "e", $fotografia);

            $fotografia = str_replace("í", "i", $fotografia);
            $fotografia = str_replace("ì", "i", $fotografia);
            $fotografia = str_replace("ó", "o", $fotografia);
            $fotografia = str_replace("õ", "o", $fotografia);

            $fotografia = str_replace("ç", "c", $fotografia);
            $fotografia = str_replace(" ", "_", $fotografia);

            $type = array('image/jpeg', 'image/png', 'image/jpg');
            $arqType = $_FILES['fotografia']['type'];

            if (array_search($arqType, $type) === false) {
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato inválido!!!')"
                . "</script>";
                exit();
            } else {
                $data['TIPO_IMAGEM'] = $file_type;
                $data['IMAGEM'] = $file_tmp;
                $data['NOME_IMAGEM'] = $fotografia;
                $data['TAMANHO_IMAGEM'] = $file_size;
            /*}
            
            if (array_search($arqType, $type) === false) {
                echo " <meta http-equiv-refresh content='0'>"
                . "<script type='text/javascript'>"
                . "alert('Formato inválido!!!')"
                . "</script>";
                exit();
            } else {

                if (!move_uploaded_file($_FILES['fotografia']['tmp_name'], "./public/conteudos/imagens/" . $fotografia)) {
                    echo " <meta http-equiv-refresh content='0'>"
                    . "<script type='text/javascript'>"
                    . "alert('Erro no upload do arquivo!!!');"
                    . "</script>";
                }

                $data['fotografia'] = $fotografia;*/

                $entity = $this->em->getReference($this->entity, $data['id']);
                (new Hydrator\ClassMethods())->hydrate($data, $entity);

                $classification = $this->em->getReference("Pessoa\Entity\Classificacao", $data['classification']);
                $entity->setclassification($classification); // Injetando entidade carregada

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
