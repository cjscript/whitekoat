<?php

/* AxonMedicineWhiteKoatBundle:Default:student.main.html.twig */
class __TwigTemplate_5cab43b950b5b109c619ce2a222adb27643ae15d2c7e6a8107371664bd45def1 extends Twig_Template
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

<div class=\"tab-content\">
    <div class=\"tab-pane\" id=\"help\" style=\"height:800px\">WK Help Coming Soon...</div>
    <div class=\"tab-pane active\" id=\"home\">

        <form method=\"POST\" action=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("sc_route_get");
        echo "\" data-validate=\"parsley\">

            <fieldset id=\"drugrelationships\">
                <legend>Show card for: </legend>

                <table>
                    <tr>
                        <td><input style=\"width:383px\" type=\"text\" id=\"genericdrugdiseasename\" name=\"genericdrugdiseasename\" placeholder=\"(type name or click 'F2' to search)\" data-trigger=\"change\" data-required=\"true\">
                            <div id=\"drugcarddisplay\" style=\"padding-top:30px\">
                                <input id=\"genericdrugdiseasesubmitbutton\" name=\"genericdrugdiseasesubmitbutton\" class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Display Card\"
                                       onclick=\"showCard('card?dn=' + document.getElementById('genericdrugdiseasename').value, 'DrugCard_' + document.getElementById('genericdrugdiseasename').value.replace(/ /g, ''), 10, (screen.height / 2) - (600 / 2))\">
                            </div>

                        </td>
                    </tr>
                </table>
            </fieldset>

        </form>

        <div style=\"padding-top:20px\" />

        <form method=\"POST\" data-validate=\"parsley\">

            <fieldset id=\"drugrelationships\">
                <legend>Drugs</legend>

                <div style=\"padding-bottom:15px\">
                    <table>
                        <tr>
                            What are the
                        <select class=\"selectpicker\" id=\"drugsearchoption\" name=\"drugsearchoption\">
                            <option name=\"Indications\">Indications</option>
                            <option name=\"Mechanism\">Mechanism</option>
                            <option name=\"Side Effects\">Side Effects</option>
                            <option name=\"Contraindications\">Contraindications</option>
                        </select>
                        for 
                        <td><input style=\"width:383px\" type=\"text\" id=\"genericdrugname\" name=\"genericdrugname\" placeholder=\"(type drug name)\" data-trigger=\"change\" data-required=\"true\"></td>
                        </tr>
                    </table>
                    <div style=\"padding-top:30px\">
                        <input id=\"drugsearchbutton\" name=\"drugsearchbutton\" class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Find\"
                               onclick=\"showCard('search?drsrch=' + document.getElementById('drugsearchoption').value + ':::' + document.getElementById('genericdrugname').value, 'Find', 30, (screen.height / 2) - (600 / 2))\">
                    </div

                </div></fieldset>


            <div id=\"drugsearchoutput\" name=\"drugsearchoutput\">
            </div>

        </form>


        <form method=\"POST\" data-validate=\"parsley\">

            <fieldset id=\"diseaserelationships\">
                <legend>Diseases</legend>

                <div style=\"padding-bottom:15px\">
                    <table>
                        <tr>
                            What are the  
                        <select class=\"selectpicker\" id=\"diseasesearchoption\" name=\"diseasesearchoption\" class=\"selectpicker\">
                            <option>Symptoms</option>
                            <option>Treatments</option>
                            <option>Mechanism</option>
                        </select>
                        for 
                        <td><input style=\"width:383px\" type=\"text\" id=\"genericdiseasename\" name=\"genericdiseasename\" placeholder=\"(type disease name)\" data-trigger=\"change\" data-required=\"true\"></td>
                        </tr>
                    </table>
                    <div style=\"padding-top:30px\">
                        <input id=\"diseasesearchbutton\" name=\"diseasesearchbutton\" class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Find\"
                               onclick=\"showCard('search?disrch=' + document.getElementById('diseasesearchoption').value + ':::' + document.getElementById('genericdiseasename').value, 'Find', 10, (screen.height / 2) - (600 / 2))\">
                    </div>
                </div></fieldset>

            <div style=\"padding-top:20px\" />

        </form>

    </div>
</div>

";
    }

    // line 98
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 99
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 99,  131 => 98,  40 => 10,  32 => 4,  29 => 3,);
    }
}
