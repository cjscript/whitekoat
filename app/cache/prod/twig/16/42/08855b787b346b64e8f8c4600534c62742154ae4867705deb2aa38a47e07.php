<?php

/* AxonMedicineWhiteKoatBundle:Default:student.drug.card.main.html.twig */
class __TwigTemplate_164208855b787b346b64e8f8c4600534c62742154ae4867705deb2aa38a47e07 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("sc_main_route_get");
        echo "\" data-validate=\"parsley\">
    <input type=\"hidden\" name=\"genericdrugnameid\" id=\"genericdrugnameid\">
    <table>
        <tr>
            Show card for 
            <td><input style=\"width:383px\" type=\"text\" id=\"genericdrugname\" name=\"genericdrugname\" placeholder=\"(type name)\" data-trigger=\"change\" data-required=\"true\"></td>            <td valign=\"top\"><a href=\"#\" id=\"genericdrugbutton\" class=\"btn btn-primary btn-lg\">Search</a></td>
        </tr>
    </table>

    <div id=\"drugcarddisplay\" style=\"padding-top:30px\">
        <input class=\"btn btn-primary btn-lg\" type=\"button\" value=\"Display Card\"
               onclick=\"showCard('dcard?dn=' + document.getElementById('genericdrugname').value, 'Drug Card', 10, (screen.height / 2) - (600 / 2))\">
    </div>
</form>


";
    }

    // line 23
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 24
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.card.main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 24,  56 => 23,  35 => 5,  32 => 4,  29 => 3,);
    }
}
