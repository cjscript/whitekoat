<?php

/* AxonMedicineWhiteKoatBundle:Default:import.drug.data.html.twig */
class __TwigTemplate_3f472cffcb32df395390e98fdf1a925f398e01d49f05833875cd9102eacdb153 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:home.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_libcontent($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"someimport\">
    <div class=\"row-fluid\">
        <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
            <div class=\"input-append\">
                <form class=\"form\" method =\"POST\"  enctype=\"multipart/form-data\" action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("import_route_upload");
        echo "\">
                    <fieldset id=\"importdrugdata\">
                        <legend>Drug Data Import</legend>
                        <div class=\"uneditable-input span6\">
                            <i class=\"icon-file fileupload-exists\"></i> 
                            <span class=\"fileupload-preview\"></span>
                        </div>
                        <span class=\"btn btn-file\">
                            <span class=\"fileupload-new\">Select file</span>
                            <span class=\"fileupload-exists\">Change</span>
                            <input type=\"file\" name=\"img\"/>
                        </span>
                        <button class=\"btn btn-primary fileupload-exists\" type=\"submit\">Upload</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

";
        // line 28
        if ((array_key_exists("status", $context) && ((isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")) == "success"))) {
            // line 29
            echo "   ";
            if (array_key_exists("uploadedURL", $context)) {
                // line 30
                echo "<!--    <img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((isset($context["uploadedURL"]) ? $context["uploadedURL"] : $this->getContext($context, "uploadedURL"))), "html", null, true);
                echo "\"> -->
   ";
            }
        } else {
            // line 32
            echo " 
  
";
        }
        // line 35
        echo "
";
    }

    // line 38
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:import.drug.data.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 39,  83 => 38,  78 => 35,  73 => 32,  66 => 30,  63 => 29,  61 => 28,  39 => 9,  32 => 4,  29 => 3,);
    }
}
