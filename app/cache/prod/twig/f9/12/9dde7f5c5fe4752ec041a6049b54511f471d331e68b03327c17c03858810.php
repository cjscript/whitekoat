<?php

/* AxonMedicineWhiteKoatBundle:Default:drug.class.modal.html.twig */
class __TwigTemplate_f9129dde7f5c5fe4752ec041a6049b54511f471d331e68b03327c17c03858810 extends Twig_Template
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
                <tr><th>Class</th><th>Class Description</th></tr>
            </thead>
            <tbody>
            ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugClasses"]) ? $context["drugClasses"] : $this->getContext($context, "drugClasses")));
        foreach ($context['_seq'] as $context["_key"] => $context["drugClass"]) {
            // line 9
            echo "                <tr style=\"cursor:default\" onClick=\"javascript:updateSelectAndCloseModal('#drugclassnames', '#drugclassnameids', '', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugClass"]) ? $context["drugClass"] : $this->getContext($context, "drugClass")), "id"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugClass"]) ? $context["drugClass"] : $this->getContext($context, "drugClass")), "name"), "html", null, true);
            echo "')\">
                    <td>";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugClass"]) ? $context["drugClass"] : $this->getContext($context, "drugClass")), "name"), "html", null, true);
            echo "</a></td>
                    <td>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drugClass"]) ? $context["drugClass"] : $this->getContext($context, "drugClass")), "description"), "html", null, true);
            echo "</td>
                </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drugClass'], $context['_parent'], $context['loop']);
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
        return "AxonMedicineWhiteKoatBundle:Default:drug.class.modal.html.twig";
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
