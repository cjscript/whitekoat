<?php

/* AxonMedicineWhiteKoatBundle:Default:student.drug.home.html.twig */
class __TwigTemplate_ab4fb3a5488154eeab3896a12779e96f48c59892bb4fe49619d9e5d75a6a19d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'container' => array($this, 'block_container'),
            'libcontent' => array($this, 'block_libcontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "
<style type=\"text/css\">
    .text-placeholder {color: #AAA !important}

    table{
        table-layout: fixed;
    }

    td{
        word-wrap: break-word
    }

    .cardlabel{
        font-style:italic;
    }

    .cardvalue{
        color: brown;
    }


    .success_message
    {
        color: green;
        font-size:75%;
        font-weight:bold;
    }

    .error_message
    {
        color: red;
        font-size:75%;
        font-weight:bold;
    }

    .loader
    {
        background-image: url(";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/images/ajax-loader.gif"), "html", null, true);
        echo ");
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
    }
    .main 
    {
        width: 800px;
        padding: 10px 30px 30px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }

</style>

";
    }

    // line 65
    public function block_container($context, array $blocks = array())
    {
        // line 66
        echo "
<div class=\"mainalt\">

    ";
        // line 69
        $this->displayBlock('libcontent', $context, $blocks);
        // line 71
        echo "
    <div style=\"text-align:center; font-size: x-small\">&copy;2013-14 Axon Medicine, LLC</div>

</div>

";
    }

    // line 69
    public function block_libcontent($context, array $blocks = array())
    {
        // line 70
        echo "    ";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 70,  118 => 69,  109 => 71,  107 => 69,  99 => 65,  72 => 41,  33 => 4,  30 => 3,  117 => 63,  102 => 66,  95 => 47,  88 => 43,  81 => 39,  74 => 35,  67 => 31,  50 => 17,  43 => 13,  32 => 4,  29 => 3,);
    }
}
