<?php

/* AxonMedicineWhiteKoatBundle:Default:student.html.twig */
class __TwigTemplate_55bedb1f354a9c3c0a489834d011af3cd8afe9b0d10345b92a3cb37aae50cd9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:student.home.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.home.html.twig";
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
<form method=\"POST\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("sc_drug_route_search");
        echo "\" data-validate=\"parsley\">
    <div style=\"padding-top:30px\">
        Please enter or select a drug name to get started
    </div>
    <input type=\"hidden\" name=\"genericdrugnameid\" id=\"genericdrugnameid\">
    <table>
        <tr>
            <td><input style=\"width:383px\" type=\"text\" id=\"genericdrugname\" name=\"genericdrugname\" placeholder=\"Drug Name\" data-trigger=\"change\" data-required=\"true\"></td>
            <td valign=\"top\"><a href=\"#\" id=\"genericdrugbutton\" class=\"btn btn-primary btn-lg\">Search Drug List</a></td>
        </tr>
    </table>

    <div id=\"drugcarddisplay\" style=\"padding-top:30px\">
        <input class=\"btn btn-primary btn-lg\" type=\"button\" value=\"Display Drug Card\"
               onclick=\"showCard('dcard?dn=' + document.getElementById('genericdrugname').value, 'Drug Card', 10, (screen.height / 2) - (600 / 2))\">
    </div>
</form>


";
    }

    // line 26
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 27
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 27,  59 => 26,  35 => 5,  32 => 4,  29 => 3,);
    }
}
