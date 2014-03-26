<?php

/* AxonMedicineWhiteKoatBundle:Default:student.help.html.twig */
class __TwigTemplate_4271dc91b647964cd3086c456f65de92c47b6d5533aa1c5e03200181bb01600b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.student.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:home.student.html.twig";
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

<div style=\"padding-top:20px\" />

WK Help Coming Soon...

";
    }

    // line 12
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 13
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.help.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 13,  42 => 12,  32 => 4,  29 => 3,);
    }
}
