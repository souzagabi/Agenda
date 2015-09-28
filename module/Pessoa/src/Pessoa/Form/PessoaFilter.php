<?php

namespace Pessoa\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\Size;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class PessoaFilter extends InputFilter {

    public function __construct($name = null, array $classificacoes = null) {

        $titulo = new Input('nome');
        $titulo->setRequired(true)
                ->getFilterChain()
                ->attach(new StringTrim())
                ->attach(new StripTags());
        $titulo->getValidatorChain()->attach(new NotEmpty());
        $this->add($titulo);

       /* $fotografia = new FileInput('fotografia');
        $fotografia->getFilterChain()->attach(new RenameUpload(array(
            'target' => './public/conteudos/imagens/blog_',
            'use_upload_extension' => true,
            'randomize' => true,
        )));
        $fotografia->getValidatorChain()->attach(new Size(array(
            'max' => substr(ini_get('upload_max_filesize'), 0, -1) . 'MB')));
        $fotografia->getValidatorChain()
                ->attach(new MimeType(array(
                    'image/jpeg', 'image/png', 'image/jpg',
                    'enableHeaderCheck' => true
        )));
        $this->add($fotografia);
        
        */
    }

}
