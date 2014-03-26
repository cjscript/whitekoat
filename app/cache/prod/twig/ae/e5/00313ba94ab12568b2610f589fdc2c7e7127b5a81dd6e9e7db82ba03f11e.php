<?php

/* AxonMedicineWhiteKoatBundle:Default:student.drug.card.html.twig */
class __TwigTemplate_aee500313ba94ab12568b2610f589fdc2c7e7127b5a81dd6e9e7db82ba03f11e extends Twig_Template
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
    <fieldset id=\"drugrelationships\">
        <legend>Drug Characteristics</legend>

        <div style=\"padding-bottom:15px\">
            <table>
                <tr>
                    <td><label class=\"mainlabel\">Drug Name: </label></td>
                    <td><label class=\"cardvalue\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "generic"), "html", null, true);
        echo "</label></td>
                </tr>
                <tr>
                    <td><label class=\"mainlabel\">Brand Names: </label></td>
                    <td><label class=\"cardvalue\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "brands"), "html", null, true);
        echo "</label></td>
                </tr>
            </table>
        </div>

    </fieldset>

    <fieldset id=\"drugrelationships\">
        <legend>Drug Relationships</legend>

        <div style=\"padding-bottom:15px\">
            <table>
                <tr>
                    <td> 
                        <div class=\"panel-group\" id=\"accordion1\">
                            <div class=\"panel panel-default\">
                                <div class=\"panel-heading\">
                                    <h4 class=\"panel-title\">
                                        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse1\">
                                            <label class=\"info_other\">Classes</label>
                                        </a>
                                    </h4>
                                </div>
                                <div id=\"collapse1\" class=\"panel-collapse collapse\">
                                    <div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "classes"), "html", null, true);
        echo "</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion2\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapse2\">
                                            <label class=\"info_other\">Targets</label>
                                        </a></h4></div><div id=\"collapse2\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "targets"), "html", null, true);
        echo "</label>
                                    </div></div></div></div></td></tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion3\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapse3\">
                                            <label class=\"info_other\">Txs</label>
                                        </a></h4></div><div id=\"collapse3\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 59
        echo $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "treatments");
        echo "</label>
                                    </div></div></div></div></td></tr>


                <tr><td> <div class=\"panel-group\" id=\"accordion4\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion4\" href=\"#collapse4\">
                                            <label class=\"info_other\">Mechanism</label>
                                        </a></h4></div><div id=\"collapse4\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "mechanism"), "html", null, true);
        echo "</label>
                                    </div></div></div></div></td></tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion5\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion5\" href=\"#collapse5\">
                                            <label class=\"info_other\">Side Effects</label>
                                        </a></h4></div><div id=\"collapse5\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "sideeffects"), "html", null, true);
        echo "</label>
                                    </div></div></div></div></td></tr>

                <tr><td> <div class=\"panel-group\" id=\"accordion6\"><div class=\"panel panel-default\"><div class=\"panel-heading\"><h4 class=\"panel-title\"><a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion6\" href=\"#collapse6\">
                                            <label class=\"info_other\">Contra-indications</label>
                                        </a></h4></div><div id=\"collapse6\" class=\"panel-collapse collapse\"><div class=\"panel-body\">
                                        <label class=\"cardvalue\">";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["druginfo"]) ? $context["druginfo"] : $this->getContext($context, "druginfo")), "contrainds"), "html", null, true);
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

    // line 92
    public function block_tablecontent($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 92,  129 => 78,  120 => 72,  111 => 66,  101 => 59,  92 => 53,  78 => 42,  50 => 17,  43 => 13,  32 => 4,  29 => 3,);
    }
}
