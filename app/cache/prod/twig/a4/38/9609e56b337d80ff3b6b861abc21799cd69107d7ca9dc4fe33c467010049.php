<?php

/* AxonMedicineWhiteKoatBundle:Default:student.drug.search.html.twig */
class __TwigTemplate_a4389609e56b337d80ff3b6b861abc21799cd69107d7ca9dc4fe33c467010049 extends Twig_Template
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
        <legend>Search Results</legend>

        <div>
            <table class=\"table table-striped table-bordered\">
                <thead bgcolor=\"#cccccc\">
                    <tr>
                        <th>";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["selOption"]) ? $context["selOption"] : $this->getContext($context, "selOption")), "html", null, true);
        echo "</th>
                    </tr>
                </thead>     
                <tbody>
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugSearchOutput"]) ? $context["drugSearchOutput"] : $this->getContext($context, "drugSearchOutput")));
        foreach ($context['_seq'] as $context["_key"] => $context["output"]) {
            // line 18
            echo "                    <tr>
                        <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")), "second"), "html", null, true);
            echo "</td>
                    </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['output'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "
             ";
        // line 23
        if (twig_test_empty((isset($context["drugSearchOutput"]) ? $context["drugSearchOutput"] : $this->getContext($context, "drugSearchOutput")))) {
            // line 24
            echo "                    <tr>
                        <td>0 records found</td>
                    </tr>
             ";
        }
        // line 28
        echo "

                </tbody>
            </table>
        </div>

        <div style=\"padding-top:30px\">
            <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Close Window\" onclick=\"window.close();
                    return true;\">
        </div>
</div>
";
    }

    // line 41
    public function block_tablecontent($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 41,  77 => 28,  71 => 24,  69 => 23,  66 => 22,  57 => 19,  54 => 18,  50 => 17,  43 => 13,  32 => 4,  29 => 3,);
    }
}
