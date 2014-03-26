<?php

/* AxonMedicineWhiteKoatBundle:Default:drug.card.html.twig */
class __TwigTemplate_e935b51066e6c1e5eac1a55ac227506e4cf49299858594274334f7b8b0683c29 extends Twig_Template
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
<div id=\"someclass\">
    <form method=\"POST\" action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("drug_card_route_save");
        echo "\" data-validate=\"parsley\">

        <fieldset id=\"drugrelationships\">
            <legend>Drug Characteristics</legend>

            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"genericdrugnameid\" id=\"genericdrugnameid\">
                <table>
                    <tr>
                        <td><input style=\"width:383px\" type=\"text\" id=\"genericdrugname\" name=\"genericdrugname\" placeholder=\"Drug Name\" data-trigger=\"change\" data-required=\"true\"></td>
                        <td valign=\"top\"><a href=\"#\" id=\"genericdrugbutton\" class=\"btn btn-primary btn-lg\">Add Generic</a></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"branddrugnameids\" id=\"branddrugnameids\">
                <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"branddrugnames\" name=\"branddrugnames[]\" multiple=\"multiple\"></select></td>
                        <td><a href=\"#\" id=\"branddrugbutton\" class=\"btn btn-primary btn-lg\">Add Brand</a></td>
                    </tr>
                </table>
            </div>

        </fieldset>

        <fieldset id=\"drugrelationships\">
            <legend>Drug Relationships</legend>

            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugclassnameids\" id=\"drugclassnameids\">
                <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"drugclassnames\" name=\"drugclassnames\"></td>
                        <td><a href=\"#\" id=\"drugclassbutton\" class=\"btn btn-primary btn-lg\">Add Class</a></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugtargetnameids\" id=\"drugtargetnameids\">
                 <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"drugtargetnames\" name=\"drugtargetnames\"></td>
                        <td valign=\"top\"><a href=\"#\" id=\"drugtargetbutton\" class=\"btn btn-primary btn-lg\">Add Target</a></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugtreatmentnameids\" id=\"drugtreatmentnameids\">
                <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"drugtreatmentnames\" name=\"drugtreatmentnames\"></td>
                        <td valign=\"top\"><a href=\"#\" id=\"drugtreatmentbutton\" class=\"btn btn-primary btn-lg\">Add Treatment</a></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugmechanismid\" id=\"drugmechanismid\">
                <table>
                    <tr>
                        <td><textarea style=\"width:650px\" rows=\"2\" cols=\"60\" maxlength=\"255\" name=\"drugmechanism\" placeholder=\"Drug Mechanism\" data-trigger=\"change\"></textarea></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugsideeffectnameids\" id=\"drugsideeffectnameids\">
                <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"drugsideeffectnames\" name=\"drugsideeffectnames\"></td>
                        <td valign=\"top\"><a href=\"#\" id=\"drugsideeffectbutton\" class=\"btn btn-primary btn-lg\">Add Side Effect</a></td>
                    </tr>
                </table>
            </div>
            <div style=\"padding-bottom:15px\">
                <input type=\"hidden\" name=\"drugcontraindnameids\" id=\"drugcontraindnameids\">
                <table>
                    <tr>
                        <td><select style=\"width:400px\" size=\"3\" id=\"drugcontraindnames\" name=\"drugcontraindnames\"></td>
                        <td valign=\"top\"><a href=\"#\" id=\"drugcontraindbutton\" class=\"btn btn-primary btn-lg\">Add Contraindication</a></td>
                    </tr>
                </table>
            </div>
        </fieldset>

        <div style=\"padding-top:30px\">
            <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Drug Card\">
        </div>

    </form>
</div>
";
    }

    // line 99
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 100
        echo "<div style=\"height:300px;overflow:auto;\">
    <table class=\"table table-striped \">
        <thead>
            <tr>
                <th>Generic</th>
                <th>Brand(s)</th>
                <th>Class</th>
                <th>Target</th>
                <th>Treatment</th>
                <th>Side Effect</th>
                <th>Contra-ind</th>
                <th>Action</th>
            </tr>
        </thead>     
        <tbody>

            ";
        // line 116
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugcards"]) ? $context["drugcards"] : $this->getContext($context, "drugcards")));
        foreach ($context['_seq'] as $context["_key"] => $context["drugcard"]) {
            // line 117
            echo "            <tr>
                <td>";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugname"), "html", null, true);
            echo "</td>
                <td>";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugbrand"), "html", null, true);
            echo "</td>
                <td>";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugclass"), "html", null, true);
            echo "</td>
                <td>";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugtarget"), "html", null, true);
            echo "</td>
                <td>";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugtreatment"), "html", null, true);
            echo "</td>
                <td>";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugsideeffect"), "html", null, true);
            echo "</td>
                <td>";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugcontraind"), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("drug_route_remove", array("id" => $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "id"), "drugname" => $this->getAttribute((isset($context["drugcard"]) ? $context["drugcard"] : $this->getContext($context, "drugcard")), "drugname"))), "html", null, true);
            echo "\">remove</a>
            </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drugcard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:drug.card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 128,  188 => 125,  184 => 124,  180 => 123,  176 => 122,  172 => 121,  168 => 120,  164 => 119,  160 => 118,  157 => 117,  153 => 116,  135 => 100,  132 => 99,  36 => 6,  32 => 4,  29 => 3,);
    }
}
