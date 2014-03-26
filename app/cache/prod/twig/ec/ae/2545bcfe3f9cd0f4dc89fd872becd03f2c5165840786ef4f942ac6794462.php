<?php

/* AxonMedicineWhiteKoatBundle:Default:drug.brand.modal.html.twig */
class __TwigTemplate_ecae2545bcfe3f9cd0f4dc89fd872becd03f2c5165840786ef4f942ac6794462 extends Twig_Template
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
                <tr><th>Drug Name</th><th>Drug Description</th></tr>
            </thead>
            <tbody>
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugNames"]) ? $context["drugNames"] : $this->getContext($context, "drugNames")));
        foreach ($context['_seq'] as $context["_key"] => $context["drugNameLib"]) {
            // line 9
            echo "                <tr style=\"cursor:default\" onClick=\"javascript:updateSelectAndCloseModal('#branddrugnames', '#branddrugnameids', '', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugNameLib"]) ? $context["drugNameLib"] : $this->getContext($context, "drugNameLib")), "id"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugNameLib"]) ? $context["drugNameLib"] : $this->getContext($context, "drugNameLib")), "name"), "html", null, true);
            echo "')\">
                    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugNameLib"]) ? $context["drugNameLib"] : $this->getContext($context, "drugNameLib")), "name"), "html", null, true);
            echo "</td>
                    <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugNameLib"]) ? $context["drugNameLib"] : $this->getContext($context, "drugNameLib")), "description"), "html", null, true);
            echo "</td>
                </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drugNameLib'], $context['_parent'], $context['loop']);
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
        return "AxonMedicineWhiteKoatBundle:Default:drug.brand.modal.html.twig";
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
