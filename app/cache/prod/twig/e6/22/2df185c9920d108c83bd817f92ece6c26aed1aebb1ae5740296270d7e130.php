<?php

/* AxonMedicineWhiteKoatBundle:Default:disease.modal.html.twig */
class __TwigTemplate_e6222df185c9920d108c83bd817f92ece6c26aed1aebb1ae5740296270d7e130 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"modal-body\">
    <div class=\"row-fluid\">
        <table class=\"table table-striped table-bordered table-hover\">
            <thead>
                <tr><th>Disease Name</th><th>Disease Description</th></tr>
            </thead>
            <tbody>
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diseases"]) ? $context["diseases"] : $this->getContext($context, "diseases")));
        foreach ($context['_seq'] as $context["_key"] => $context["diseaseNameLib"]) {
            // line 9
            echo "                <tr style=\"cursor:default\" onClick=\"javascript:updateAndCloseModal('#genericdiseasename', '#genericdiseasenameid', '', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseNameLib"]) ? $context["diseaseNameLib"] : $this->getContext($context, "diseaseNameLib")), "id"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseNameLib"]) ? $context["diseaseNameLib"] : $this->getContext($context, "diseaseNameLib")), "name"), "html", null, true);
            echo "')\">
                    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseNameLib"]) ? $context["diseaseNameLib"] : $this->getContext($context, "diseaseNameLib")), "name"), "html", null, true);
            echo "</td>
                    <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseaseNameLib"]) ? $context["diseaseNameLib"] : $this->getContext($context, "diseaseNameLib")), "description"), "html", null, true);
            echo "</td>
                </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diseaseNameLib'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
            </tbody>
        </table>
    </div>    
</div>";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:disease.modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 14,  43 => 11,  39 => 10,  32 => 9,  28 => 8,  19 => 1,);
    }
}
