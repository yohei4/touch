<?php

namespace App\Libs;

class ClassAttribute {
    private $pass = '';
    private $ClassAttributeName = [];

    function __construct(string $pass)
    {
        $this->pass = $pass;
    }

    private function setClassAttributeName()
    {
        $file = file_get_contents($this->pass);
        $this->ClassAttributeName = $this->ClassAttributeNameArr($file);
    }


    public function getClassAttributeName()
    {
        if(empty($this->ClassAttributeName)) {
            $this->setClassAttributeName();
        }
        return $this->ClassAttributeName;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getClassConstFile($array)
    {
        $content = "<?php\n\n";
        $content .= "namespace App\Consts;\n\n";

        $content .= "class FontAwesomeClassName\n";
        $content .= "{\n";
        $content .= "\tpublic const CLASS_NAME = [\n";
        foreach($array as $key => $value) {
            $content .= "\t\t" . "['id' => '" . ($key + 1) . "', 'className' => '" . $value . "']," . "\n";
        }
        $content .= "\t];\n";
        $content .= "}\n";

        file_put_contents('/var/www/app/laravel/app/Consts/FontAwesome.php', $content);
    }


    private function ClassAttributeNameArr($file)
    {
        preg_match_all('/\.f[a-z]*.+:before\s{/', $file, $out);
        $array = preg_replace('/\.|:before\s{/', '', $out[0]);
        return $array;
    }
}
