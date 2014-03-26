<?php

/* AxonMedicineWhiteKoatBundle:Default:drug.disease.modal.html.twig */
class __TwigTemplate_521e00e95c04bd4f0e0c11116f77e3fabdab368669b28ee8ea7ff2c0ffa4dba9 extends Twig_Template
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
                <tr><th>Name</th><th>Description</th></tr>
            </thead>
            <tbody>
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugdiseasenames"]) ? $context["drugdiseasenames"] : $this->getContext($context, "drugdiseasenames")));
        foreach ($context['_seq'] as $context["_key"] => $context["drugdiseasename"]) {
            // line 9
            echo "                <tr style=\"cursor:default\" onClick=\"javascript:updateAndCloseModal('#genericdrugdiseasename', '#genericdrugdiseasenameid', '', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugdiseasename"]) ? $context["drugdiseasename"] : $this->getContext($context, "drugdiseasename")), "id"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugdiseasename"]) ? $context["drugdiseasename"] : $this->getContext($context, "drugdiseasename")), "name"), "html", null, true);
            echo "')\">
                    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugdiseasename"]) ? $context["drugdiseasename"] : $this->getContext($context, "drugdiseasename")), "name"), "html", null, true);
            echo "</td>
                    <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugdiseasename"]) ? $context["drugdiseasename"] : $this->getContext($context, "drugdiseasename")), "description"), "html", null, true);
            echo "</td>
                </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drugdiseasename'], $context['_parent'], $context['loop']);
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
        return "AxonMedicineWhiteKoatBundle:Default:drug.disease.modal.html.twig";
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
