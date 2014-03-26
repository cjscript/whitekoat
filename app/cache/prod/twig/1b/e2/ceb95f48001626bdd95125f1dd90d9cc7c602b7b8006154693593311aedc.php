<?php

/* AxonMedicineWhiteKoatBundle:Default:student.disease.card.html.twig */
class __TwigTemplate_1be2ceb95f48001626bdd95125f1dd90d9cc7c602b7b8006154693593311aedc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:student.drug.disease.without.menu.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.disease.without.menu.html.twig";
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
<div id=\"someclass\">
    <fieldset id=\"diseaserelationships\">
        <legend>Disease Characteristics</legend>

        <div style=\"padding-bottom:15px\">
            <table>
                <tr>
                    <td><label class=\"mainlabel\">Disease Name: </label></td>
                    <td><label class=\"cardvalue\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseinfo"]) ? $context["diseaseinfo"] : $this->getContext($context, "diseaseinfo")), "disease"), "html", null, true);
        echo "</label></td>
                </tr>
                <tr>
                    <td><label class=\"mainlabel\">Disease Type: </label></td>
                    <td><label class=\"cardvalue\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseinfo"]) ? $context["diseaseinfo"] : $this->getContext($context, "diseaseinfo")), "type"), "html", null, true);
        echo "</label></td>
                </tr>
            </table>
        </div>
    </fieldset>


    <fieldset id=\"diseaserelationships\">
        <legend>Disease Relationships</legend>

        <div style=\"padding-bottom:15px\">
            <table>
                <tr>
                    <td> 
                        <div class=\"panel-group\" id=\"accordion1\">
                            <div class=\"panel panel-default\">
                                <div class=\"panel-heading\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse1\">
                                            <label class=\"info_other\">Symptoms</label>
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapse1\" class=\"panel-collapse collapse\">
                                    <div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseinfo"]) ? $context["diseaseinfo"] : $this->getContext($context, "diseaseinfo")), "symptom"), "html", null, true);
        echo "</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion2\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapse2\">
                                            <label class=\"info_other\">Causes</label>
                                        </a></h4></div><div id=\"collapse2\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseinfo"]) ? $context["diseaseinfo"] : $this->getContext($context, "diseaseinfo")), "cause"), "html", null, true);
        echo "</label>
                                    </div></div></div></div></td></tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion3\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapse3\">
                                            <label class=\"info_other\">Txs</label>
                                        </a></h4></div><div id=\"collapse3\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 59
        echo $this->getAttribute((isset($context["diseaseinfo"]) ? $context["diseaseinfo"] : $this->getContext($context, "diseaseinfo")), "treatment");
        echo "</label>
                                    </div></div></div></div></td></tr>

            </table>
        </div>
    </fieldset>

    <div style=\"padding-top:30px\">
        <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Close Window\" onclick=\"window.close();
                return true;\">
    </div>
</div>
";
    }

    // line 73
    public function block_tablecontent($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.disease.card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 73,  101 => 59,  92 => 53,  78 => 42,  50 => 17,  43 => 13,  32 => 4,  29 => 3,);
    }
}
